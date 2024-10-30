<div class="list-product">
    @foreach ($product_list as $row)
        <div class="box-product">
            <a href="{{ route('site.product.detail', ['slug' => $row->slug]) }}">
                <img src="{{ asset('images/products/' . $row->image) }}" alt="{{ $row->name }}">
            </a>
            <h5 class="mauchu">{{ $row->name }}</h5>
            <p class="mautien_sale">Giá khuyến mãi: {{ number_format($row->pricesale, 0, ',', '.') }}.000 VND</p>
            <a href="{{ route('site.product.detail', ['slug' => $row->slug]) }}"
                class="btn btn-sm btn-outline-primary">Xem
                chi tiết</a>
        </div>
    @endforeach
</div>
