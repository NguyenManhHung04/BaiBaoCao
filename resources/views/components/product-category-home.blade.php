<div class="container">
    <div class="row hot">
        @foreach ($category_list as $cat_row)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 hot-category">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="hot-text">
                            <h5 class="card-title mb-0">{{ $cat_row->name }}</h5>
                        </div>
                        <div class="hot-image">
                            <a href="{{ route('site.product.category', ['slug' => $cat_row->slug]) }}">
                                <img class="img-fluid rounded" src="{{ asset('images/categorys/' . $cat_row->image) }}"
                                    alt="{{ $cat_row->name }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
