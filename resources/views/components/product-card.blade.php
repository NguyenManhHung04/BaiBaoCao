<div class="box-product">
    <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">
        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}">
    </a>
    <h5 class="mauchu">{{ $product->name }}</h5>
    <p class="giatien">Giá sản phẩm: {{ number_format($product->price, 0, ',', '.') }}.000 VND</p>
    <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}" class="btn btn-sm btn-outline-primary">Xem
        chi tiết</a>
</div>
