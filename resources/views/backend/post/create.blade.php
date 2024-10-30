@extends('layouts.admin')
@section('title','Quản lý liên hệ')
@section('content')

  <div class="content">
        <!-- CONTENT -->
        <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Thêm mới bài viết</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" name="create" class="btn btn-sm btn-success">
                                    <i class="fa fa-save"></i> Lưu
                                </button>
                                <a class="btn btn-sm btn-danger" href="{{ route('admin.post.index') }}">
                                    <i class="fas fa-arrow-left"></i> Quay lại
                                </a>

                            </div>
                        </div>
                    </div>
                    <tbody>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label for="title">Tiêu đề</label>
                                        <input type="text" value="" name="title" id="title" class="form-control">
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="detail">Chi tiết</label>
                                        <textarea name="detail" id="detail" rows="8" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description">Mô tả</label>
                                        <textarea name="description" id="description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="topic_id">Chủ đề</label>
                                        <select name="topic_id" id="topic_id" class="form-control">
                                            <option value="">Chọn chủ đề</option>
                                            @foreach($topics as $topic)
                                            <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="type">Kiểu</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="post">Bài viết</option>
                                            <option value="page">Trang đơn</option>

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image">Hình</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status">Trạng thái</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="2">Chưa xuất bản</option>
                                            <option value="1">Xuất bản</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                </div>
            </section>

            </tbody>
        </form>
    </div>


@endsection