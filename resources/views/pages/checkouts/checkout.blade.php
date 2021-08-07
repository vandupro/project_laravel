@extends('layout')
@section('title', 'Thanh toán')
@section('cart')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
                <li class="active">Thanh toán</li>
            </ol>
        </div>
        <!--/breadcrums-->

        <div class="register-req">
            <p>Vui lòng đăng nhập hoặc đăng ký để có thẻ thanh toán và xem lịch sử mua hàng</p>
        </div>
        <!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Điền thông tin đơn hàng</p>
                        <div class="form-one" style="margin-bottom: 20px">
                            <form method="post" action="{{route('save-checkout')}}">
                                @csrf
                                <input type="text" name="email" placeholder="Email*">
                                @error('email')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                                <input type="text" name="name" placeholder="Họ và tên *">
                                @error('name')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                                <input type="text" name="address" placeholder="Địa chỉ *">
                                @error('address')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                                <input type="text" name="phone" placeholder="Số điện thoại *">
                                @error('phone')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                                <textarea name="note" placeholder="Ghi chú đơn hàng của bạn" rows="8"></textarea>
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        <!-- <div class="payment-options">
            <span>
                <label><input type="checkbox"> Direct Bank Transfer</label>
            </span>
            <span>
                <label><input type="checkbox"> Check Payment</label>
            </span>
            <span>
                <label><input type="checkbox"> Paypal</label>
            </span>
        </div> -->
    </div>
</section>
<!--/#cart_items-->
@endsection