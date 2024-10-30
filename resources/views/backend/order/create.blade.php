@extends('layouts.admin')
@section('title','Quản lý đơn hàng')
@section('content')

 <div class="content">
    <!-- CONTENT -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm mới đơn hàng</h1>
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
                    <a class="btn btn-sm btn-danger" href="{{ route('admin.order.index') }}">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                </div>
            </div>
            </div>
                <tbody>
                    <div>
                        <div class="form-group">
                            <label class="delivery_name">Tên khách hàng: *</label>
                            <input type="text" class="form-control" name="delivery_name" placeholder="Nhập tên khách hàng" name="fname"/>
                        </div>
                        <div class="form-group">
                            <label class="delivery_phone">Số điện thoại: *</label>
                            <input type="text" class="form-control" name="delivery_phone" placeholder="Nhập số điện thoại" name="fname"/>
                        </div>
                        <div class="form-group">
                            <label class="delivery_email">Email: *</label>
                            <input type="text" class="form-control" name="delivery_email" placeholder="Nhập email" name="fname"/>
                        </div>
                        <div class="mb-3">
                            <button  class="btn btn-success"  type="submit"  id="submit"  name="submit">Lưu</button>
                        </div>
                    </div>
                </tbody>
            </div>
        </div>
    </section>
    <!-- /.CONTENT -->
  </div>

@endsection