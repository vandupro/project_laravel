@extends('layout')
@section('title', 'Tìm kiếm')
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
    <h2 class="title text-center">Tìm kiếm theo với từ khóa: {{$keyword}}</h2>
    @foreach($products as $product)
    <div class="col-sm-4">
        <a href="{{route('chi-tiet', ['id'=>$product->id])}}">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img height="256" src="{{'/storage/'.$product->image}}" alt="" />
                        <h2>{{number_format($product->price) . ' ' . 'VND'}}</h2>
                        <p>{{$product->name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ
                            hàng</a>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Thêm yêu thích</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Thêm so sánh</a></li>
                    </ul>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
<div class="row">
    {{$products->links()}}
</div>
@endsection