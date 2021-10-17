@extends('admin_layout')
@section('title', 'Cập nhật thương hiệu')
@section('branch-active', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">

            <header class="panel-heading">
                Cập nhật thương hiệu sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form id="branchFormEdit" action="{{route('admin.branches.update')}}" method="post" role="form">
                        @csrf
                        <input type="hidden" name="id" value="{{$branch->id}}">
                        <div class="form-group">
                            <label for="">Tên thương hiệu sản phẩm</label>
                            <input value="{{$branch->name}}" type="text" name="name" class="form-control"
                                id="exampleInputEmail1" placeholder="Điền tên thương hiệu sản phẩm">
                            @error('name')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea id="ck8" placeholder="Điền mô tả" style="resize:none" class="form-control"
                                placeholder="Mô tả thương hiệu sản phẩm" name="desc" id="" cols="30"
                                rows="8">{{$branch->desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Hiển thị</label>
                            <select name="status" class="form-control input-sm m-bot15">
                                <option @if($branch->status==0) selected @endif value="0">Ẩn</option>
                                <option @if($branch->status==1) selected @endif value="1">Hiển thị</option>
                            </select>
                        </div>
                        <a href="{{route('admin.branches.index')}}" class="btn btn-primary">Quay lại</a>
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
var editor = CKEDITOR.replace( 'ck8' , {
    filebrowserBrowseUrl: "{{asset('backend/ckfinder/ckfinder.html')}}",
    filebrowserImageBrowseUrl: "{{asset('backend/ckfinder/ckfinder.html?Type=Images')}}",
});
</script>
<script>
$(document).ready(function() {
    if ($("#orderFormEdit").length > 0) {
        $("#orderFormEdit").validate({
            rules: {
                name: {
                    required: true,
                    remote: {
                        url: "{{route('admin.branches.check-name')}}",
                        type: "get",
                    }
                },
            },
            messages: {
                name: {
                    required: "Mời nhập tên thương hiệu",
                    remote: "Tên thương hiệu không được là khoảng trắng"
                },
            }
        });

    }
})
</script>
@endsection