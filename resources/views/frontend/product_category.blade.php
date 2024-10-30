@extends('layouts.site')
@section('title', 'Trang Chủ')
@section('content')
    <div class="container">
        <h1>Danh mục dành cho: {{ $category->name }}</h1>
        <div class="row">
            @foreach ($product_list as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">
                            <img class="card-img-top img-fluid" src="{{ asset('images/products/' . $product->image) }}"
                                alt="{{ $product->name }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ number_format($product->price, 0, ',', '.') }} VND</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('header')
    <link rel="stylesheet" href="home.css">
@endsection
