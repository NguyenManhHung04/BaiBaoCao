@extends('layouts.admin')
@section('title','Quản lý đơn hàng')
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
                            <a class="btn btn-sm btn-info" href="{{ route('admin.order.index') }}">
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
                                        <td><?= $order->id;?></td>
                                    </tr>
                                    <tr>
                                        <td> user_id</td>
                                        <td><?= $order->user_id;?></td>
                                    </tr>
                                    <tr>
                                        <td>delivery_name</td>
                                        <td><?= $order->delivery_name;?></td>
                                    </tr>
                                    <tr>
                                        <td>delivery_gender</td>
                                        <td><?= $order->delivery_gender;?></td>
                                    </tr>
                                    <tr>
                                        <td>delivery_email</td>
                                        <td><?= $order->delivery_email;?></td>
                                    </tr>
                                    <tr>
                                        <td>delivery_phone</td>
                                        <td><?= $order->delivery_phone;?></td>
                                    </tr>
                                    <tr>
                                        <td> delivery_address </td>
                                        <td><?= $order->delivery_address	;?></td>
                                    </tr>
                                    <tr>
                                        <td>note </td>
                                        <td><?= $order->note	;?></td>
                                    </tr>
                                    <tr>
                                        <td>type </td>
                                        <td><?= $order->type;?></td>
                                    </tr>
                                    <tr>
                                        <td>created_at</td>
                                        <td><?= $order->created_at;?></td>
                                    </tr>
                                    <tr>
                                        <td>updated_at</td>
                                        <td><?= $order->updated_at;?></td>
                                    </tr>
                                    <tr>
                                        <td>updated_by</td>
                                        <td><?= $order->updated_by;?></td>
                                    </tr>
                                    <tr>
                                        <td>status</td>
                                        <td><?= $order->status;?></td>
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