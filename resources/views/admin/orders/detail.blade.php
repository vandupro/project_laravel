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
                        <th>Phương thức thanh toán</th>
                        <th>Tình trạng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$order->ship->name}}</td>
                        <td>{!!$order->ship->address!!}</td>
                        <td>{{$order->ship->phone}}</td>
                        <td>
                            {{$order->payment->method}}
                        </td>
                        <td><span class="text-ellipsis">
                            @if($order->status==1)
                                Đang xử lý
                            @elseif($order->status==2)
                                Đang giao hàng
                            @elseif($order->status==3)
                                Đã thanh toán
                            @elseif($order->status==4)
                                Hủy đơn
                            @endif
                        </span></td>
                        <td>
                            <a href="{{route('admin.orders.edit', ['id'=>$order->id])}}" class="btn btn-warning">Sửa</a>
                        </td>
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
        <form action="{{route('admin.orders.update_order_detail')}}" method="post">
        @csrf
            <input type="hidden" name="id" value="{{$order->id}}">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                        <th>Hành động</th>

                    </tr>
                </thead>

                <tbody>
                    @php
                        $sum = 0;
                    @endphp
                    @foreach($order->products as $p)
                    <tr>
                        <td>{{$p->name}}</td>
                        <td>
                            <img height="50px" src="{{'/storage/' . $p->image}}" alt="">
                        </td>
                        <td>
                            <input name="quantity[]" type="number" min="1" value="{{$p->pivot->product_quantity}}">
                        </td>
                        <td>{{number_format($p->pivot->product_price)}} VND</td>
                        <td>{{number_format($p->pivot->product_price * $p->pivot->product_quantity)}} VND</td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc muốn xóa không?')" 
                             href="{{route('admin.orders.delete_order_detail', [$order->id,$p->pivot->id])}}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                    @php
                    $sum += $p->pivot->product_price * $p->pivot->product_quantity;
                    @endphp
                    @endforeach
                </tbody>

            </table>
            <div style="text-align:center">
                <button type="submit" class="btn btn-success">Cập nhật</button>
            </div>
            </form>

            <div style="margin: 20px 0 20px 20px;">
                <!-- <p>Tiền thuế: </p> -->
                @php
                    $fee_ship = 0;
                    $coupon = 0;
                    $money_after_coupon = 0;
                    if($order->coupon){
                        if($order->coupon->type == 2){
                            $coupon = number_format($order->coupon->discount) . 'VND';
                            $money_after_coupon = $order->coupon->discount;
                        }
                            
                        if($order->coupon->type == 1){
                            $coupon = $order->coupon->discount . '%';
                            $money_after_coupon = $order->coupon->discount * $sum / 100 ;
                        }
                            
                    }else{
                        $coupon = "Không";
                    }
                    if($order->fee_ship){
                        $fee_ship = $order->fee_ship->fee;
                    }
                        
                @endphp
                <ul>
                    <li>Phí ship : {{number_format($fee_ship)}} VND</li>
                    @if($order->coupon)
                    <li>Mã giảm: {{$order->coupon->code}}</li>
                    @endif
                    <li>Được giảm: {{$coupon}}</li>
                    <li>Tổng tiền : {{number_format( $sum - $money_after_coupon)}} VND</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection