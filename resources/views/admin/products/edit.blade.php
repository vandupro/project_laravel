@extends('admin_layout')
@section('title', 'Cập nhật sản phẩm')
@section('product-active', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
            </header>
            <div class="panel-body">
                <form id="form-product-edit" action="{{route('admin.products.update')}}" method="post" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div style="display:flex; justify-content:space-between">
                        <div style="width: 45%">
                            <div class="form-group">
                                <label for="">Tên sản phẩm</label>
                                <input value="{{$product->name}}" type="text" name="name" class="form-control"
                                    placeholder="Điền tên sản phẩm">
                                @error('name')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Giá sản phẩm</label>
                                <input value="{{$product->price}}" type="text" name="price" class="form-control"
                                    placeholder="Điền giá sản phẩm">
                                @error('price')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Hiển thị</label>
                                <select name="status" class="form-control input-sm m-bot15">
                                    <option @if($product->status==0) selected @endif value="0">Ẩn</option>
                                    <option @if($product->status==1) selected @endif value="1">Hiển thị</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục</label>
                                <select name="cate_id" class="form-control input-sm m-bot15">
                                    @foreach($cates as $c)
                                    <option @if($product->cate_id==$c->id) selected @endif
                                        value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Thương hiệu</label>
                                <select name="branch_id" class="form-control input-sm m-bot15">
                                    @foreach($branches as $b)
                                    <option @if($product->branch_id==$b->id) selected @endif
                                        value="{{$b->id}}">{{$b->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div style="width: 45%">

                            <div class="form-group">
                                <label for="">Hình ảnh sản phẩm</label>
                                <input onchange="previewFile(this)" value="{{old('image')}}" type="file"
                                    id="update_product_image" name="image" class="form-control">
                                @error('image')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                                <div class="mt-3" style=" padding: 10px; width: 200px; height: 283px; border: 1px solid gray">
                                    <img src="{{'/storage/'.$product->image}}" style="width: 100%" id="previewimg"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="border:1px solid #cccc; padding: 10px; min-height: 200px;">
                        <input type="hidden" name="removeGalleryIds" value="">
                        <div class="row" id="gallery">
                            @php
                                $i=1;
                            @endphp
                            @foreach ($product->galleries as $gl)
                            <div class="col-2" id="{{$gl->id}}">
                                <div class="mb-3">Ảnh: {{$i}}</div>
                                <div style="width: 100%; height: 200px; border: 1px solid gray; padding: 10px">
                                    <img style="width: 100%; height: 100%" src="{{'/storage/' . $gl->image}}">
                                </div>
                                <div style="margin: 20px 0; text-align:center">
                                    <button type="button" class="btn btn-danger"
                                        onclick="removeGalleryImg(this, {{$gl->id}})">Xóa</button>
                                </div>
                            </div>
                            @php
                                $i++;
                            @endphp
                            @endforeach
                        </div>
                        <div>
                            @error('galleries')
                                <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div style="margin: 20px 0">
                        <button class="btn btn-success add-img" type="button">Thêm ảnh liên quan</button>
                    </div>
                    <div class="form-group">
                        <label for="">Tóm tắt sản phẩm</label>
                        <textarea id="ck3" placeholder="Điền mô tả" style="resize:none" class="form-control"
                            placeholder="Mô tả sản phẩm" name="content" cols="30"
                            rows="8">{{$product->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea id="ck4" placeholder="Điền mô tả" style="resize:none" class="form-control"
                            placeholder="Mô tả sản phẩm" name="desc" cols="30" rows="8">{{$product->desc}}</textarea>
                    </div>
                    <a href="{{route('admin.products.index')}}" class="btn btn-primary">Quay lại</a>
                    <button type="submit" class="btn btn-info">Cập nhật</button>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection
@section('javascript')
<!-- preview main image -->
<script>
function previewFile(input) {
    var file = $("#update_product_image").get(0).files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function() {
            $('#previewimg').attr('src', reader.result);
        }
        reader.readAsDataURL(file);
    }
}
</script>
<!-- ckeditor -->
<script>
var editor = CKEDITOR.replace( 'ck3' , {
    filebrowserBrowseUrl: "{{asset('backend/ckfinder/ckfinder.html')}}",
    filebrowserImageBrowseUrl: "{{asset('backend/ckfinder/ckfinder.html?Type=Images')}}",
});
var editor = CKEDITOR.replace( 'ck4', {
    filebrowserBrowseUrl: "{{asset('backend/ckfinder/ckfinder.html')}}",
    filebrowserImageBrowseUrl: "{{asset('backend/ckfinder/ckfinder.html?Type=Images')}}",
} );
</script>
<!-- upload multiple related images -->
<script>
$(document).ready(function() {
    $('.add-img').click(function() {
        var rowId = Date.now();
        $('#gallery').append(`
                        <div class="col-2">
                            <div class="mb-3">
                                <input row_id="${rowId}" type="file" name="galleries[]" class="form-control" onchange="loadFile(event, ${rowId})">
                            </div>
                            <div style="width: 100%; height: 200px; border: 1px solid gray; padding: 10px">
                                <img row_id="${rowId}" src="" style="width: 100%; height: 100%">
                            </div>
                            <div style="margin: 20px 0; text-align:center">
                                <button class="btn btn-danger" onclick="removeImg(this)">Xóa</button>
                            </div>
                        </div>
                    `);

    })
})

function removeGalleryImg(el, galleryId = 0) {
    $(el).parent().parent().remove();
    if (galleryId != 0) {
        let removeIds = $(`[name="removeGalleryIds"]`).val();
        removeIds += `${galleryId}|`
        $(`[name="removeGalleryIds"]`).val(removeIds);
    }
}

function loadFile(event, el_rowId) {
    var reader = new FileReader();
    var output = document.querySelector(`img[row_id="${el_rowId}"]`);
    reader.onload = function() {
        output.src = reader.result;
    };
    if (event.target.files[0] == undefined) {
        output.src = "";
        return false;
    } else {
        reader.readAsDataURL(event.target.files[0]);
    }
};
function removeImg(el) {
    $(el).parent().parent().remove();
}
</script>
<!-- jquery validation -->
<script>
$(document).ready(function() {
    if ($("#form-product-edit").length > 0) {
        $("#form-product-edit").validate({
            rules: {
                name: {
                    required: true,
                    remote: {
                        url: "{{route('admin.products.check-name')}}",
                        type: "get",
                    }
                },
                price: {
                    required: true,
                    number: true,
                    min: 1000
                },
                image: {
                    extension: "jpg|png|jpeg",
                },
            },
            messages: {
                name: {
                    required: "Mời nhập tên sản phẩm",
                    remote: "Tên sản phẩm không được là khoảng trắng"
                },
                price: {
                    required: "Mời nhập giá sản phẩm",
                    number: "Giá sản phẩm phải là số!",
                    min: "Giá phải lớn hơn hoặc bằng 1000"
                },
                image: {
                    extension: "Ảnh phải là dạng jpg/png/jpeg",
                },
            }
        });
    }
})
</script>
@endsection