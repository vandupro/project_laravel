@extends('admin_layout')
@section('title', 'Danh sách mã giảm giá')
@section('coupon-active', 'active')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách mã giảm giá
        </div>
        <div
            style="display: flex; justify-content:space-between; margin: 20px 20px; border: 1px solid #cccc; padding: 10px;">
            <div>
                @hasanyrole('Content|Admin')
                <a href="{{route('admin.coupons.create')}}" class="btn btn-primary">Thêm mới</a>
                @endhasanyrole
            </div>
            <form style="display:flex;" action="" method="GET">
                <div>
                    <input placeholder="Điền tên sản phẩm" class="form-control" type="text" name="keyword"
                        @isset($searchData['keyword']) value="{{$searchData['keyword']}}" @endisset>
                </div>
                <div class="ml-3">
                    <button class="btn btn-success" type="submit">Tìm kiếm</button>
                </div>
                <div class="ml-3">
                    <a class="btn btn-info" href="{{route('admin.coupons.index')}}">Hủy</a>
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
                        <th style="width:15px;">
                            STT
                        </th>
                        <th>Tên mã giảm giá</th>
                        <th>Code</th>
                        <th>Số lượng</th>
                        <th>Kiểu giảm</th>
                        <th>Mức giảm</th>
                        <th style="width:30px;">Hành động(sửa, xóa)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coupons as $c)
                    <tr>
                        <td>{{(($coupons->currentPage()-1)*$pagesize) + $loop->iteration}}</td>
                        <td>{{$c->name}}</td>
                        <td>{{$c->code}}</td>
                        <td>{{$c->quantity}}</td>
                        <td>
                            @if($c->type == 2)
                            <span style="background-color:blue; padding: 5px; border-radius: 4px; color: white;">Tiền</span>
                            @else($c->type == 1)
                                <span style="background-color:green; padding: 5px; border-radius: 4px; color: white;">Phần trăm</span>
                            @endif
                        </td>
                        <td>
                            @if($c->type == 2)
                                {{number_format($c->discount)}} VND
                            @else($c->type == 1)
                                {{$c->discount}} %
                            @endif
                        </td>
                        <td style="width: 15%">
                            @hasanyrole('Sale|Admin')
                            <a class="btn btn-warning" href="{{route('admin.coupons.edit', ['id'=>$c->id])}}">Sửa</a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa không?')" class="btn btn-danger"
                                href="{{route('admin.coupons.delete', ['id'=>$c->id])}}">Xóa</a>
                            @else
                            Not authorized
                            @endhasanyrole
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">
                {{$coupons->links()}}
            </div>
        </footer>
    </div>
</div>

@endsection