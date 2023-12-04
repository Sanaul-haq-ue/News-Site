@extends('front.master')

@section('content')

    <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    @foreach($sliders->take(3) as $slider)
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <x-post.slider :slider="$slider"/>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    @foreach($blogs->take(4) as $blog)
                    <x-post.latest :blog="$blog"/>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Breaking News Start -->


    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    @if($blogs->isNotEmpty() && $blogs->contains('blog_type', 'Breaking-News'))
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Breaking News</div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 170px); padding-right: 90px;">
                            @foreach($blogs->where('blog_type','Breaking-News')->take(4) as $blog)
                                    <div class="text-truncate">
                                        <a class="text-white text-uppercase font-weight-semi-bold" href="{{ route('single.page', ['slug' => $blog->slug]) }}">
                                            {{ substr($blog->title,0,70) }} ...
                                        </a>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>



    <!-- Breaking News End -->


    <!-- Featured News Slider Start -->
{{--    <div class="container-fluid pt-5 mb-3">--}}
{{--        <div class="container">--}}
{{--            <div class="section-title">--}}
{{--                <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>--}}
{{--            </div>--}}
{{--            <div class="owl-carousel news-carousel carousel-item-4 position-relative">--}}

{{--                @foreach($featuredPosts as $post)--}}
{{--                    <x-post.featured-carousel/>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Featured News Slider End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">


                        @if($homeSetting->firstStatus == 1)
                            <div class="col-12">
                                <div class="section-title">
                                    <h4 class="m-0 text-uppercase font-weight-bold">{{ $category1Posts->category_name }}</h4>
                                    <a class="text-secondary font-weight-medium text-decoration-none" href=" {{route('category', $category1Posts->slug)}} ">View All</a>
                                </div>
                            </div>

                            @foreach($category1Posts->blog->take(2) as $post)
                                <div class="col-lg-6">
                                    <x-post.category1Posts :post='$post'/>
                                </div>
                            @endforeach

                        @endif


                        @if($homeSetting->secondStatus == 1)
                            <div class="col-12">
                                <div class="section-title">
                                    <h4 class="m-0 text-uppercase font-weight-bold">{{$category2posts->category_name}}</h4>
                                    <a class="text-secondary font-weight-medium text-decoration-none" href="{{route('category', $category2posts->slug)}}">View All</a>
                                </div>
                            </div>

                            @foreach($category2posts->blog->take(4) as $post)
                                <div class="col-lg-6">
                                    <x-post.category2posts :post="$post"/>
                                </div>
                            @endforeach
                        @endif


                        @if($homeSetting->thirdStatus == 1)
                            <div class="col-12">
                                <div class="section-title">
                                    <h4 class="m-0 text-uppercase font-weight-bold">{{ $category3posts->category_name }}</h4>
                                    <a class="text-secondary font-weight-medium text-decoration-none" href="{{ route('category', $category3posts->slug) }}">View All</a>
                                </div>
                            </div>

                            @foreach($category3posts->blog->take(2) as $post)
                                <x-post.category3posts :post="$post"/>
                            @endforeach
                        @endif


                        @if($homeSetting->fourStatus == 1)
                            <div class="col-12">
                                <div class="section-title">
                                    <h4 class="m-0 text-uppercase font-weight-bold">{{ $category4posts->category_name }}</h4>
                                    <a class="text-secondary font-weight-medium text-decoration-none" href="{{ route('category', $category4posts->slug) }}">View All</a>
                                </div>
                            </div>

                            @foreach($category4posts->blog->take(4) as $post)
                                <div class="col-lg-6">
                                    <x-post.category4posts :post="$post"/>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Popular News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            @foreach($popularPosts as $post)
                            <x-post.popular :post="$post"/>
                            @endforeach
                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Ads Start -->
                    @if($homeSetting->advertisementStatus == 1)
                    <x-post.advertisement :homeSetting="$homeSetting"/>
                    @endif
                    <!-- Ads End -->

                    <!-- Tranding News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
                        </div>
                        @if($blogs->isNotEmpty() && $blogs->contains('blog_type', 'tranding'))
                            <div class="bg-white border border-top-0 p-3">
                                @foreach($blogs->where('blog_type','tranding')->take(4) as $blog)
                                    <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                        <img class="img-fluid" width="110px" height="110px" src="{{ asset($blog->image) }}" alt="">
                                        <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                            <div class="mb-2">
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{$blog->category->category_name}}</a>
                                                <a class="text-body" href=""><small>{{ $blog->date }}</small></a>
                                            </div>
                                            <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ route('single.page',['slug'=>$blog->slug]) }}">
                                                {{ substr($blog->title,0,20) }}...
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <!-- Tranding News End -->

                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

@endsection
