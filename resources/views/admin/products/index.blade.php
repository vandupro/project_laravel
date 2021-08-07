@extends('admin_layout')
@section('title', 'Danh sách sản phẩm')
@section('product-active', 'active')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách sản phẩm
        </div>
        <form action="" method="GET" style="display:flex; margin: 20px 20px; padding: 20px 20px; border: 1px solid #cccc" >
            <div style="width: 15%">
                <label for="">Danh mục</label>
                <select class="form-control" name="cate_id" id="">
                    <option value="">Tất cả</option>
                    @foreach($cates as $cate)
                    <option @if(isset($searchData['cate_id']) && $cate->id == $searchData['cate_id']) selected @endif value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>
            </div>
            <div style="width: 15%" class="ml-3 mr-3">
                <label for="">Thương hiệu</label>
                <select class="form-control" name="branch_id" id="">
                    <option value="">Tất cả</option>
                    @foreach($branches as $branch)
                    <option @if(isset($searchData['branch_id']) && $branch->id == $searchData['branch_id']) selected @endif value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                </select>
            </div>
            <div style="width: 15%">
                <label for="">Trạng thái</label>
                <select class="form-control" name="status" id="">
                    <option value="all">Tất cả</option>
                    <option @if(isset($searchData['status']) &&  $searchData['status'] == 1) selected @endif value="1">Kích hoạt</option>
                    <option @if(isset($searchData['status']) &&  $searchData['status'] == 2) selected @endif value="2">Chưa kích hoạt</option>
                </select>
            </div>
            <div style="width: 15%" class="ml-3 mr-3">
                <label for="">Sắp xếp theo</label>
                <select class="form-control" name="order_by" >
                    <option value="0">Mặc định</option>
                    <option @if(isset($searchData['order_by']) &&  $searchData['order_by'] == 1) selected @endif  value="1">Tên alphabet</option>
                    <option @if(isset($searchData['order_by']) &&  $searchData['order_by'] == 2) selected @endif value="2">Tên giảm dần alphabet</option>
                    <option @if(isset($searchData['order_by']) &&  $searchData['order_by'] == 3) selected @endif value="3">Giá tăng dần</option>
                    <option @if(isset($searchData['order_by']) &&  $searchData['order_by'] == 4) selected @endif value="4">Giá giảm dần</option>
                </select>
            </div>
            <div style="width: 25%">
                <label for="">Tên sản phẩm</label>
                <input placeholder="Điền tên sản phẩm" class="form-control" type="text" name="keyword" @isset($searchData['keyword']) value="{{$searchData['keyword']}}" @endisset>
            </div>
            <div class="ml-3" style="margin-top: 22px">
                <button class="btn btn-success" type="submit">Lọc</button>
            </div>
            <div class="ml-3" style="margin-top: 22px">
                <a class="btn btn-info" href="{{route('admin.products.index')}}">Hủy Lọc</a>
            </div>
        </form>
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
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Thương hiệu</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Hiển thị</th>
                        <th style="width:30px;">Hành động(sửa, xóa)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $c)
                    <tr>
                        <td>{{(($products->currentPage()-1)*$pagesize) + $loop->iteration}}</td>
                        <td>{{$c->name}}</td>
                        <td>
                            <img width="50px" height="50px" src="{{'/storage/' . $c->image}}" alt="">
                        </td>
                        <td>{{$c->branch->name}}</td>
                        <td>{{$c->category->name}}</td>
                        <td>{{number_format($c->price)}}</td>
                        <td><span class="text-ellipsis">
                                @if($c->status == 1)
                                <a href="{{route('admin.products.active', ['id'=>$c->id])}}"><span
                                        class="fa fa-thumbs-up"></span></a>
                                @else
                                <a href="{{route('admin.products.active', ['id'=>$c->id])}}"><span
                                        class="fa fa-thumbs-down"></span></a>
                                @endif
                            </span></td>
                        <td style="width: 15%">
                            @hasanyrole('Admin|Content')
                            <a class="btn btn-warning" href="{{route('admin.products.edit', ['id'=>$c->id])}}">Sửa</a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa không?')" class="btn btn-danger"
                                href="{{route('admin.products.delete', ['id'=>$c->id])}}">Xóa</a>
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
                <!-- <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div> -->
                {{$products->links()}}
            </div>
        </footer>
    </div>
</div>

@endsection