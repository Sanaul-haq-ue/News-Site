@extends('front.master')

@section('content')

    <!-- Breaking News Start -->
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    @if($breakingNews->isNotEmpty() && $breakingNews->contains('blog_type', 'Breaking-News'))
                    <div class="d-flex justify-content-between">
                        <div class="section-title border-right-0 mb-0" style="width: 180px;">
                            <h4 class="m-0 text-uppercase font-weight-bold">Breaking News</h4>
                        </div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0"
                             style="width: calc(100% - 180px); padding-right: 100px;">
                            @foreach($breakingNews->where('blog_type','Breaking-News')->take(4) as $blog)

                            <div class="text-truncate">
                                <a class="text-secondary text-uppercase font-weight-semi-bold" href="{{ route('single.page', ['slug' => $blog->slug]) }}">
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


    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="{{ asset($blogs->image) }}" style="object-fit: cover;">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                   href="">{{  $blogs->category->category_name }}</a>
                                <a class="text-body" href="">{{  $blogs->date }}</a>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{  $blogs->title }}</h1>
                            <p>{{ $blogs->description }}</p>

                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle mr-2" src="{{ asset('front-assets') }}/img/user.jpg" width="25" height="25" alt="">
                                <span>{{ Auth::user()->name }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="ml-3"><i class="far fa-eye mr-2">
                                        @if(!empty( $blogs->count ))
                                            {{ $blogs->count }}
                                        @else
                                            0
                                        @endif
                                    </i></span>
                                <span class="ml-3"><i class="far fa-comment mr-2"></i>{{ $blogs->comments->count() ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Comment</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            @foreach($comments as $comment)
                            <div class="media mb-4">
                                <img src="{{ asset('front-assets') }}/img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6><a class="text-secondary font-weight-bold" href="">{{ $comment->visitor->first_name }}</a> <small><i>{{ $comment->created_at->format('M d, Y') }}</i></small></h6>
                                    <p>{{ $comment->message }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            @if(Session::get('visitorId'))
                            <form action="{{ route('new.comment') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="visitor_id" value="{{ Session::get('visitorId') }}">
                                <input type="hidden" name="blog_id" value="{{ $blogs->id }}">


                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website">
                                </div>

                                <div class="form-group">
                                    <label for="message">Message *</label>
                                    <textarea id="message" name="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave a comment"
                                           class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                </div>
                            </form>
                            @else
                                <h3 class="text-center text-success">Please &nbsp;&nbsp;
                                    <a href="{{ route('visitor.login') }}" class="btn btn-outline-success">Login</a>
                                    &nbsp;&nbsp; for comment...
                                </h3>
                            @endif
                        </div>
                    </div>
                    <!-- Comment Form End -->
                </div>

                <div class="col-lg-4">
                    <!-- Ads Start -->
                    @if($homeSetting->advertisementStatus == 1)
                        <x-post.advertisement :homeSetting="$homeSetting"/>
                    @endif
                    <!-- Ads End -->

                    <!-- Tranding News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Similar News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            @foreach($SimilarPosts as $post)
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" width="110px" height="110px" src="{{ asset($post->image) }}" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{$post->category->category_name}}</a>
                                        <a class="text-body" href=""><small>{{ $post->date }}</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ route('single.page',['slug'=>$post->slug]) }}">
                                        {{ substr($post->title,0,28) }}...
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Tranding News End -->

                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


@endsection
