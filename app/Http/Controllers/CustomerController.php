<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function login(){
        return view('pages.logins.login');
    }

    public function store(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email|unique:customers',
                'password'=>'required|min:6',
                'phone'=>'required',
            ],
            [
                'name.required'=>'Mời nhập họ tên',
                'email.required'=>'Mời nhập email',
                'email.unique'=>'Email đã tồn tại',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Mời nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 ký tự',
                'phone.required'=>'Mời nhập số điện thoại'
            ]
        );
        $customer = new Customer();
        $customer->fill($request->all());
        $customer->password = Hash::make($request->password);
        $customer->save();

        session(['customer'=>$customer]);
        return redirect(route('login'))->with('message', 'Bạn đã đăng ký thành công!');
    }

    public function logout(Request $request){
        $request->session()->forget('customer');
        return redirect(route('login'));
    }

    public function toLogin(Request $request){
        $customer_email = $request->customer_email;
        $result = DB::table('customers')->where('email', $customer_email)->first();
        if(!$result){
            $message = 'Email không chính xác!';
        }else{
            if(!Hash::check($request->customer_password, $result->password)){
                $message = 'Mật khẩu không chính xác!';
            }else{
                $request->session()->put('customer', $result);
                $message = 'Đăng nhập thành công!';
            }
        }
        return redirect(route('login'))->with('message', $message);
    }

}
