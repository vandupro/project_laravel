<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Ship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{   
    public function __construct()
    {
        $this->middleware('permission:order-list|order-create|order-edit|order-delete', ['only' => ['index']]);
        $this->middleware('permission:order-create', ['only' => ['create','store']]);
        $this->middleware('permission:order-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:order-delete', ['only' => ['delete']]);
    }
    public function index(Request $request){
        $pagesize = 5;
        
        $searchData = $request->except('page');

        $orders = DB::table('orders')
                    ->join('ships', 'orders.ship_id', '=', 'ships.id');
        if(count($request->all()) == 0){
            $orders = $orders->select('orders.*', 'ships.name')
                            ->orderBy('id', 'desc')
                            ->paginate($pagesize);

        }else{
            $orders = $orders->where('ships.name', 'like', "%" .$request->keyword . "%")
                            ->select('orders.*', 'ships.name')
                            ->orderBy('id', 'desc')
                            ->paginate($pagesize);
            
        }
        return view('admin.orders.index', compact('orders', 'searchData', 'pagesize'));
    }
    public function edit($id){
        $order = Order::find($id);
        if(!$order){
            return redirect(route('admin.orders.detail', ['id'=>$id]));
        }
        return view('admin.orders.edit', compact('order'));
    }
    public function update(Request $request){

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
            return redirect(route('admin.orders.index'));
        }
        $order->ship->name = $request->name;
        $order->ship->phone = $request->phone;
        $order->ship->address = $request->address;
        $order->ship->save();
        $order->status = $request->status;
        $order->save();
        return redirect(route('admin.orders.detail', ['id'=>$request->id]));
    }
    public function detail($id){
        $order = Order::with(['ship', 'customer', 'payment', 'products', 'coupon', 'fee_ship'])->find($id);
        //dd($order->coupon->discount);
        return view('admin.orders.detail', compact('order'));
    }
    public function delete($id){
        $order = Order::find($id);
        if(!$order){
            return redirect(route('admin.orders.index'));
        }
        $order->delete();
        return redirect(route('admin.orders.index'));

    }

    public function delete_detail(Request $request, $id, $detail_id){
        $order = Order::find($id);
        if(!$order){
            return redirect(route('admin.orders.index'));
        }
        $order->products()->wherePivot('id','=',$detail_id)->detach();
        if(!count($order->products)){
            $order->delete();
            return redirect(route('admin.orders.index'));
        }
        return redirect(route('admin.orders.detail', ['id'=>$id]));
    }

    public function update_order_detail(Request $request){
        foreach($request->quantity as $q){
            if($q <= 0){
                return redirect(route('admin.orders.index'));
            }
        }
        $order = Order::find($request->id);
        if(!$order){
            return redirect(route('admin.orders.index'));
        }
        for($i = 0; $i < count($order->products); $i++){
            $order->products[$i]->pivot->product_quantity = $request->quantity[$i];
            $order->products[$i]->pivot->save();
        }
        return redirect(route('admin.orders.detail', ['id'=>$request->id]));
    }
}
