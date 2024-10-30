@extends('layouts.admin')
@section('title', 'Quản lý sản phẩm')
@section('content')


    <div>
        <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="content">
                <!-- CONTENT -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Thêm mới sản phẩm</h1>
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
                                    <a class="btn btn-sm btn-info" href="{{ route('admin.product.index') }}">
                                        <i class="fas fa-arrow-left"></i> Quay lại
                                    </a>
                                </div>
                            </div>
                        </div>
                        <tbody>
                            <div>

                                <section class="content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="mb-3">
                                                    <label for="name">Tên sản phẩm</label>
                                                    <input type="text" value="" name="name" id="name"
                                                        class="form-control">
                                                    @error('name')
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
                                                    <label for="category_id">Danh mục</label>
                                                    <select name="category_id" id="category_id" class="form-control">
                                                        <option value="">Chọn danh mục</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                        @error('category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="brand_id">Thương hiệu</label>
                                                    <select name="brand_id" id="brand_id" class="form-control">
                                                        <option value="">Chọn thương hiệu</option>

                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                        @endforeach
                                                        @error('brand_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="price">Giá</label>
                                                    <input type="number" value="" name="price" id="price"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pricesale">Giá khuyến mãi</label>
                                                    <input type="number" value="" name="pricesale" id="pricesale"
                                                        class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="image">Hình</label>
                                                    <input type="file" name="image" id="image"
                                                        class="form-control">
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

            </div>
            </tbody>
    </div>



@endsection
