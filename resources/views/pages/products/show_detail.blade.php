@extends('layout')
@section('left')
<div class="left-sidebar">
    <h2>Danh mục sản phẩm</h2>
    <div class="panel-group category-products" id="accordian">
        <!--category-productsr-->
        @foreach($cates as $cate)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a class="set-acive" href="{{route('danh-muc', ['id'=>$cate->id])}}">{{$cate->name}}</a></h4>
            </div>
        </div>
        @endforeach
    </div>
    <!--/category-products-->

    <div class="brands_products">
        <!--brands_products-->
        <h2>Thương hiệu</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                @foreach($branches as $branch)
                <li><a href="{{route('thuong-hieu', ['id'=>$branch->id])}}"> <span
                            class="pull-right">({{count($branch->products)}})</span>{{$branch->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!--/brands_products-->
</div>
@endsection
@section('content')
<div class="product-details">
    <!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <div class="mySlides">
                <img src="{{'/storage/'. $product->image}}" style="width:326px">
            </div>
            @foreach($product->galleries as $gal)
            <div class="mySlides">
                <div class="numbertext">1 / 6</div>
                <img src="{{'/storage/'. $gal->image}}" style="width:326px">
            </div>
            @endforeach
            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <div style="margin-top:15px">
            <div class="row">
                <div class="column">
                    <img class="demo cursor" src="{{'/storage/'. $product->image}}" style="width:100%" onclick="currentSlide(1)">
                </div>
                @foreach($product->galleries as $key=>$value)
                <div class="column">
                    <img class="demo cursor" src="{{'/storage/'. $value->image}}" style="width:100%"
                        onclick="currentSlide({{$key+2}})" >
                </div>
                @endforeach
            </div>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information">
            <!--/product-information-->
            <img src="{{asset('frontend/images/new.jpg')}}" class="newarrival" alt="" />
            <h2>{{$product->name}}</h2>
            <p>Mã ID: {{$product->id}}</p>
            <img src="{{asset('frontend/images/rating.png')}}" alt="" />
            <div>
                <form action="{{route('add-cart')}}" method="post">
                    @csrf
                    <span>
                        <span>{{number_format($product->price) . ' ' . 'VND'}}</span><br>
                        <br><br>
                        <label>Số lượng:</label>
                        <input name="quantity" min="1" type="number" value="1" />
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button type="submit" class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i>
                            Thêm giỏ hàng
                        </button>
                    </span>
                </form>
            </div>

            <p><b>Tình trạng:</b> Còn hàng</p>
            <p><b>Điều kiện:</b> Hàng mới</p>
            <p><b>Thương hiệu:</b> {{$product->branch->name}}</p>
            <p><b>Danh mục:</b> {{$product->category->name}}</p>
        </div>
        <!--/product-information-->
    </div>
</div>
<!--features_items-->
<div class="category-tab shop-details-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Thông số</a></li>
            <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details">
            <p>{!!$product->desc!!}</p>
        </div>

        <div class="tab-pane fade" id="companyprofile">
            <p>{!!$product->content!!}</p>
        </div>
        <div class="tab-pane fade " id="reviews">
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>


                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name" />
                        <input type="email" placeholder="Email Address" />
                    </span>
                    <textarea name=""></textarea>
                    <b>Rating: </b> <img src="{{asset('frontend/images/rating.png')}}" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
<!--/category-tab-->
<div class="recommended_items">
    <!--recommended_items-->
    <h2 class="title text-center">Sản phẩm cùng loại</h2>

    <div class="row">
        @foreach($product_relates as $p)
        <a href="{{route('chi-tiet', ['id'=>$p->id])}}">
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <form>
                                @csrf
                                <input type="hidden" value="{{$p->id}}" class="cart_product_id_{{$p->id}}">
                                <a href="{{route('chi-tiet', ['id'=>$p->id])}}">
                                    <img style="height: 256px;" src="{{'/storage/'.$p->image}}" alt="" />
                                </a>
                                <h2>{{number_format($p->price) . ' ' . 'VND'}}</h2>
                                <p>{{$p->name}}</p>
                                <button type="button" class="btn btn-default add-to-cart" data-id="{{$p->id}}"
                                    name="add-to-cart">Thêm giỏ
                                    hàng</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    @if(count($product_relates) > 6)
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{route('danh-muc', ['id'=>$product->category->id])}}" class="btn btn-info">Xem thêm</a>
    </div>
    @endif
</div>
<!--/recommended_items-->
@endsection
<!--/product-details-->
@section('slide-css')
<style>
* {
    box-sizing: border-box;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
    position: relative;
}

/* Hide the images by default */
.mySlides {
    display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
    cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
    cursor: pointer;
    position: absolute;
    top: 40%;
    width: auto;
    padding: 16px;
    margin-top: -50px;
    color: white;
    font-weight: bold;
    font-size: 20px;
    border-radius: 0 3px 3px 0;
    user-select: none;
    -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
}

/* Container for image text */
.caption-container {
    text-align: center;
    background-color: #222;
    padding: 2px 16px;
    color: white;
}

.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Six columns side by side */
.column {
    float: left;
    width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
    opacity: 0.6;
}

.active,
.demo:hover {
    opacity: 1;
}
</style>
@endsection
@section('javascript')
<script>
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    // captionText.innerHTML = dots[slideIndex - 1].alt;
}
</script>
@endsection