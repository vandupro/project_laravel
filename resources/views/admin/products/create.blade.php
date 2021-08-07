@extends('admin_layout')
@section('title', 'Tạo mới sản phẩm')
@section('product-active', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
            </header>
            <div class="panel-body">
                <form id="abc" action="{{route('admin.products.store')}}" method="post" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div style="display:flex; justify-content:space-between">
                        <div style="width: 45%">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input value="{{old('name')}}" type="text" id="name" name="name" class="form-control"
                                    placeholder="Điền tên sản phẩm">
                                @error('name')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Giá sản phẩm</label>
                                <input value="{{old('price')}}" type="text" id="price" name="price" class="form-control"
                                    placeholder="Điền giá sản phẩm">
                                @error('price')
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
                                <label for="">Danh mục</label>
                                <select name="cate_id" class="form-control input-sm m-bot15">
                                    @foreach($cates as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Thương hiệu</label>
                                <select name="branch_id" class="form-control input-sm m-bot15">
                                    @foreach($branches as $b)
                                    <option value="{{$b->id}}">{{$b->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div style="width: 45%">
                            <div class="form-group">
                                <label for="">Hình ảnh sản phẩm</label>
                                <input onchange="previewFile(this)" value="{{old('image')}}" type="file"
                                    id="product_image" name="image" class="form-control">
                                @error('image')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                                <div class="mt-3"
                                    style=" padding: 10px; width: 200px; height: 283px; border: 1px solid gray">
                                    <img style="max-width: 130px" id="previewimg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="border:1px solid #cccc; padding: 10px; min-height: 200px;">
                        <div class="row" id="gallery">

                        </div>
                    </div>
                    <div style="margin: 20px 0">
                        <button class="btn btn-success add-img" onclick="addFile()" type="button">Thêm ảnh liên
                            quan</button>
                    </div>
                    <div class="form-group">
                        <label for="">Tóm tắt sản phẩm</label>
                        <textarea id="ck1" placeholder="Điền mô tả" style="resize:none" class="form-control"
                            placeholder="Mô tả sản phẩm" name="content" cols="30" rows="8">{{old('content')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea id="ck2" placeholder="Điền mô tả" style="resize:none" class="form-control"
                            placeholder="Mô tả sản phẩm" name="desc" cols="30" rows="8">{{old('desc')}}</textarea>
                    </div>
                    <a href="{{route('admin.products.index')}}" class="btn btn-primary">Quay lại</a>
                    <button type="submit" class="btn btn-info">Thêm mới</button>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection
@section('javascript')
<!-- preview main product image -->
<script>
function previewFile(input) {
    var file = $("#product_image").get(0).files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function() {
            $('#previewimg').attr('src', reader.result);
        }
        reader.readAsDataURL(file);
    }
}
</script>
<!-- up load multiple related images of product -->
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
                                <button class="btn btn-danger" onclick="removeImg(this); ">Xóa</button>
                            </div>
                        </div>
                    `);

    })
})

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
<!-- ckeditor -->
<script>
CKEDITOR.replace('ck1');
CKEDITOR.replace('ck2');
</script>
<!-- jquery validation form -->
<script>
function addFile() {

}
$(document).ready(function() {
    if ($("#abc").length > 0) {
        $("#abc").validate({
            rules: {
                name: {
                    required: true,
                    remote: {
                        url: "{{route('admin.products.check-name-exist')}}",
                        type: "get",
                    }
                },
                price: {
                    required: true,
                    number: true,
                    min: 1000
                },
                image: {
                    required: true,
                    extension: "jpg|png|jpeg",
                },
                'galleries[]': {
                    required: true,
                    extension: "jpg|png|jpeg",
                }

            },
            messages: {
                name: {
                    required: "Mời nhập tên sản phẩm",
                    remote: "Tên sản phẩm là khoảng trắng, hoặc đã tồn tại."
                },
                price: {
                    required: "Mời nhập giá sản phẩm",
                    number: "Giá sản phẩm phải là số!",
                    min: "Giá phải lớn hơn hoặc bằng 1000"
                },
                image: {
                    required: "Mời chọn ảnh sản phẩm",
                    extension: "Ảnh phải là dạng jpg/png/jpeg",
                },
                'galleries[]': {
                    required: "Mời chọn ảnh sản phẩm",
                    extension: "Ảnh phải là dạng jpg/png/jpeg",
                },
            }
        });
        // $("input[type=file]").each(function() {
        //     $(this).rules("add", {
        //         required: true,
        //         accept: "png|jpe?g",
        //         messages: {
        //             required: "Mời chọn ảnh",
        //             accept: "Only jpeg, jpg or png images"
        //         }
        //     });
        // });
    }
})
</script>
@endsection