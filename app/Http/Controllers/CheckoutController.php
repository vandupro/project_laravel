<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Coupon;
use App\Models\FeeShip;
use App\Models\Payment;
use App\Models\Province;
use App\Models\Ship;
use App\Models\Ward;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function checkout(Request $request){
        if(Cart::count() == 0){
            return redirect(route('show-cart'));
        }
        if(!$request->session()->has('customer')){
            return redirect(route('login'));
        }
        $cities = City::orderBy('matp', 'asc')->get();
        return view('pages.checkouts.checkout', compact('cities'));
    }
    public function check_coupon(Request $request){

        $coupon = Coupon::where('code' , trim($request->coupon))->first();
        if($coupon){
            session(['coupon'=>$coupon]);
            return redirect()->back()->with('message', 'Thêm mã giảm giá thành công');
        }else{
            if(session('coupon')){
                $request->session()->forget('coupon');
            }
            return redirect()->back()->with('error', 'Mã giảm giá không tồn tại');
        }
    }
    public function save(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'address'=>'required',
                'phone'=>'required|min:10',
                'fee_isset'=>'required|integer|min:0'
            ],
            [
                'name.required'=>'Mời nhập họ tên',
                'email.required'=>'Mời nhập email',
                'email.email'=>'Email không đúng định dạng',
                'address.required'=>'Mời nhập địa chỉ',
                'phone.required'=>'Mời nhập số điện thoại',
                'phone.min'=>'Số điện thoại phải có ít nhất 10 chữ số',
                'fee_isset.required'=>'Mời chọn địa điểm để tính phí giao hàng',
                'fee_isset.min'=>'Mời chọn địa điểm để tính phí giao hàng'
            ]
        );
        $model = new Ship();
        $model->fill($request->all());
        $model->save();
        session(['ship_id' => $model->id]);
        return redirect(route('payment'));
    }

    public function payment(){
        if(!Cart::count()){
          return redirect(route('show-cart'));  
        }
        $payments = Payment::all();
        return view('pages.checkouts.payment', compact('payments'));
    }
    public function caculate_ship(Request $request){
        $data = $request->all();
        $output = '';
        $item = '';
        $fee_ship = FeeShip::where('matp', $data['matp'])
                            ->where('xaid', $data['xaid'])
                            ->where('maqh', $data['maqh'])
                            ->first();
        if($fee_ship){
            $fee = $fee_ship->fee;
            $output .= '<h5>Thông tin vận chuyển</h5>
            <ul>
                <li>Tỉnh/Thành phố: '.$fee_ship->city->name.'</li>
                <li>Quận/Huyện: '.$fee_ship->province->name.'</li>
                <li>Phường/xã: '.$fee_ship->ward->name.'</li>
                <li>Phí vận chuyển: '.number_format($fee_ship->fee). ' VND'.'</li>
            </ul>';
            $item = $fee_ship;
        }else{
            $fee = 0;
            $output .= 'Phí vận chuyển: 0 VND';

        }
        session(['fee'=>$fee, 'item'=>$item]);
        $output2 = '';
        $coupon = session('coupon');
        $totalPrice = str_replace(',', '', Cart::subtotal());
        $money1 = $totalPrice + $fee;
        if($coupon){
            if($coupon->type == 1){
                $output2 .= '
                Mã giảm: '.$coupon->discount.' %
                <p>
                    Tổng tiền sau giảm:
                    '.number_format($money1*(100-$coupon->discount)/100).' VND
                </p>';
            }
            if($coupon->type == 2){
                $output2 .= '
                Tiền giảm: '.number_format($coupon->discount).' VND
                <p>
                    Tổng tiền sau giảm: '.number_format($money1 - $coupon->discount).'
                    VND
                </p>
                ';
            }
            
        }
        
        return response()->json([
            'output'=>$output,
            'output2'=>$output2,
            'fee'=>$fee,
            'money1'=>$money1
        ]);
    }
    public function ship(Request $request){
        $data = $request->all();
        $output = '';
        if($data['action'] == 'city'){
            $select_province = Province::where('matp', $data['ma_id'])->orderBy('maqh', 'asc')->get();
            $output .= '<option >--Chọn quận huyện--</option>';
            foreach($select_province as $s){
                $output .= "<option value=".$s->maqh.">".$s->name."</option>";
            }
        }else{
                $select_ward = Ward::where('maqh', $data['ma_id'])->orderBy('xaid', 'asc')->get();
                $output .= '<option >--Chọn xã phường--</option>';
                foreach($select_ward as $s){
                    $output .= "<option value=".$s->xaid.">".$s->name."</option>";
                }
        }
        echo $output;
    }
    
    public function order(Request $request){
        $request->validate(
            [
                'method'=>'required'
            ],
            [
                'method.required'=>"Mời chọn phương thức thanh toán"
            ]
        );
        DB::beginTransaction();
        try {
            $data = [];
            $paymentIds = Payment::select('id')->get();
            foreach($paymentIds as $p){
                $data[] = $p->id;
            }
            $methodId= $request->method;
            if(!in_array($methodId, $data)){
                $methodId = Payment::first()->id;
            }

            // insert orders
            $order_data = array();
            // $totalPrice = str_replace(',', '', Cart::subtotal());
            $order_data['customer_id']= session('customer')->id;
            $order_data['ship_id']= session('ship_id');
            if(session('item'))
                $order_data['fee_ship_id']= session('item')->id;
            
            if(session('coupon'))
                $order_data['coupon_id']= session('coupon')->id;

            $order_data['payment_id']= $methodId;
            // $order_data['total']= (int)$totalPrice;
            $order_data['created_at']= date('Y-m-d h:i:s',time());

            $orderId = DB::table('orders')->insertGetId($order_data);

            // insert order_details
            $content = Cart::content();
            foreach($content as $c){
                $order_detail_data = array();
                $order_detail_data['order_id'] = $orderId;
                $order_detail_data['product_id'] = $c->id;
                if(session('item'))
                    $order_detail_data['fee_ship'] = session('item')->fee;
                if(session('coupon'))
                    $order_detail_data['coupon_code'] = session('coupon')->code;
                $order_detail_data['product_name'] = $c->name;
                $order_detail_data['product_quantity'] = $c->qty;
                $order_detail_data['product_price'] = $c->price;
                DB::table('order_details')->insert($order_detail_data);
            }
            DB::commit();
            // remove cart
            Cart::destroy();
            $request->session()->forget(['item', 'fee', 'coupon']);
            return redirect(route('history'));
        } catch (\Exception $e) {
            DB::rollback();
            throw($e);
        }
    }
}