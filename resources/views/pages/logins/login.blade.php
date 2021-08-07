@extends('layout')
@section('title', 'Đăng nhập đăng ký')
@section('cart')
<section id="form" style="margin-top: 50px">
    <!--form-->
    <div class="container">
        <div class="row">
            <div>
                @if(Session::has('message'))
                    <span style="color:green">{{Session::get('message')}}</span>
                @endif
            </div>
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Đăng nhập tài khoản</h2>
                    <form action="{{route('to-login')}}" method="post">
                        @csrf
                        <input type="email" placeholder="Địa chỉ mail" name="customer_email" require />
                        <input type="password" placeholder="Mật khẩu" name="customer_password" require />
                        <span>
                            <input type="checkbox" class="checkbox">
                            Ghi nhớ đăng nhập
                        </span>
                        <button type="submit" class="btn btn-default">Đăng nhập</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">HOẶC</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Đăng ký tài khoản!</h2>
                    <form action="" method="post">
                        @csrf
                        <input value="{{old('name')}}" type="text" placeholder="Họ và tên" name="name" require />
                        @error('name')
                            <span style="color:red">{{$message}}</span>
                        @enderror
                    
                        <input value="{{old('email')}}" type="email" placeholder="Email" name="email" require />
                        @error('email')
                            <span style="color:red">{{$message}}</span>
                        @enderror
                        <input type="password" placeholder="Mật khẩu" name="password" require />
                        @error('password')
                            <span style="color:red">{{$message}}</span>
                        @enderror
                        <input value="{{old('phone')}}" type="text" placeholder="Số điện thoại" name="phone" require />
                        @error('phone')
                            <span style="color:red">{{$message}}</span>
                        @enderror
                        <button type="submit" class="btn btn-default">Đăng ký</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->

@endsection