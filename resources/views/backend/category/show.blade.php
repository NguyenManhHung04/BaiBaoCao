@extends('layouts.admin')
@section('title', 'Quản lý danh mục')
@section('content')

    <div>
        <div class="content">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <strong class="text-dark text-lg">CHI TIẾT DANH MỤC</strong>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a class="btn btn-sm btn-info" href="{{ route('admin.category.index') }}">
                                    <i class="fas fa-arrow-left"></i> Về danh sách
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="content">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="col-3">Tên trường</th>
                                            <th class="col-9">Giá trị</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{ $category->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tên</td>
                                            <td>{{ $category->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Slug</td>
                                            <td>{{ $category->slug }}</td>
                                        </tr>
                                        <tr>
                                            <td>Parent ID</td>
                                            <td>{{ $category->parent_id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Thứ tự sắp xếp</td>
                                            <td>{{ $category->sort_order }}</td>
                                        </tr>
                                        <tr>
                                            <td>Hình ảnh</td>
                                            <td>
                                                <img src="{{ asset('images/categorys/' . $category->image) }}"
                                                    class="img-fluid img-thumbnail" alt="{{ $category->image }}"
                                                    style="width: 200px; height: auto;">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Mô tả</td>
                                            <td>{{ $category->description }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ngày tạo</td>
                                            <td>{{ $category->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <td>Người tạo</td>
                                            <td>{{ $category->created_by }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ngày cập nhật</td>
                                            <td>{{ $category->updated_at }}</td>
                                        </tr>
                                        <tr>
                                            <td>Người cập nhật</td>
                                            <td>{{ $category->updated_by }}</td>
                                        </tr>
                                        <tr>
                                            <td>Trạng thái</td>
                                            <td>{{ $category->status }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
