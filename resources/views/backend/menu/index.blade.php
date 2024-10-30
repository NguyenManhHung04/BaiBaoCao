@extends('layouts.admin')
@section('title', 'Quản lý Menu')
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
                    <h1>Quản lý Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                        <a class="btn btn-sm btn-danger" href="{{ route('admin.menu.trash') }}">
                            <i class="fas fa-trash"></i> Thùng rác
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <form action="{{ route('admin.menu.store') }}" method="post">
                            @csrf
                            <div class="accordion" id="accordionExample">
                                <div class="card p-3">
                                    <label for="position">Vị trí</label>
                                    <select name="position" id="position" class="form-control">
                                        <option value="mainmenu">Main Menu</option>
                                        <option value="footermenu">Footer Menu</option>
                                    </select>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingCategory">
                                        <a class="d-block" data-toggle="collapse" data-target="#collapseCategory"
                                            aria-expanded="true" aria-controls="collapseCategory">
                                            Danh mục
                                        </a>
                                    </div>
                                    <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            @foreach ($categories as $category)
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" name="categoryid[{{ $category->id }}]"
                                                        type="checkbox" value="{{ $category->id }}"
                                                        id="category{{ $category->id }}">
                                                    <label class="form-check-label" for="category{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </label>
                                                </div>
                                            @endforeach

                                            <div class="mb-3">
                                                <input type="submit" name="createCategory" class="btn btn-success"
                                                    value="Thêm menu">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                                <div class="card">
                                    <div class="card-header" id="headingBrand">
                                        <a class="d-block" data-toggle="collapse" data-target="#collapseBrand"
                                            aria-expanded="true" aria-controls="collapseBrand">
                                            Thuong hiệu
                                        </a>
                                    </div>
                                    <div id="collapseBrand" class="collapse" aria-labelledby="headingBrand"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            @foreach ($brands as $brand)
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" name="brandid[{{ $brand->id }}]"
                                                        type="checkbox" value="{{ $brand->id }}"
                                                        id="brand{{ $brand->id }}">
                                                    <label class="form-check-label" for="brand{{ $brand->id }}">
                                                        {{ $brand->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            <div class="mb-3">
                                                <input type="submit" name="createBrand" class="btn btn-success"
                                                    value="Thêm menu">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                                <div class="card">
                                    <div class="card-header" id="headingTopic">
                                        <a class="d-block" data-toggle="collapse" data-target="#collapseTopic"
                                            aria-expanded="true" aria-controls="collapseTopic">
                                            Chủ đề
                                        </a>
                                    </div>
                                    <div id="collapseTopic" class="collapse" aria-labelledby="headingTopic"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            @foreach ($topics as $topic)
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" name="topicid[{{ $topic->id }}]"
                                                        type="checkbox" value="{{ $topic->id }}"
                                                        id="topic{{ $topic->id }}">
                                                    <label class="form-check-label" for="topic{{ $topic->id }}">
                                                        {{ $topic->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            <div class="mb-3">
                                                <input type="submit" name="createTopic" class="btn btn-success"
                                                    value="Thêm menu">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                                <div class="card">
                                    <div class="card-header" id="headingPage">
                                        <a class="d-block" data-toggle="collapse" data-target="#collapsePage"
                                            aria-expanded="true" aria-controls="collapsePage">
                                            Trang đơn
                                        </a>
                                    </div>
                                    <div id="collapsePage" class="collapse" aria-labelledby="headingPage"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            @foreach ($pages as $page)
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" name="pageid[{{ $page->id }}]"
                                                        type="checkbox" value="{{ $page->id }}"
                                                        id="page{{ $page->id }}">
                                                    <label class="form-check-label" for="page{{ $page->id }}">
                                                        {{ $page->title }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            <div class="mb-3">
                                                <input type="submit" name="createPage" class="btn btn-success"
                                                    value="Thêm menu">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                                <div class="card">
                                    <div class="card-header" id="headingCustom">
                                        <a class="d-block" data-toggle="collapse" data-target="#collapseCustom"
                                            aria-expanded="true" aria-controls="collapseCustom">
                                            Tùy liên kết
                                        </a>
                                    </div>
                                    <div id="collapseCustom" class="collapse" aria-labelledby="headingCustom"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="name">Tên menu</label>
                                                <input type="text" value="" name="name" id="name"
                                                    class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="link">Liên kết</label>
                                                <input type="text" value="" name="link" id="link"
                                                    class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <input type="submit" name="createCustom" class="btn btn-success"
                                                    value="Thêm menu">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                                <div class="card p-3">
                                    <label for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="2">Chưa xuất bản</option>
                                        <option value="1">Xuất bản</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:30px;">#</th>
                                    <th>Tên menu</th>
                                    <th>Liên kết</th>
                                    <th>Vị trí</th>
                                    <th class="text-center" style="width:200px;">Chức năng</th>
                                    <th class="text-center" style="width:30px;">ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                    <tr>
                                        @php
                                            $args = ['id' => $row->id];
                                        @endphp
                                        <td class="text-center">
                                            <input type="checkbox" name="checkID[]" id="checkID">
                                        </td>
                                        <td>
                                            {{ $row->name }}
                                        </td>
                                        <td>
                                            {{ $row->link }}
                                        </td>
                                        <td>
                                            {{ $row->position }}
                                        </td>
                                        <td class="text-center">
                                            @if ($row->status == 1)
                                                <a href="{{ route('admin.menu.status', $args) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="fas fa-toggle-on"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.menu.status', $args) }}"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fas fa-toggle-off"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('admin.menu.show', ['id' => $row->id]) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.menu.edit', ['id' => $row->id]) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.menu.delete', ['id' => $row->id]) }}"
                                                class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            {{ $row->id }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
