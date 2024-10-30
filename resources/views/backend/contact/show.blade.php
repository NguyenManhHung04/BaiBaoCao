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
                        <a class="btn btn-sm btn-info" href="{{ route('admin.contact.index') }}">
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
                                    <td><?= $contact->id;?></td>
                                </tr>
                                <tr>
                                    <td> name</td>
                                    <td><?= $contact->name;?></td>
                                </tr>
                                <tr>
                                    <td>user_id</td>
                                    <td><?= $contact->user_id;?></td>
                                </tr>
                                <tr>
                                    <td>email</td>
                                    <td><?= $contact->email;?></td>
                                </tr>
                                <tr>
                                    <td>phone</td>
                                    <td><?= $contact->phone;?></td>
                                </tr>
                                <tr>
                                    <td>title</td>
                                    <td><?= $contact->title;?></td>
                                </tr>
                                <tr>
                                    <td>content</td>
                                    <td><?= $contact->content;?></td>
                                </tr>
                                <td> replay_id</td>
                                <td><?= $contact->	replay_id;?></td>
                                </tr>
                                <tr>
                                    <td>created_at</td>
                                    <td><?= $contact->created_at;?></td>
                                </tr>
                                <tr>
                                    <td>updated_at</td>
                                    <td><?= $contact->updated_at;?></td>
                                </tr>
                                <tr>
                                    <td>updated_by</td>
                                    <td><?= $contact->updated_by;?></td>
                                </tr>
                                <tr>
                                    <td>status</td>
                                    <td><?= $contact->status;?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection