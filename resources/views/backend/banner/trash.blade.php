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
                        <a class="btn btn-sm btn-info" href="{{ route('admin.banner.index') }}">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <th class="text-center" style="width:30px">#</th>
                        <th class="text-center" style="width:190px">Hình</th>
                        <th>Tên Banner</th>
                        <th>Link</th>
                        <th class="text-center" style="width:190px">Chức năng</th>
                        <th class="text-center" style="width:30px">id</th>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                            <tr>
                                @php
                                    $args = ['id' => $row->id];
                                @endphp
                                <td class="text-center">
                                    <input type="checkbox" name="checkID[]" id="checkID" value="1">
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset('images/banners/' . $row->image) }}" class="img-fluid"
                                        alt="{{ $row->image }}">
                                </td>

                                <td>
                                    {{ $row->name }}
                                </td>
                                <td>
                                    {{ $row->link }}
                                </td>

                                <td class="text-center">
                                    <div class="d-inline-block">
                                        <a href="{{ route('admin.banner.show', $args) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="d-inline-block">
                                        <a href="{{ route('admin.banner.restore', $args) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-undo"></i>
                                        </a>
                                    </div>
                                    <div class="d-inline-block">
                                        <form action="{{ route('admin.banner.destroy', $args) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger" name="delete" type="submit"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td class="text-center">{{ $row->id }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    @endsection
