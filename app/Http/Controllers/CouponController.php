<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(Request $request){
        $pagesize = 5;
        $searchData = $request->except('page');

        if(count($request->all()) == 0){
            $coupons = Coupon::orderBy('id', 'desc')->paginate($pagesize);
        }else{
            $coupons = Coupon::where('name', 'like', "%" .$request->keyword . "%")
                                    ->orderBy('id', 'desc')
                                    ->paginate($pagesize)
                                    ->appends($searchData);
        }
        return view('admin.coupons.index', compact('coupons', 'searchData', 'pagesize'));
    }
    public function create(){
        return view('admin.coupons.create');
    }
    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required|unique:coupons',
                'code' => 'required|unique:coupons',
                'discount'=>'required|integer|min:1',
                'quantity'=>'required|integer|min:1',

            ],
            [
                'name.required' => 'Mời điền tên mã',
                'name.unique' => 'Tên mã đã tồn tại',
                'code.required' => 'Mời nhập code',
                'code.unique' => 'Code đã tồn tại',
                'quantity.required' => 'Mời nhập số lượng',
                'quantity.integer' => 'Số lượng phải là số',
                'quantity.min' => 'Số lượng phải lớn hơn 0',
                'discount.required' => 'Mời nhập Mức giảm',
                'discount.integer' => 'Mức giảm phải là số',
                'discount.min' => 'Mức giảm phải lớn hơn 0',
            ]
        );
        if($request->type == 1){
            $request->validate(
                [
                    'discount'=>'required|integer|max:99',
                ],
                [
                    'discount.max' => 'Mức giảm phải nhỏ hơn 100',
                ]
                );
        }
        $model = new Coupon();

        $model->fill($request->all());
        $model->save();
        return redirect(route('admin.coupons.index'))->with('message', 'Thêm mã thành công');
    }
    public function edit($id){
        $coupon = Coupon::find($id);
        //dd($coupon);
        if (!$coupon) {
            return redirect(route('admin.coupons.index'));
        }
        return view('admin.coupons.edit', compact('coupon'));
    }
    public function update(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'code' => 'required',
                'discount'=>'required|integer|min:1',
                'quantity'=>'required|integer|min:1',

            ],
            [
                'name.required' => 'Mời điền tên mã',
                'code.required' => 'Mời nhập code',
                'quantity.required' => 'Mời nhập số lượng',
                'quantity.integer' => 'Số lượng phải là số',
                'quantity.min' => 'Số lượng phải lớn hơn 0',
                'discount.required' => 'Mời nhập Mức giảm',
                'discount.integer' => 'Mức giảm phải là số',
                'discount.min' => 'Mức giảm phải lớn hơn 0',
            ]
        );
        $model = Coupon::find($request->id);
        if (!$model) {
            return redirect(route('admin.coupons.index'));
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('admin.coupons.index'))->with('message', 'Cập nhật mã thành công');
    }
    public function delete($id){
        $coupon = Coupon::find($id);
        if (!$coupon) {
            return redirect(route('admin.coupons.index'));
        }
        $coupon->delete();
        return redirect(route('admin.coupons.index'));
    }
}
