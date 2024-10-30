{{-- post --}}
<div class="col-md-6">
    <div class="list-blog-posts">
        <div class="box-blog-post">
            <a href="{{ route('site.postdetail_slug', ['slug' => $post->slug]) }}">
                <img class="img-fluid" src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->image }}"></a>
            <p class="blog-summary">{{ $post->description }}
            <p class="blog-summary">{{ $post->detail }}
            </p>
        </div>
    </div>
</div>

{{-- endpost --}}
