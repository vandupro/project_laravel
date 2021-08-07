@extends('admin_layout')
@section('title', 'Danh sách danh mục')
@section('cate-active', 'active')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách danh mục
        </div>
        <div
            style="display: flex; justify-content:space-between; margin: 20px 20px; border: 1px solid #cccc; padding: 10px;">
            <div>
                @hasanyrole('Content|Admin')
                <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Thêm mới</a>
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
                    <a class="btn btn-info" href="{{route('admin.categories.index')}}">Hủy</a>
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
                        <th>Tên danh mục</th>
                        <th>Số lượng sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Hiển thị</th>
                        <th style="width:30px;">Hành động(sửa, xóa)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $c)
                    <tr>
                        <td>{{(($categories->currentPage()-1)*$pagesize) + $loop->iteration}}</td>
                        <td>{{$c->name}}</td>
                        <td>{{count($c->products)}}</td>
                        <td><span class="text-ellipsis">{{$c->desc}}</span></td>
                        <td><span class="text-ellipsis">
                                @if($c->status)
                                <a href="{{route('admin.categories.active', ['id'=>$c->id])}}"><span
                                        class="fa fa-thumbs-up"></span></a>
                                @else
                                <a href="{{route('admin.categories.active', ['id'=>$c->id])}}"><span
                                        class="fa fa-thumbs-down"></span></a>
                                @endif
                            </span></td>
                        <td style="width: 15%">
                            @hasanyrole('Content|Admin')
                            <a class="btn btn-warning" href="{{route('admin.categories.edit', ['id'=>$c->id])}}">Sửa</a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa không?')" class="btn btn-danger"
                                href="{{route('admin.categories.delete', ['id'=>$c->id])}}">Xóa</a>
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
                {{$categories->links()}}
            </div>
        </footer>
    </div>
</div>

@endsection