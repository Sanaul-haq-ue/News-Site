@props(['blog'])
<div class="col-md-6 px-0">
    <div class="position-relative overflow-hidden" style="height: 250px;">
        <img class="img-fluid w-100 h-100" src="{{ $blog->image }}" style="object-fit: cover;">
        <div class="overlay">
            <div class="mb-2">
                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                   href="">{{ $blog->category->category_name }}</a>
                <a class="text-white" href=""><small>{{ $blog->date }}</small></a>
            </div>
            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="{{ route('single.page', ['slug' => $blog->slug]) }}">{{ substr($blog->title,0,15) }}...</a>
        </div>
    </div>
</div>
