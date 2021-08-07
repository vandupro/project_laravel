@extends('admin_layout')
@section('title', 'Tạo mới quyền')
@section('role-active', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm quyền quản trị
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form action="{{route('admin.roles.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="row">
                                    <strong>Tên quyền</strong>
                                    <input type="text" name="name" class="form-control">
                                    @error('name')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12" style="border: 1px solid #cccc;margin-top: 15px">
                                <div>
                                    <strong>Hành động:</strong>
                                </div>
                                @error('permission')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                                <div class="row" style="padding: 15px">
                                    @foreach($permission as $value)
                                    <div class="col-3">
                                        <input id="{{$value->id}}" style="transform:scale(2); margin: 0 10px 10px 0"
                                            type="checkbox" name="permission[]" value="{{$value->id}}">
                                        <label for="{{$value->id}}">{{ $value->name }}</label>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <a href="{{route('admin.roles.index')}}"  class="btn btn-info mt-3">Quay lại</a>
                            <button type="submit" class="btn btn-primary mt-3">Thêm mới</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection
@section('javascript')

@endsection