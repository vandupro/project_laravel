@extends('admin_layout')
@section('title', 'Tạo mới mã giảm giá')
@section('coupon-active', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm mã giảm giá
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form id="couponForm" action="{{route('admin.coupons.store')}}" method="post" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên mã</label>
                            <input value="{{old('name')}}" type="text" name="name" class="form-control" "
                                placeholder="Điền tên mã">
                            @error('name')
                                <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Code</label>
                            <input value="{{old('code')}}" type="text" name="code" class="form-control" "
                                placeholder="Điền code">
                            @error('code')
                                <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng</label>
                            <input value="{{old('quantity')}}" tyluowngjnumber min="1" name="quantity" class="form-control" "
                                placeholder="Điền số lượng">
                            @error('quantity')
                                <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Giảm theo</label>
                            <select class="form-control" name="type" id="">
                                <option value="1">Phần trăm</option>
                                <option value="2">Tiền</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Số tiền hoặc % giảm</label>
                            <input value="{{old('discount')}}" tyluowngjnumber min="1" name="discount" class="form-control" "
                                placeholder="Điền discount">
                            @error('discount')
                                <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <a href="{{route('admin.coupons.index')}}" class="btn btn-primary">Quay lại</a>
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