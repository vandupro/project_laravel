@extends('layout')
@section('title', 'Lịch sử mua hàng')
@section('cart')

<section id="cart_items" style="margin-bottom: 200px">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
                <li class="active">Lịch sử mua hàng</li>
            </ol>
        </div>
        @if(!count($orders))
        <h3 style="text-align:center">Bạn chưa có hóa đơn nào trong lịch sử</h3>
        <div style="text-align: center;">
            <a class="btn btn-info" href="{{route('trang-chu')}}">Thực hiện mua hàng</a>
        </div>
        @else
        @if(Session::has('message'))
        <div style="margin-bottom: 15px">
            <span>{{Session::get('message')}}</span>
        </div>
        @endif
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td>STT</td>
                            <td>Ngày đặt</td>
                            <td class="price">Tình trạng</td>
                            <td class="total">Chi tiết</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $data)
                        <tr>
                            <td class="cart_description">
                                <h4><a href="">{{$loop->iteration}}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>{{date('d-m-Y h:i:s A', strtotime($data->created_at))}}</p>
                            </td>
                            <td class="cart_quantity">
                                @if($data->status==1)
                                    Đang xử lý
                                @elseif($data->status==2)
                                    Đang giao hàng
                                @elseif($data->status==3)
                                    Đã thanh toán
                                @elseif($data->status==4)
                                    Hủy đơn
                                @endif
                            </td>
                            <td>
                                <a href="{{route('history_detail', ['id'=>$data->id])}}" class="btn btn-info">Chi tiết</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        @endif
    </div>
</section>
@endsection