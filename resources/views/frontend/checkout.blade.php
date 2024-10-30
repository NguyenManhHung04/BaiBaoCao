@extends('layouts.site')
@section('title', 'Trang Chủ')
@section('content')
    <main class="main-content">
        <div class="cart-container">
            <h2>Thanh toán đơn hàng</h2>
            <form action="{{ route('site.cart.update') }}" method="POST">
                @csrf
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                            <th>Huỷ đơn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalMoney = 0;
                        @endphp
                        @foreach ($list_cart as $row_cart)
                            <!-- Repeat this <tr> block for each item in the cart -->
                            <tr>
                                <td>{{ $row_cart['id'] }}</td>
                                <td>
                                    <img class="img-fluid" src="{{ asset('images/products/' . $row_cart['image']) }}"
                                        alt="{{ $row_cart['image'] }}">
                                </td>
                                <td>{{ $row_cart['name'] }}</td>
                                <td>
                                    <input type="number" name="qty[{{ $row_cart['id'] }}]" value="{{ $row_cart['qty'] }}">
                                </td>
                                <td>{{ number_format($row_cart['price']) }}.000đ</td>
                                <td>{{ number_format($row_cart['price'] * $row_cart['qty']) }}.000đ</td>
                                <td><a href="{{ route('site.cart.delete', ['id' => $row_cart['id']]) }}"
                                        class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i></a></td>

                            </tr>
                            <!-- End repeat -->
                            @php
                                $totalMoney += $row_cart['price'] * $row_cart['qty'];
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                <div class="cart-total">
                    <span>Total: {{ number_format($totalMoney) }}.000đ</span>
                </div>
            </form>
            @if (!Auth::check())
                <div class="row">
                    <div class="col-12">
                        <h3>Bạn cần đăng nhập trước khi thanh toán</h3>
                        <a class="btn btn-secondary" href="{{ route('website.getlogin') }}">Đăng nhập</a>
                    </div>
                </div>
            @else
                <form action="{{ route('site.cart.docheckout') }}" method="post">
                    @csrf
                    <div class="row">
                        @php
                            $user = Auth::user();
                        @endphp
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">Họ tên</label>
                                <input name="name" type="text" value="{{ $user->name }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input name="email" type="text" value="{{ $user->email }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">Số phone</label>
                                <input name="phone" type="text" value="{{ $user->phone }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">Địa chỉ</label>
                                <input name="address" type="text" value="{{ $user->address }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="">chú ý</label>
                                <textarea name="note" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-end">
                            <button class="btn btn-success" type="submit">Thanh toán</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </main>
@endsection
@section('header')
    <link rel="stylesheet" href="home.css">
@endsection
