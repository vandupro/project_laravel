@extends('admin_layout')
@section('title', 'Tạo mới danh mục')
@section('cate-active', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form id="cateForm" action="{{route('admin.categories.store')}}" method="post" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên danh mục</label>
                            <input value="{{old('name')}}" type="text" name="name" class="form-control" id="exampleInputEmail1"
                                placeholder="Điền tên danh mục">
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
                            <textarea id="ck5" placeholder="Điền mô tả" style="resize:none" class="form-control" placeholder="Mô tả danh mục" name="desc" id="" cols="30" rows="8"></textarea>
                        </div>
                        <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Quay lại</a>
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
CKEDITOR.replace('ck5');
</script>
<script>
$(document).ready(function() {
    if ($("#cateForm").length > 0) {
        $("#cateForm").validate({
            rules: {
                name: {
                    required: true,
                    remote:{
                        url:"{{route('admin.categories.check-name-exist')}}",
                        type: "get",
                    }
                },
            },
            messages: {
                name: {
                    required: "Mời nhập tên danh mục",
                    remote: "Tên danh mục là khoảng trắng, hoặc đã tồn tại."
                },
            }
        });

    }
})
</script>
@endsection