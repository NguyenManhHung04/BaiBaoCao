    @extends('layouts.admin')
    @section('title', 'Quản lý thương hiệu')
    @section('content')
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <strong class="text-dark text-lg">Chi tiết danh mục </strong>
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
                            <a class="btn btn-sm btn-info" href="{{ route('admin.brand.index') }}">
                                <i class="fas fa-arrow-left"></i> Quay lại
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tên trường</th>
                                        <th>Giá trị</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td><?= $brand->id ?></td>
                                    </tr>
                                    <tr>
                                        <td> name</td>
                                        <td><?= $brand->name ?></td>
                                    </tr>
                                    <tr>
                                        <td>slug</td>
                                        <td><?= $brand->slug ?></td>
                                    </tr>
                                    <tr>
                                        <td>description</td>
                                        <td><?= $brand->description ?></td>
                                    </tr>
                                    <tr>
                                        <td>sort_order</td>
                                        <td><?= $brand->sort_order ?></td>
                                    </tr>

                                    <tr>
                                        <td>image</td>
                                        <td>
                                            <img src="{{ asset('images/brands/' . $brand->image) }}"
                                                class="img-fluid img-thumbnail" alt="{{ $brand->image }}"
                                                style="width: 200px; height: auto;">
                                        </td>

                                    <tr>
                                        <td>created_at</td>
                                        <td><?= $brand->created_at ?></td>
                                    </tr>
                                    <tr>
                                        <td>created_by</td>
                                        <td><?= $brand->created_by ?></td>
                                    </tr>
                                    <tr>
                                        <td>updated_at</td>
                                        <td><?= $brand->updated_at ?></td>
                                    </tr>
                                    <tr>
                                        <td>updated_by</td>
                                        <td><?= $brand->updated_by ?></td>
                                    </tr>
                                    <tr>
                                        <td>status</td>
                                        <td><?= $brand->status ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
