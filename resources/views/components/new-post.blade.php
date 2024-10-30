<div class="row ">
    @foreach ($list as $postitem)
        <x-post :$postitem />
    @endforeach
    <div class="col-12 text-center">
        <a href="{{ route('site.Hungpost') }}" class="btn btn-success px-5">xem tất cả bài viết</a>
    </div>
</div>
