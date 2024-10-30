@extends('layouts.admin')
@section('title', 'Quản lý sản phẩm')
@section('content')

    <div>
        <div class="content">
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
                                <a class="btn btn-sm btn-info" href="{{ route('admin.product.index') }}">
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
                                            <td><?= $product->id ?></td>
                                        </tr>
                                        <tr>
                                            <td> category_id </td>
                                            <td><?= $product->category_id ?></td>
                                        </tr>
                                        <tr>
                                            <td>brand_id</td>
                                            <td><?= $product->brand_id ?></td>
                                        </tr>
                                        <tr>
                                            <td>name</td>
                                            <td><?= $product->name ?></td>
                                        </tr>
                                        <tr>
                                            <td>slug</td>
                                            <td><?= $product->slug ?></td>
                                        </tr>
                                        <tr>
                                            <td>detail </td>
                                            <td><?= $product->detail ?></td>
                                        </tr>
                                        <tr>
                                            <td>image</td>
                                            <td>
                                                <img src="{{ asset('images/products/' . $product->image) }}"
                                                    class="img-fluid img-thumbnail" alt="{{ $product->image }}"
                                                    style="width: 200px; height: auto;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>description</td>
                                            <td><?= $product->description ?></td>
                                        </tr>
                                        <tr>
                                            <td>price</td>
                                            <td><?= $product->price ?></td>
                                        </tr>
                                        <tr>
                                            <td>pricesale</td>
                                            <td><?= $product->pricesale ?></td>
                                        </tr>
                                        <tr>
                                            <td>created_at</td>
                                            <td><?= $product->created_at ?></td>
                                        </tr>
                                        <tr>
                                            <td>updated_at</td>
                                            <td><?= $product->updated_at ?></td>
                                        </tr>
                                        <tr>
                                            <td>created_by</td>
                                            <td><?= $product->created_by ?></td>
                                        </tr>
                                        <tr>
                                            <td>updated_by</td>
                                            <td><?= $product->updated_by ?></td>
                                        </tr>
                                        <tr>
                                            <td>status</td>
                                            <td><?= $product->status ?></td>
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
