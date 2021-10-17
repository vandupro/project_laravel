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
        @if(Session::has('message'))
        <div style="margin-bottom: 15px">
            <span>{{Session::get('message')}}</span>
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

                                    <input style="width: 50px" class="cart_quantity_input" type="number" min="1"
                                        name="quantity[]" value="{{number_format($data->qty)}}" autocomplete="off"
                                        size="2">
                                    <input type="hidden" name="rowId_update[]" value="{{$data->rowId}}">
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
            <div style="text-align:center; margin-bottom: 20px">
                <button class="btn btn-warning">Cập nhật</button>
                <a href="{{route('delete-all')}}" class="btn btn-danger">Xóa tất cả</a>
            </div>
        </form>
        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
                    <a class="btn btn-default check_out" href="{{route('checkout')}}">Thanh toán</a>
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