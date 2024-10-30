@extends('layouts.site')
@section('title', 'Trang Chủ')
@section('content')
    <main class="main-content">
        <div class="cart-container">
            <h2>Giỏ hàng của bạn </h2>
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
                <div class="cart-actions">
                    <a class="btn btn-success px-3" href="{{ route('home') }}">AddCart</a>
                    <button type="submit">Update Cart</button>
                    <a class="btn btn-danger px-3" href="{{ route('site.cart.checkout') }}">Checkout</a>
                </div>
            </form>
        </div>
    </main>
@endsection
@section('header')
    <link rel="stylesheet" href="home.css">
@endsection
