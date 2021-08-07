@extends('layout')
@section('title', 'Hình thức Thanh toán')
@section('cart')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
                <li class="active"> Hình thức Thanh toán</li>
            </ol>
        </div>
        <!--/breadcrums-->
        <div>Chọn hình thức thanh toán:</div>
        <form style="margin: 50px 0 200px 0; padding: 50px; border: 1px solid #cccc; border-radius: 10px" 
            action="{{route('order-place')}}" method="post">
            @csrf
            <div style="margin-top: 20px; margin-bottom: 20px" class="payment-options">
                <span>
                    <label><input name="method" value="1" style="margin-right: 10px" type="radio">Thẻ ATM</label>
                </span>
                <span>
                    <label><input name="method" value="2" checked style="margin-right: 10px" type="radio">Tiền mặt</label>
                </span>
                <span>
                    <label><input name="method" value="3" style="margin-right: 10px" type="radio">Paypal</label>
                </span>
            </div>
            <button type="submit" class="btn btn-success">Đặt hàng</button>
        </form>
    </div>
</section>
<!--/#cart_items-->
@endsection