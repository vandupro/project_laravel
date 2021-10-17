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

        <div class="shopper-informations" style="margin-bottom: 200px">
            <div class="row">
                <div class="col-sm-6 clearfix">
                    <div class="bill-to">
                        <p>Điền thông tin đơn hàng</p>
                        
                        <div class="form-one" style="margin-bottom: 20px; width: 100%">
                            <form method="post" action="{{route('save-checkout')}}">
                                @csrf
                                <input type="hidden" value="@if(Session::has('fee') && Session::get('fee') >= 0) {{Session::get('fee')}} @else -1 @endif" name="fee_isset" id="fee_iset">
                                <input value="{{Session::get('customer')->email}}" type="text" name="email"
                                    placeholder="Email*">
                                @error('email')
                                <span style="color:red">{{$message}}</span>
                                @enderror

                                <input value="{{Session::get('customer')->name}}" type="text" name="name"
                                    placeholder="Họ và tên *">
                                @error('name')
                                <span style="color:red">{{$message}}</span>
                                @enderror

                                <input value="{{old('address')}}" type="text" name="address" placeholder="Địa chỉ *">
                                @error('address')
                                <span style="color:red">{{$message}}</span>
                                @enderror

                                <input value="{{Session::get('customer')->phone}}" type="text" name="phone"
                                    placeholder="Số điện thoại *">
                                @error('phone')
                                <span style="color:red">{{$message}}</span>
                                @enderror

                                <textarea name="note" placeholder="Ghi chú đơn hàng của bạn" rows="8"></textarea>
                                <button style="width: 100%" type="submit" class="btn btn-primary">Xác nhận đơn
                                    hàng</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6" style="margin: 20px 0">
                    <form method="post" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="">Chọn thành phố</label>
                            <select id="city" name="city" class="form-control input-sm m-bot15 choose city">
                                <option value="">--Chọn tỉnh/thành phố--</option>
                                @foreach($cities as $c)
                                <option value="{{$c->matp}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn quận huyện</label>
                            <select id="province" name="province" class="form-control input-sm m-bot15 choose province">
                                <option value="">--Chọn quận huyện--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn xã phường</label>
                            <select id="ward" name="ward" class="form-control input-sm m-bot15 ward">
                                <option value="">--Chọn xã phường--</option>
                            </select>
                        </div>
                        @error('fee_isset')
                            <div class="alert alert-danger" style="margin-bottom: 15px">
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                        <button name="caculate_ship" type="button" class="btn btn-sm btn-primary caculate_ship">Tính
                            phívận chuyển</button>
                    </form>
                    <div id="info_ship">
                        @if(Session::has('item') && Session::get('item') != '')
                        <h5>Thông tin vận chuyển</h5>
                        <ul>
                            <li>Tỉnh/Thành phố: {{Session::get('item')->city->name}}</li>
                            <li>Quận/Huyện: {{Session::get('item')->province->name}}</li>
                            <li>Phường/xã: {{Session::get('item')->ward->name}}</li>
                            <li>Phí vận chuyển: {{number_format(Session::get('item')->fee)}} VND</li>
                        </ul>
                        @else
                        <h5>Thông tin vận chuyển</h5>
                        <ul>
                            <li>Phí vận chuyển: 0 VND</li>
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 clearfix">
                    @if(Session::has('message'))
                    <div class="alert alert-success" style="margin-bottom: 15px">
                        <span>{{Session::get('message')}}</span>
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger" style="margin-bottom: 15px">
                        <span>{{Session::get('error')}}</span>
                    </div>
                    @endif
                    <form action="{{route('update-quantity')}}" method="post">
                        @csrf
                        <div class="table-responsive cart_info">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="cart_menu">
                                        <td class="image">Hình ảnh</td>
                                        <td>Tên sản phẩm</td>
                                        <td class="price">Giá</td>
                                        <td class="quantity">Số lượng</td>
                                        <td class="total">Tổng tiền</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(Cart::content() as $data)
                                    <tr>
                                        <td class="cart_product">
                                            <a href="{{route('chi-tiet', ['id'=>$data->id])}}"><img height="100"
                                                    width="100" src="{{'/storage/' . $data->options->image}}"
                                                    alt=""></a>
                                        </td>
                                        <td class="cart_description">
                                            <h4><a href="">{{$data->name}}</a></h4>
                                            <p>ID: {{$data->id}}</p>
                                        </td>
                                        <td class="cart_price">
                                            <p>{{number_format($data->price)}}</p>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">

                                                <input style="width: 50px" class="cart_quantity_input" type="number"
                                                    min="1" name="quantity[]" value="{{number_format($data->qty)}}"
                                                    autocomplete="off" size="2">
                                                <input type="hidden" name="rowId_update[]" value="{{$data->rowId}}">
                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">{{number_format($data->price*$data->qty)}}</p>
                                        </td>
                                        <td class="cart_delete">
                                            <a class="cart_quantity_delete"
                                                href="{{route('delete-cart', ['id'=>$data->rowId])}}"><i
                                                    class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div style="text-align:center; margin-bottom: 20px">
                            <button class="btn btn-warning">Cập nhật</button>
                            <a href="{{route('delete-all')}}" class="btn btn-danger">Xóa tất cả</a>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-sm-6">
                            <form style="display:flex" action="{{route('check_coupon')}}" method="post">
                                @csrf
                                <input required
                                    value="@if(Session::has('coupon')) {{Session::get('coupon')->code}} @endif"
                                    class="form-control" type="text" name="coupon" placeholder="Nhập mã giảm giá">
                                <button class="btn btn-default" type="submit">Tính mã giảm giá</button>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <div class="total_area">
                                <ul>
                                    <!-- <li>Tổng<span>{{Cart::subtotal()}}</span></li>
                        <li>Thuế <span>{{Cart::tax()}}</span></li> -->
                                    @php
                                    $coupon = Session::get('coupon');
                                    $totalPrice = str_replace(',', '', Cart::subtotal());
                                    if(Session::has('fee') && Session::get('fee') != 0){
                                    $totalPrice =(int)$totalPrice + Session::get('fee');
                                    }
                                    @endphp
                                    <li>Số tiền ban đầu: <span>{{Cart::subtotal()}} VND</span></li>
                                    @if(Session::has('fee') && Session::get('fee') != 0)
                                    <li>Phí vận chuyển<span id="fee">{{number_format(Session::get('fee'))}} VND</span>
                                    </li>
                                    @else
                                    <li>Phí vận chuyển<span id="fee">0</span></li>
                                    @endif

                                    <li id="money1">Thành tiền <span>{{number_format($totalPrice)}} VND</span></li>

                                    @if(Session::has('coupon'))
                                    <li id="xxx">
                                        @if($coupon->type == 1)
                                        Mã giảm: {{$coupon->discount}} %
                                        <p id="money2">
                                            Tổng tiền sau giảm:
                                            {{number_format($totalPrice*(100 - $coupon->discount)/100)}} VND
                                        </p>
                                        @elseif($coupon->type == 2)
                                        Tiền giảm: {{number_format($coupon->discount)}} VND
                                        <p id="money2">
                                            Tổng tiền sau giảm: {{number_format((int)$totalPrice - $coupon->discount)}}
                                            VND
                                        </p>
                                        @endif
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#cart_items-->
@endsection
@section('javascript')
<script>
$(document).ready(function() {
    $('.choose').on('change', function() {
        var action = $(this).attr('id');
        var ma_id = $(this).val();
        var _token = $('input[name="_token"]').val();
        var result = '';
        if (action == 'city') {
            result = 'province';
        } else {
            result = 'ward';
        }
        $.ajax({
            url: "{{route('order-ship')}}",
            method: 'POST',
            data: {
                action: action,
                _token: _token,
                ma_id: ma_id,
            },
            success: function(data) {
                $('#' + result).html(data);
            }

        });
    });
    $('.caculate_ship').click(function() {
        var nf = Intl.NumberFormat();
        var matp = $('.city').val();
        var maqh = $('.province').val();
        var xaid = $('.ward').val();
        var _token = $('input[name="_token"]').val();
        if (matp == '' && maqh == '' && xaid == '') {
            alert('Mời chọn địa điểm để tính phí vận chuyển');
        } else {
            $.ajax({
                url: "{{route('caculate-ship')}}",
                method: 'POST',
                data: {
                    matp: matp,
                    xaid: xaid,
                    _token: _token,
                    maqh: maqh,
                },
                success: function(data) {
                    $('#fee_iset').val(data.fee);
                    $('#fee').html(nf.format(data.fee) + ' VND');
                    $('#info_ship').html(data.output);
                    $('#xxx').html(data.output2);
                    $('#money1').html('Thành tiền <span>' + nf.format(data.money1) +
                        ' VND</span>')
                }
            })
        }

    })
})
</script>
@endsection