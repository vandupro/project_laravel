@extends('admin_layout')
@section('title', 'Danh sách quản trị viên')
@section('user-active', 'active')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách quản trị viên
        </div>
        <div style="display: flex; justify-content:space-between; margin: 20px 20px; border: 1px solid #cccc; padding: 10px;">
            <div>
                @role('Admin')
                <a href="{{route('admin.users.create')}}" class="btn btn-primary">Thêm mới</a>
                @endrole
            </div>
            <form style="display:flex;" action="" method="GET">
                <div>
                    <input class="form-control" type="text" name="keyword"
                        @isset($searchData['keyword']) value="{{$searchData['keyword']}}" @endisset>
                </div>
                <div class="ml-3">
                    <button class="btn btn-success" type="submit">Tìm kiếm</button>
                </div>
                <div class="ml-3">
                    <a class="btn btn-info" href="{{route('admin.users.index')}}">Hủy</a>
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
                        <th>Họ tên</th>
                        <th>Quyền</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $c)
                    <tr>
                        <td>{{(($users->currentPage()-1)*$pagesize) + $loop->iteration}}</td>
                        <td>{{$c->name}}</td>
                        <td>
                            @if(!empty($c->getRoleNames()))
                            @foreach($c->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                            @endif
                        </td>
                        <td>{{$c->email}}</td>
                        <td>{{$c->phone}}</td>
                        <td style="width: 15%">
                            @role('Admin')
                            <a class="btn btn-warning" href="{{route('admin.users.edit', ['id'=>$c->id])}}">Sửa</a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa không?')" 
                            class="btn btn-danger" href="{{route('admin.users.delete', ['id'=>$c->id])}}">Xóa</a>
                            @endrole
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">
                {{$users->links()}}
            </div>
        </footer>
    </div>
</div>

@endsection