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
                @foreach($payments as $p)
                <span>
                    <label><input name="method" value="{{$p->id}}" style="margin-right: 10px" type="radio">{{$p->method}}</label>
                </span>
                @endforeach
                @error('method')
                    <div>
                        <span style="color:red">{{$message}}</span>
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Đặt hàng</button>
        </form>
    </div>
</section>
<!--/#cart_items-->
@endsection