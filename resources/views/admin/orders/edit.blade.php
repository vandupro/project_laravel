@extends('admin_layout')
@section('title', 'Cập nhật thông tin giao hàng')
@section('order-active', 'active')
@section('content')
<div class="row" >
    <div class="col-lg-12">
        <section class="panel">

            <header class="panel-heading">
                Cập nhật thông tin giao hàng
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form id="" action="{{route('admin.orders.update')}}" method="post" role="form">
                        @csrf
                        <input type="hidden" name="id" value="{{$order->id}}">
                        <div class="form-group">
                            <label for="">Tên người nhận</label>
                            <input value="{{$order->ship->name}}" type="text" name="name" class="form-control"
                                placeholder="Điền tên người nhận">
                            @error('name')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input value="{{$order->ship->phone}}" type="text" name="phone" class="form-control"
                                placeholder="Điền số điện thoại">
                            @error('phone')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="">Tình trạng</label>
                            <select name="status" class="form-control input-sm m-bot15">
                                @foreach(config('common.status') as $key=>$value)
                                    <option @if($key==$order->status) selected @endif value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <textarea id="ck9" placeholder="Điền địa chỉ" style="resize:none" class="form-control"
                                name="address" id="" cols="30" rows="8">{{$order->ship->address}}</textarea>
                            @error('address')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div style="margin-bottom: 200px">
                            <a href="{{route('admin.orders.detail', ['id'=>$order->id])}}" class="btn btn-primary">Quay lại</a>
                            <button type="submit" class="btn btn-info">Cập nhật</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('javascript')
<script>
CKEDITOR.replace('ck9');
</script>

@endsection