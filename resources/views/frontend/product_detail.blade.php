@extends('layouts.site')
@section('title', 'Trang Chủ')

@section('content')
    <main class="product-detail">
        <article class="product">
            <header class="product-header">
                <h1>{{ $product->name }}</h1>
            </header>
            <div class="product-content">
                <div class="product-images">
                    <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                </div>
                <div class="product-info">
                    <h1>Chi tiết sản phẩm</h1>
                    <p>{{ $product->detail }}</p>
                    <h3>Giá sản phẩm:</h3>
                    <p>{{ number_format($product->price, 0, ',', '.') }}.000 VND</p>
                    <div class="product-quantity">
                        <label for="quantity">Số lượng:</label>
                        <input type="number" id="qty" name="quantity" min="0" value="1">
                    </div>
                    <button class="buy-button" onclick="handleAddCart({{ $product->id }})">Mua Ngay</button>
                    {{-- <a href="{{ route('site.cart.addcart') }}"> <button class="add-to-cart-button"
                            onclick="handleAddCart({{ $product->id }})  ">Thêm vào Giỏ
                            Hàng</button></a> --}}
                </div>
            </div>
        </article>
        <h2>Sản phẩm liên quan</h2>
        <div class="row">
            @foreach ($product_list as $relatedProduct)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('site.product.detail', ['slug' => $relatedProduct->slug]) }}">
                            <img class="card-img-top img-fluid"
                                src="{{ asset('images/products/' . $relatedProduct->image) }}"
                                alt="{{ $relatedProduct->name }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                            <p class="card-text">Giá sản phẩm:
                                {{ number_format($relatedProduct->price, 0, ',', '.') }}.000VND</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>



@endsection
@section('header')
    <link rel="stylesheet" href="home.css">
@endsection

@section('footer')
    <script>
        function handleAddCart(productid) {
            let qty = document.getElementById("qty").value;
            $.ajax({
                url: "{{ route('site.cart.addcart') }}",
                type: "GET",
                data: {
                    productid: productid,
                    qty: qty

                },

                success: function(result, status, xhr) {
                    document.getElementById("showqty").innerHTML = result;
                    alert("Thêm vào giỏ hàng thành công!");
                },
                error: function(xhr, status, error) {
                    alert(error);
                }

            })
        }
    </script>

@endsection
