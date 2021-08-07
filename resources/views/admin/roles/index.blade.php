@extends('admin_layout')
@section('title', 'Danh sách quyền')
@section('role-active', 'active')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách quyền
        </div>
        <div style="display: flex; justify-content:space-between; margin: 20px 20px; border: 1px solid #cccc; padding: 10px;">
            <div>
                @hasanyrole('Admin')
                <a href="{{route('admin.roles.create')}}" class="btn btn-primary">Thêm mới</a>
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
                    <a class="btn btn-info" href="{{route('admin.roles.index')}}">Hủy</a>
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
                        <th>Tên quyền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $c)
                    <tr>
                        <td style="width: 15%">{{(($roles->currentPage()-1)*$pagesize) + $loop->iteration}}</td>
                        <td>{{$c->name}}</td>
                        <td style="width: 25%">
                            <a class="btn btn-warning" href="{{route('admin.roles.show', ['id'=>$c->id])}}">Chi tiết</a>
                            @hasanyrole('Admin')
                            <a class="btn btn-warning" href="{{route('admin.roles.edit', ['id'=>$c->id])}}">Sửa</a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa không?')" class="btn btn-danger" 
                            href="{{route('admin.roles.delete', ['id'=>$c->id])}}">Xóa</a>
                            @endhasanyrole
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">
                {{$roles->links()}}
            </div>
        </footer>
    </div>
</div>

@endsection