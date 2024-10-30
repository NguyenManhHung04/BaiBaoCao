@extends('layouts.site')
@section('title', 'Trang Chủ')
@section('content')
    <div class="product">
        <h1>Tất cả sản phẩm</h1>
        <div class="list-product">
            <x-product-new />
        </div>
    </div>

@endsection
@section('header')
    <link rel="stylesheet" href="home.css">
@endsection
