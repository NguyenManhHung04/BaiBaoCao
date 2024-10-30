@extends('layouts.site')
@section('title', 'Trang Chủ')
@section('content')
    <div class="container my-5">
        <h1 class="text-center">Tất cả bài viết</h1>
        <div class="row">
            @foreach ($post_list as $postitem)
                <x-post :postitem="$postitem" />
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $post_list->links() }}
        </div>
    </div>
@endsection
@section('header')
    <link rel="stylesheet" href="home.css">
@endsection
