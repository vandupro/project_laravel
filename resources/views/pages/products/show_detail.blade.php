@extends('layout')
@section('left')
<div class="left-sidebar">
    <h2>Danh mục sản phẩm</h2>
    <div class="panel-group category-products" id="accordian">
        <!--category-productsr-->
        @foreach($cates as $cate)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="{{route('danh-muc', ['id'=>$cate->id])}}">{{$cate->name}}</a></h4>
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
            <img src="{{'/storage/' . $product->image}}" alt="" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <a href=""><img src="{{asset('frontend/images/similar1.jpg')}}" alt=""></a>
                    <a href=""><img src="{{asset('frontend/images/similar2.jpg')}}" alt=""></a>
                    <a href=""><img src="{{asset('frontend/images/similar3.jpg')}}" alt=""></a>
                </div>
                <div class="item">
                    <a href=""><img src="{{asset('frontend/images/similar1.jpg')}}" alt=""></a>
                    <a href=""><img src="{{asset('frontend/images/similar2.jpg')}}" alt=""></a>
                    <a href=""><img src="{{asset('frontend/images/similar3.jpg')}}" alt=""></a>
                </div>
                <div class="item">
                    <a href=""><img src="{{asset('frontend/images/similar1.jpg')}}" alt=""></a>
                    <a href=""><img src="{{asset('frontend/images/similar2.jpg')}}" alt=""></a>
                    <a href=""><img src="{{asset('frontend/images/similar3.jpg')}}" alt=""></a>
                </div>

            </div>

            <!-- Controls -->
            <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
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
            <p>{{$product->desc}}</p>
        </div>

        <div class="tab-pane fade" id="companyprofile">
            <p>{{$product->content}}</p>
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
                            <img src="{{'/storage/' . $p->image}}" alt="" />
                            <h2>{{number_format($p->price) . ' ' . 'VND'}}</h2>
                            <p>{{$p->name}}</p>
                            <a href="#" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{route('danh-muc', ['id'=>$product->category->id])}}" class="btn btn-info">Xem thêm</a>
    </div>
</div>
<!--/recommended_items-->
@endsection
<!--/product-details-->