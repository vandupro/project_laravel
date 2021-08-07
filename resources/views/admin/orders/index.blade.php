@extends('admin_layout')
@section('title', 'Danh sách đơn hàng')
@section('order-active', 'active')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách đơn hàng
        </div>
        <div style="margin: 20px 20px; border: 1px solid #cccc; padding: 10px;">
            <form style="display:flex;" action="" method="GET">
                <div>
                    <input placeholder="Điền tên sản phẩm" class="form-control" type="text" name="keyword"
                        @isset($searchData['keyword']) value="{{$searchData['keyword']}}" @endisset>
                </div>
                <div class="ml-3">
                    <button class="btn btn-success" type="submit">Tìm kiếm theo tên khách hàng</button>
                </div>
                <div class="ml-3">
                    <a class="btn btn-info" href="{{route('admin.orders.index')}}">Hủy</a>
                </div>
            </form>
        </div>
        @if(Session::has('message'))
        <div style="margin-left: 15px">
            <span class="text-success ">{{Session::get('message')}}</span>
        </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            STT
                        </th>
                        <th>Khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Tình trạng</th>
                        <th>Chi tiết</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $c)
                    <tr>
                        <td>{{(($orders->currentPage()-1)*$pagesize) + $loop->iteration}}</td>
                        <td>{{$c->name}}</td>
                        <td><span class="text-ellipsis">{{number_format($c->total, 0, ',', ',')}}</span></td>
                        <td><span class="text-ellipsis">
                            @if($c->status==1)
                                Đang xử lý
                            @elseif($c->status==2)
                                Đang giao hàng
                            @elseif($c->status==3)
                                Đã thanh toán
                            @endif
                        </span></td>
                        <td><span class="text-ellipsis">
                            <a class="btn btn-info" href="{{route('admin.orders.detail', ['id'=>$c->id])}}">Chi tiết</a>
                            </span></td>
                        <td style="width: 15%">
                            @hasanyrole('Admin|Sale')
                            <a class="btn btn-warning" href="{{route('admin.orders.edit', ['id'=>$c->id])}}">Sửa</a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa không?')" 
                            class="btn btn-danger" href="{{route('admin.orders.delete', ['id'=>$c->id])}}">Xóa</a>
                            @endhasanyrole
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">
                {{$orders->links()}}
            </div>
        </footer>
    </div>
</div>

@endsection