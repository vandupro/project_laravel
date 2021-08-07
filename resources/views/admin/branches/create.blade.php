@extends('admin_layout')
@section('title', 'Tạo mới thương hiệu')
@section('branch-active', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm thương hiệu sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form id="branchForm" action="{{route('admin.branches.store')}}" method="post" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên thương hiệu</label>
                            <input value="{{old('name')}}" type="text" name="name" class="form-control" id="exampleInputEmail1"
                                placeholder="Điền tên thương hiệu">
                            @error('name')
                                <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Hiển thị</label>
                            <select name="status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea id="ck7" placeholder="Điền mô tả" style="resize:none" class="form-control" placeholder="Mô tả thương hiệu" name="desc" id="" cols="30" rows="8"></textarea>
                        </div>
                        <a href="{{route('admin.branches.index')}}" class="btn btn-primary">Quay lại</a>
                        <button type="submit" class="btn btn-info">Thêm mới</button>
                        
                    </form>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection
@section('javascript')
<script>
CKEDITOR.replace('ck7');
</script>
<script>
$(document).ready(function() {
    if ($("#branchForm").length > 0) {
        $("#branchForm").validate({
            rules: {
                name: {
                    required: true,
                    remote:{
                        url:"{{route('admin.branches.check-name-exist')}}",
                        type: "get",
                    }
                },
            },
            messages: {
                name: {
                    required: "Mời nhập tên thương hiệu",
                    remote: "Tên thương hiệu là khoảng trắng, hoặc đã tồn tại."
                },
            }
        });

    }
})
</script>
@endsection