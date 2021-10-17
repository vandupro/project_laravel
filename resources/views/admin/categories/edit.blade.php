@extends('admin_layout')
@section('title', 'Cập nhật danh mục')
@section('cate-active', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">

            <header class="panel-heading">
                Cập nhật danh mục sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form id="cateFormEdit" action="{{route('admin.categories.update')}}" method="post" role="form">
                        @csrf
                        <input type="hidden" name="id" value="{{$cate->id}}">
                        <div class="form-group">
                            <label for="">Tên danh mục</label>
                            <input value="{{$cate->name}}" type="text" name="name" class="form-control"
                                id="exampleInputEmail1" placeholder="Điền tên danh mục">
                            @error('name')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea id="ck6" placeholder="Điền mô tả" style="resize:none" class="form-control"
                                placeholder="Mô tả danh mục" name="desc" id="" cols="30"
                                rows="8">{{$cate->desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Hiển thị</label>
                            <select name="status" class="form-control input-sm m-bot15">
                                <option @if($cate->status==0) selected @endif value="0">Ẩn</option>
                                <option @if($cate->status==1) selected @endif value="1">Hiển thị</option>
                            </select>
                        </div>
                        <a class="btn btn-primary" href="{{route('admin.categories.index')}}">Quay lại</a>
                        <button type="submit" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection
@section('javascript')
<script>
var editor = CKEDITOR.replace( 'ck6' , {
    filebrowserBrowseUrl: "{{asset('backend/ckfinder/ckfinder.html')}}",
    filebrowserImageBrowseUrl: "{{asset('backend/ckfinder/ckfinder.html?Type=Images')}}",
});
</script>
<script>
$(document).ready(function() {
    if ($("#cateFormEdit").length > 0) {
        $("#cateFormEdit").validate({
            rules: {
                name: {
                    required: true,
                    remote:{
                        url:"{{route('admin.categories.check-name')}}",
                        type: "get",
                    }
                },
            },
            messages: {
                name: {
                    required: "Mời nhập tên danh mục",
                    remote: "Tên danh mục không được là khoảng trắng."
                },
            }
        });

    }
})
</script>
@endsection