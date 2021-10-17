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
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Tìm kiếm theo với từ khóa: {{$keyword}}</h2>
    @foreach($products as $product)
    <div class="col-sm-4">
        <a href="{{route('chi-tiet', ['id'=>$product->id])}}">
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
            </div>
        </a>
    </div>
    @endforeach
</div>
<div class="row">
    {{$products->links()}}
</div>
@endsection