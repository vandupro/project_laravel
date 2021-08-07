@extends('admin_layout')
@section('title', 'Cập nhật quản trị viên')
@section('user-active', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">

            <header class="panel-heading">
                Cập nhật quản trị viên
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form id="userFormEdit" action="{{route('admin.users.update')}}" method="post" role="form">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="form-group">
                            <label for="">Họ tên</label>
                            <input value="{{$user->name}}" type="text" name="name" class="form-control">
                            @error('name')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input value="{{$user->email}}" type="text" name="email" class="form-control">
                            @error('email')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input value="{{$user->phone}}" type="text" name="phone" class="form-control">
                            @error('phone')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Quyền</label>
                            <div class="row" style="margin-top: 15px">
                                @foreach($roles as $role)
                                <div class="col-3">
                                    <input @if(in_array($role, $userRole)) checked @endif id="{{$role}}"
                                        style="transform:scale(2); margin: 0 10px 10px 0" type="checkbox"
                                        name="roles[]" value="{{$role}}">
                                    <label for="{{$role}}">{{ $role}}</label>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <a href="{{route('admin.users.index')}}" class="btn btn-primary">Quay lại</a>
                        <button type="submit" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection
@section('javascript')

@endsection