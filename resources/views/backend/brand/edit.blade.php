@extends('layouts.admin')
@section('title', 'Quản lý thương hiệu')
@section('content')
    <section class="content-header">
        @if (session('success'))
            <div id="success-message" class="alert alert-success" style="color: black; font-size: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <script>
            // Function to hide alerts after a timeout
            function hideAlerts() {
                var successAlert = document.getElementById('success-message');
                var errorAlert = document.getElementById('error-message');

                if (successAlert) {
                    setTimeout(function() {
                        successAlert.style.display = 'none';
                    }, 5000); // 5 seconds
                }
            }

            // Call the hideAlerts function when the page is loaded
            document.addEventListener('DOMContentLoaded', function() {
                hideAlerts();
            });
        </script>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý thương hiệu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a>Home</a></li>
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
                        <a class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Thùng rác
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="{{ route('admin.brand.update', ['id' => $brand->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name">Tên thương hiệu</label>
                        <input type="text" value="{{ old('name', $brand->name) }}" name="name" id="name"
                            class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description">Mô tả</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $brand->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="sort_order">Sắp xếp</label>
                        <select name="sort_order" id="sort_order" class="form-control">
                            <option value="0">None</option>
                            {!! $htmlsortorder !!}
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image">Hình</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="status">Trạng thái</label>
                        <select name="status" id="status" class="form-control">
                            <option {{ $brand->status == 2 ? 'selected' : '' }} value="2">Chưa xuất bản</option>
                            <option {{ $brand->status == 1 ? 'selected' : '' }} value="1">Xuất bản</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="create" class="btn btn-success">Lưu</button>
                    </div>
                </form>

            </div>
        </div>
        </div>
    </section>
@endsection
