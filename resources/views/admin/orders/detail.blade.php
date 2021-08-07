@extends('admin_layout')
@section('title', 'Chi tiết đơn hàng')
@section('order-active', 'active')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin tài khoản
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$order->customer->name}}</td>
                        <td>{{$order->customer->phone}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin vận chuyển
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên người nhận</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$order->ship->name}}</td>
                        <td>{{$order->ship->address}}</td>
                        <td>{{$order->ship->phone}}</td>
                        
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
</div>
<br>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Chi tiết đơn hàng
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $p)
                    <tr>
                        <td>{{$p->name}}</td>
                        <td>
                            <img height="50px" src="{{'/storage/' . $p->image}}" alt="">
                        </td>
                        <td>{{$p->pivot->product_quantity}}</td>
                        <td>{{$p->pivot->product_price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection