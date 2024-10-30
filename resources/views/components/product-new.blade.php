<div class="list-product">
    @foreach ($product_list as $productitem)
        <div class="box-product">
            <x-product-card :$productitem />
        </div>
    @endforeach
</div>
