@extends('layouts.admin')
@section('title', 'Quản lý thành viên')
@section('content')
    <div class="content">
        <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <!-- CONTENT -->
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
                            <h1>Thêm mới thành viên</h1>
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
                                <a class="btn btn-sm btn-info" href="{{ route('admin.user.index') }}">
                                    <i class="fas fa-arrow-left"></i> Quay lại
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <tbody>
                            <div>
                                <section class="content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name">Họ tên</label>
                                                    <input type="text" value="{{ old('name', $user->name) }}"
                                                        name="name" id="name" class="form-control">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="phone">Điện thoại</label>
                                                    <input type="text" value="{{ old('phone', $user->phone) }}"
                                                        name="phone" id="phone" class="form-control">
                                                    @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email">Email</label>
                                                    <input type="text" value="{{ old('email', $user->email) }}"
                                                        name="email" id="email" class="form-control">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="gender">Giới tính</label>
                                                    <select name="gender" id="gender" class="form-control">
                                                        <option value="1">Nam</option>
                                                        <option value="0">Nữ</option>
                                                        {{ old('gender', $user->gender) }}
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address">Địa chỉ</label>
                                                    <input type="text" value="{{ old('address', $user->address) }}"
                                                        name="address" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="username">Tên đăng nhập</label>
                                                    <input type="text" value="{{ old('username', $user->username) }}"
                                                        name="username" id="username" class="form-control">
                                                    @error('username')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password">Mật khẩu</label>
                                                    <input type="password" value="{{ old('password', $user->password) }}"
                                                        name="password" id="password" class="form-control">
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="roles">Quyền</label>
                                                    <select name="roles" id="roles" class="form-control">
                                                        <option value="customer">Khách hàng</option>
                                                        <option value="admin">Quản lý</option>
                                                        {{ old('roles', $user->roles) }}
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="image">Hình</label>
                                                    <input type="file" name="image" id="image"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status">Trạng thái</label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option {{ $user->status == 2 ? 'selected' : '' }} value="2">
                                                            Chưa
                                                            xuất bản</option>
                                                        <option {{ $user->status == 1 ? 'selected' : '' }} value="1">
                                                            Xuất
                                                            bản</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
            </section>
    </div>
    </tbody>






@endsection
