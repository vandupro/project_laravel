<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{   
    public $cates;
    public $branches;
    public function __construct()
    {
        $this->cates = Category::with('products')->where('status', 1)->orderBy('id', 'desc')->get();
        $this->branches = Branch::with('products')->where('status', 1)->orderBy('id', 'desc')->get();
    }

    public function showCart(){
        
        return view('pages.carts.show_cart');
    }
    public function addCart(Request $request){
        
        $product = Product::with(['category', 'branch'])->find($request->product_id);
        Cart::add([
            'id' => $product->id, 
            'name' => $product->name, 
            'qty' => $request->quantity, 
            'price' => $product->price, 
            'weight' => 550, 
            'options' => ['image' => $product->image]
        ]);

        return redirect(route('show-cart'));
    }

    public function deleteCart($id){
        if(!Cart::get($id)){
            return redirect(route('show-cart'));
        }
        Cart::remove($id);
        return redirect()->back();
    }
    public function deleteAll(Request $request){
            Cart::destroy();
            $request->session()->forget(['fee', 'item']);
            $request->session()->forget('coupon');
            return redirect()->back();
    }
    public function updateQuantity(Request $request){
        $rowId = $request->rowId_update;
        $qty = $request->quantity;
        foreach($rowId as $key=>$value){
            if(!Cart::get($value)){
                return redirect(route('show-cart'));
            }
            Cart::update($value, $qty[$key]);
        }
        return redirect()->back()->with('message', 'Cập nhật đơn hàng thành công');
    }

    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $id = $data['cart_product_id'];
        $product = Product::find($id);

        if($product){
            if(Cart::count() > 0){
                $cart = '';
                foreach(Cart::content() as $item){
                    if($item->id == $product->id){
                        $cart = $item;
                    }
                }                
                if($cart != ''){
                    $rowId = $cart->rowId;
                    $qty = $cart->qty + 1;
                    Cart::update($rowId, $qty);
                }else{
                    Cart::add([
                        'id' => $product->id, 
                        'name' => $product->name, 
                        'qty' => 1, 
                        'price' => $product->price, 
                        'weight' => 550, 
                        'options' => ['image' => $product->image]
                    ]);
                }
            }else{
                Cart::add([
                    'id' => $product->id, 
                    'name' => $product->name, 
                    'qty' => 1, 
                    'price' => $product->price, 
                    'weight' => 550, 
                    'options' => ['image' => $product->image]
                ]);
            }
        }else{
            return response()->json([
                'message'=>'Thêm giỏ hàng thất bại',
            ]);
        }
        
    }

    public function getHistory(){
        if(!session('customer')){
            return redirect(route('login'));
        }
        $orders = Order::where('customer_id', session('customer')->id)->get();
        //dd($orders);
        
        return view('pages.carts.history_cart', compact('orders'));
    }

    public function history_detail($id){
        $order = Order::with(['ship', 'customer', 'payment', 'products', 'coupon', 'fee_ship'])->find($id);
        $payments = Payment::all();
        if(!$order){
            return redirect(route('history'));
        }
        //dd($payments);
        return view('pages.carts.history_detail', compact('order', 'payments'));
    }
    public function delete_detail($id, $detail_id){
        $order = Order::find($id);
        if(!$order){
            return redirect(route('history'));
        }
        $order->products()->wherePivot('id','=',$detail_id)->detach();
        if(!count($order->products)){
            $order->delete();
            return redirect(route('history'));
        }
        return redirect(route('history_detail', ['id'=>$id]));
    }

    public function update_order_info(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'address'=>'required',
                'phone'=>'required|min:10'
            ],
            [
                'name.required'=>'Mời điền tên người nhận',
                'address.required'=>'Mời điền địa chỉ',
                'phone.required'=>'Mời điền số điện thoại',
                'phone.min'=>'Số điện thoại không đúng định dạng'
            ]
        );
        $order = Order::find($request->id);
        if(!$order){
            return redirect(route('history'));
        }
        $order->ship->name = $request->name;
        $order->ship->phone = $request->phone;
        $order->ship->address = $request->address;
        $order->payment_id= $request->payment_id;
        $order->ship->save();
        $order->save();
        return redirect(route('history_detail', ['id'=>$request->id]));
    }
    public function update_order_detail(Request $request){
        foreach($request->quantity as $q){
            if($q <= 0){
                return redirect(route('history'));
            }
        }
        $order = Order::find($request->id);
        if(!$order){
            return redirect(route('history'));
        }
        for($i = 0; $i < count($order->products); $i++){
            $order->products[$i]->pivot->product_quantity = $request->quantity[$i];
            $order->products[$i]->pivot->save();
        }
        return redirect(route('history_detail', ['id'=>$request->id]));
    }
}
