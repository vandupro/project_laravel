@extends('layout')
@section('title', 'Trang giỏ hàng')
@section('cart')

<section id="cart_items" style="margin-bottom: 200px">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ol>
        </div>
        @if(Cart::count() == 0)
        <h3 style="text-align:center">Bạn chưa có sản phẩm nào trong giỏ hàng</h3>
        <div style="text-align: center;">
            <a class="btn btn-info" href="{{route('trang-chu')}}">Thực hiện mua hàng</a>
        </div>
        @else
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
                            <a href="{{route('chi-tiet', ['id'=>$data->id])}}"><img height="100" width="100"
                                    src="{{'/storage/' . $data->options->image}}" alt=""></a>
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
                                <form action="{{route('update-quantity')}}" method="post">
                                    @csrf
                                    <input style="width: 50px" class="cart_quantity_input" type="number" min="1"
                                        name="quantity" value="{{number_format($data->qty)}}" autocomplete="off"
                                        size="2">
                                    <input type="hidden" name="rowId_update" value="{{$data->rowId}}">
                                    <input class="btn btn-default btn-sm" type="submit" value="Cập nhật">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{number_format($data->price*$data->qty)}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{route('delete-cart', ['id'=>$data->rowId])}}"><i
                                    class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng<span>{{Cart::subtotal()}}</span></li>
                        <li>Thuế <span>{{Cart::tax()}}</span></li>
                        <li>Thuế vận chuyển<span>Free</span></li>
                        <li>Thành tiền <span>{{Cart::total()}}</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>

                    @if(Session::has('ship_id'))
                    <a class="btn btn-default check_out" href="{{route('payment')}}">Thanh toán</a>
                    @else
                    <a class="btn btn-default check_out" href="{{route('checkout')}}">Thanh toán</a>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!--/#cart_items-->
<!-- <section id="do_action">
    <div class="container">


    </div>
</section> -->
<!--/#do_action-->
@endsection