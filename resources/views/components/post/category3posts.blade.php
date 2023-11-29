@props(['post'])
<div class="col-lg-12">
    <div class="row news-lg mx-0 mb-3">
        <div class="col-md-6 h-100 px-0">
            <img class="img-fluid h-100" src="{{ asset($post->image) }}" style="object-fit: cover;">
        </div>
        <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
            <div class="mt-auto p-4">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                       href="">{{$post->category->category_name}}</a>
                    <a class="text-body" href=""><small>{{ $post->date }}</small></a>
                </div>
                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('single.page', ['slug' => $post->slug]) }}">{{ substr($post->title,0,20) }}...</a>
                <p class="m-0">{{ substr($post->description,0,35) }}</p>
            </div>
            <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-end">
                        <span class="text-gray-500 text-sm">{{ $post->getReadingTime() }} min read<span/>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                    <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                </div>
            </div>
        </div>
    </div>
</div>
