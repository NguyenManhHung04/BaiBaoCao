@extends('layouts.site')
@section('title', 'Trang Chủ')
@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p class="card-text">{{ $post->content }}</p>
                <p class="card-text"><small class="text-muted">Đăng bởi {{ $post->author }} vào
                        {{ $post->created_at->format('d/m/Y') }}</small></p>
                <img class="img-fluid" src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->image }}">
                <p> {!! $post->detail !!}</p>
                {{-- <a href="{{ route('site.postdetail_slug') }}" class="btn btn-primary">Quay lại danh sách bài viết</a> --}}
            </div>
        </div>
    </div>
@endsection
@section('header')
    <link rel="stylesheet" href="home.css">
@endsection
