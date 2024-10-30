@extends('layouts.admin')
@section('title','Quản lý sản phẩm')
@section('content')


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
                            <a class="btn btn-sm btn-info" href="{{ route('admin.post.index') }}">
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
                                        <td><?= $post->id;?></td>
                                    </tr>
                                    <tr>
                                        <td> topic_id</td>
                                        <td><?= $post->topic_id;?></td>
                                    </tr>
                                    <tr>
                                        <td>title</td>
                                        <td><?= $post->title;?></td>
                                    </tr>
                                    <tr>
                                        <td>slug</td>
                                        <td><?= $post->slug;?></td>
                                    </tr>
                                    <tr>
                                        <td>detail</td>
                                        <td><?= $post->detail;?></td>
                                    </tr>
                                    <tr>
                                        <td>image</td>
                                        <td> 
    <img src="{{ asset('images/posts/' . $post->image) }}" class="img-fluid img-thumbnail" alt="{{ $post->image }}" style="width: 200px; height: auto;">
</td>

                                    <tr>
                                        <td>description </td>
                                        <td><?= $post->description;?></td>
                                    </tr>
                                    <tr>
                                        <td>type</td>
                                        <td><?= $post->type;?></td>
                                    </tr>
                                    <tr>
                                        <td>created_at</td>
                                        <td><?= $post->created_at;?></td>
                                    </tr>
                                    <tr>
                                        <td>updated_at</td>
                                        <td><?= $post->updated_at;?></td>
                                    </tr>
                                    <tr>
                                        <td>created_by</td>
                                        <td><?= $post->created_by;?></td>
                                    </tr>
                                    <tr>
                                        <td>updated_by</td>
                                        <td><?= $post->updated_by;?></td>
                                    </tr>
                                    <tr>
                                        <td>status</td>
                                        <td><?= $post->status;?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
