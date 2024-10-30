@extends('layouts.admin')
@section('title','Quản lý thành viên')
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
                            <a class="btn btn-sm btn-info" href="{{ route('admin.user.index') }}">
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
                                        <td><?= $user->id;?></td>
                                    </tr>
                                    <tr>
                                        <td> name </td>
                                        <td><?= $user->name	;?></td>
                                    </tr>
                                    <tr>
                                        <td>username</td>
                                        <td><?= $user->username;?></td>
                                    </tr>
                                    <tr>
                                        <td>password</td>
                                        <td><?= $user->password;?></td>
                                    </tr>
                                    <tr>
                                        <td>gender</td>
                                        <td><?= $user->gender;?></td>
                                    </tr>
                                    <tr>
                                        <td>phone </td>
                                        <td><?= $user->phone;?></td>
                                    </tr>
                                    <tr>
                                        <td>image</td>
                                                                     <td> 
    <img src="{{ asset('images/users/' . $user->image) }}" class="img-fluid img-thumbnail" alt="{{ $user->image }}" style="width: 200px; height: auto;">
</td>
                                    </tr>
                                    <tr>
                                        <td>email</td>
                                        <td><?= $user->email;?></td>
                                    </tr>
                                    <tr>
                                        <td>roles</td>
                                        <td><?= $user->roles;?></td>
                                    </tr>
                                    <tr>
                                        <td>address</td>
                                        <td><?= $user->address;?></td>
                                    </tr>
                                    <tr>
                                        <td>remember_token</td>
                                        <td><?= $user->remember_token;?></td>
                                    </tr>
                                    <tr>
                                        <td>created_at</td>
                                        <td><?= $user->created_at;?></td>
                                    </tr>
                                    <tr>
                                        <td>updated_at</td>
                                        <td><?= $user->updated_at;?></td>
                                    </tr>
                                    <tr>
                                        <td>created_by</td>
                                        <td><?= $user->created_by;?></td>
                                    </tr>
                                    <tr>
                                        <td>updated_by</td>
                                        <td><?= $user->updated_by;?></td>
                                    </tr>
                                    <tr>
                                        <td>status</td>
                                        <td><?= $user->status;?></td>
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