@extends('layout')
@section('title', 'Chi tiết đơn hàng')
@section('cart')

<section id="cart_items" style="margin-bottom: 200px">
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
                                <!-- <a @if($order->status!=1) disabled @endif
                                    href="{{route('admin.orders.edit', ['id'=>$order->id])}}"
                                    class="btn btn-warning">Sửa</a> -->
                                <button id="toggle_info" type="button" @if($order->status!=1) disabled @endif class="btn
                                    btn-warning">Sửa</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="update_info" style="width: 60%; display:none">
        <form id="" action="{{route('update_order_info')}}" method="post" role="form">
            @csrf
            <input type="hidden" name="id" value="{{$order->id}}">
            <div class="form-group">
                <label for="">Tên người nhận</label>
                <input value="{{$order->ship->name}}" type="text" name="name" class="form-control"
                    placeholder="Điền tên người nhận">
                @error('name')
                <span style="color:red">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input value="{{$order->ship->phone}}" type="text" name="phone" class="form-control"
                    placeholder="Điền số điện thoại">
                @error('phone')
                <span style="color:red">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Phương thức</label>
                <select name="payment_id" class="form-control input-sm m-bot15">
                    @foreach($payments as $pa)
                    <option @if($pa->id==$order->payment_id) selected @endif value="{{$pa->id}}">{{$pa->method}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <textarea id="ck9" placeholder="Điền địa chỉ" style="resize:none" class="form-control" name="address"
                    id="" cols="30" rows="8">{{$order->ship->address}}</textarea>
                @error('address')
                <span style="color:red">{{$message}}</span>
                @enderror
            </div>
            <div style="margin-bottom: 200px">
                <button type="submit" class="btn btn-info">Cập nhật</button>
            </div>
        </form>
    </div>
    <br>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Chi tiết đơn hàng
            </div>
            <div class="table-responsive">
                <form action="{{route('update_order_detail')}}" method="post">
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
                                    <input @if($order->status!=1) disabled @endif name="quantity[]" type="number"
                                    min="1"
                                    value="{{$p->pivot->product_quantity}}">
                                </td>
                                <td>{{number_format($p->pivot->product_price)}} VND</td>
                                <td>{{number_format($p->pivot->product_price * $p->pivot->product_quantity)}} VND</td>
                                <td>
                                    <a @if($order->status!=1) disabled @endif onclick="return confirm('Bạn có chắc muốn
                                        xóa không?')"
                                        href="{{route('history_detail_delete', [$order->id,$p->pivot->id])}}"
                                        class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @php
                            $sum += $p->pivot->product_price * $p->pivot->product_quantity;
                            @endphp
                            @endforeach
                        </tbody>

                    </table>
                    <div style="text-align:center">

                        <button @if($order->status!=1) disabled @endif type="submit" class="btn btn-success">Cập
                            nhật</button>
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
    <div style="text-align:center">
        <a href="{{route('history')}}" class="btn btn-info">Quay lại lịch sử</a>
    </div>
</section>

@endsection
@section('javascript')
<script>
$(document).ready(function() {
    $test = false;
    $('#toggle_info').click(function() {
        $test = !$test;
        if ($test)
            $(this).text('Hủy update')
        else
            $(this).text('Sửa')
        $('#update_info').toggle(1000, function() {});
    })
})
</script>
@endsection