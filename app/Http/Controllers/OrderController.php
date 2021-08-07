<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
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

    }
    public function detail($id){
        $order = Order::with(['ship', 'customer', 'payment', 'products'])->find($id);
        return view('admin.orders.detail', compact('order'));
    }
    public function delete($id){

    }
}
