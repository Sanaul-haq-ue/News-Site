@props(['slider'])
<img class="img-fluid h-100" src="{{ asset($slider->image) }}" style="object-fit: cover;">
<div class="overlay">
    <div class="mb-2">
        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
           href="">{{ $slider->category->category_name }}</a>
        <a class="text-white" href="">{{ $slider->date }}</a>
    </div>
    <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="{{ route('single.page',['slug'=>$slider->slug]) }}">{{ $slider->title }}...</a>
</div>
