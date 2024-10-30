@extends('layouts.site')
@section('title', 'Trang Chủ')
@section('content')
    <div>
        <!--Banner-->
        <x-slider />
        <!--End banner-->

        <!--Category-->
        <x-product-category-home />
        <!--End Category-->
    </div>

    <!--Product-->
    <div class="product">
        <h1>Sản phẩm mới nhất</h1>
        <div class="list-product">
            <x-product-new />
        </div>
    </div>
    <div class="product">
        <h1>Sản phẩm khuyến mãi</h1>
        <div class="list-product">
            <x-flash-sale />
        </div>
    </div>
    <!--End product-->

    {{-- Post --}}
    <div class="post">
        <h2>Tin tức mới</h2>
        <x-newpost />
    </div>
    {{-- End Post --}}
@endsection
@section('header')
    <link rel="stylesheet" href="home.css">
@endsection
