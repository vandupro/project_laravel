@extends('layout')
@section('main-active', 'active')
@section('slider')
<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('frontend/images/girl1.jpg')}}" class="girl img-responsive" alt="" />
                                <img src="{{asset('frontend/images/pricing.png')}}" class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>100% Responsive Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('frontend/images/girl2.jpg')}}" class="girl img-responsive" alt="" />
                                <img src="{{asset('frontend/images/pricing.png')}}" class="pricing" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free Ecommerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('frontend/images/girl3.jpg')}}" class="girl img-responsive" alt="" />
                                <img src="{{asset('frontend/images/pricing.png')}}" class="pricing" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
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
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Sản phẩm mới nhất</h2>
    @foreach($products as $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$product->id}}" class="cart_product_id_{{$product->id}}">
                        <a href="{{route('chi-tiet', ['id'=>$product->id])}}">
                            <img style="height: 256px;" src="{{'/storage/'.$product->image}}" alt="" />
                        </a>
                        <h2>{{number_format($product->price) . ' ' . 'VND'}}</h2>
                        <p>{{$product->name}}</p>
                        <button type="button" class="btn btn-default add-to-cart" data-id="{{$product->id}}"
                            name="add-to-cart">Thêm giỏ
                            hàng</button>
                    </form>
                </div>
            </div>
            <!-- <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm yêu thích</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm so sánh</a></li>
                </ul>
            </div> -->
        </div>
    </div>
    @endforeach

</div>
<!--features_items-->

<!--/category-tab-->

<!--/recommended_items-->
@endsection