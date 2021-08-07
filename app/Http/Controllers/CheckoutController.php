<?php

namespace App\Http\Controllers;

use App\Models\Ship;
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
        return view('pages.checkouts.checkout');
    }

    public function save(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'address'=>'required',
                'phone'=>'required|min:10'
            ],
            [
                'name.required'=>'Mời nhập họ tên',
                'email.required'=>'Mời nhập email',
                'email.email'=>'Email không đúng định dạng',
                'address.required'=>'Mời nhập địa chỉ',
                'phone.required'=>'Mời nhập số điện thoại',
                'phone.integer'=>'Số điện thoại không đúng định dạng',
                'phone.min'=>'Số điện thoại phải có ít nhất 10 chữ số',
            ]
        );
        $model = new Ship();
        $model->fill($request->all());
        $model->save();
        session(['ship_id' => $model->id]);
        return redirect(route('payment'));
    }

    public function payment(){
        return view('pages.checkouts.payment');
    }

    public function order(Request $request){
        DB::beginTransaction();
        try {
            // insert payments
            $data = array();
            $data['method']= $request->method;
            $payment_id = DB::table('payments')->insertGetId($data);

            // insert orders
            $order_data = array();
            $totalPrice = str_replace(',', '', Cart::total());
            $order_data['customer_id']= session('customer')->id;
            $order_data['ship_id']= session('ship_id');
            $order_data['payment_id']= $payment_id;
            $order_data['total']= (int)$totalPrice;
            $order_id = DB::table('orders')->insertGetId($order_data);

            // insert order_details
            $content = Cart::content();
            foreach($content as $c){
                $order_detail_data = array();
                $order_detail_data['order_id'] = $order_id;
                $order_detail_data['product_id'] = $c->id;
                $order_detail_data['product_name'] = $c->name;
                $order_detail_data['product_quantity'] = $c->qty;
                $order_detail_data['product_price'] = $c->price;
                DB::table('order_details')->insert($order_detail_data);
            }
            DB::commit();
            echo 'Thành công';

            // remove cart
            Cart::destroy();
        } catch (\Exception $e) {
            DB::rollback();
            throw($e);
        }
    }
}
