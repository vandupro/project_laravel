<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Category;
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
        return redirect(route('show-cart'));
    }

    public function updateQuantity(Request $request){
        $rowId = $request->rowId_update;
        $qty = $request->quantity;
        if(!Cart::get($rowId))
            return redirect(route('show-cart'));
        Cart::update($rowId, $qty);
        return redirect(route('show-cart'));
    }
}
