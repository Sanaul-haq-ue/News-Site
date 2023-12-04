@props(['post'])
<div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
    <img class="" width="110px" height="110px" src="{{ asset($post->image) }}" alt="">
    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
        <div class="mb-2">
            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{$post->category->category_name}}</a>
            <a class="text-body" href=""><small>{{ $post->date }}</small></a>
        </div>
        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ route('single.page',['slug'=>$post->slug]) }}">{{ substr($post->title,0,20) }}...</a>
    </div>
</div>
