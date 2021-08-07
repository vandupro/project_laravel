@extends('admin_layout')
@section('title', 'Tạo quản trị viên')
@section('user-active', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm quản trị viên
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form id="branchForm" action="{{route('admin.users.store')}}" method="post" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="">Họ tên</label>
                            <input value="{{old('name')}}" type="text" name="name" class="form-control">
                            @error('name')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input value="{{old('email')}}" type="text" name="email" class="form-control">
                            @error('email')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input value="{{old('password')}}" type="password" name="password" class="form-control">
                            @error('password')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input value="{{old('phone')}}" type="text" name="phone" class="form-control">
                            @error('phone')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Quyền</label>
                            <select class="form-control" name="roles" id="">
                                @foreach($roles as $key => $value)
                                <option value="{{$value}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <a href="{{route('admin.users.index')}}" class="btn btn-primary">Quay lại</a>
                        <button type="submit" class="btn btn-info">Thêm mới</button>

                    </form>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection
@section('javascript')


@endsection