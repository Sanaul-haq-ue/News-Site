@extends('front.master')

@section('content')

    <!-- News With Sidebar Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">{{ $category->category_name }}</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>
                        @foreach($blogs as $blog)
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="{{ asset($blog->image) }}" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                           href="">{{$blog->category->category_name}}</a>
                                        <a class="text-body" href=""><small>{{$blog->date}}</small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('single.page', ['slug' => $blog->slug]) }}">{{ substr($blog->title,0,20) }}...</a>
                                    <p class="m-0">{{ substr($blog->description,0,100) }}...</p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="{{ asset('front-assets') }}/img/user.jpg" width="25" height="25" alt="">
                                        <small>John Doe</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                        <div class="col-lg-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">

                                    {{-- Previous Page Link --}}
                                    @if ($blogs->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link" tabindex="-1">Previous</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $blogs->previousPageUrl() }}" tabindex="-1" aria-label="Previous">Previous</a>
                                        </li>
                                    @endif

                                    {{-- Numeric Page Links --}}
                                    @foreach ($blogs->links()->elements[0] as $page => $url)
                                        <li class="page-item {{ ($page == $blogs->currentPage()) ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($blogs->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $blogs->nextPageUrl() }}" aria-label="Next">Next</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link">Next</span>
                                        </li>
                                    @endif

                                </ul>
                            </nav>

                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Popular News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('front-assets') }}/img/news-110x110-1.jpg" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('front-assets') }}/img/news-110x110-2.jpg" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('front-assets') }}/img/news-110x110-3.jpg" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('front-assets') }}/img/news-110x110-4.jpg" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('front-assets') }}/img/news-110x110-5.jpg" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Ads Start -->
                    @if($advertisement->advertisementStatus == 1)
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <a href="{{ $advertisement->link }}"><img class="img-fluid" src="{{ asset($advertisement->image) }}" alt=""></a>
                        </div>
                    </div>
                    @endif
                    <!-- Ads End -->

                    <!-- Tranding News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('front-assets') }}/img/news-110x110-1.jpg" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('front-assets') }}/img/news-110x110-2.jpg" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('front-assets') }}/img/news-110x110-3.jpg" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('front-assets') }}/img/news-110x110-4.jpg" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('front-assets') }}/img/news-110x110-5.jpg" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Newsletter Start -->
{{--                    <div class="mb-3">--}}
{{--                        <div class="section-title mb-0">--}}
{{--                            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>--}}
{{--                        </div>--}}
{{--                        <div class="bg-white text-center border border-top-0 p-3">--}}
{{--                            <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>--}}
{{--                            <div class="input-group mb-2" style="width: 100%;">--}}
{{--                                <input type="text" class="form-control form-control-lg" placeholder="Your Email">--}}
{{--                                <div class="input-group-append">--}}
{{--                                    <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <small>Lorem ipsum dolor sit amet elit</small>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
{{--                    <div class="mb-3">--}}
{{--                        <div class="section-title mb-0">--}}
{{--                            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>--}}
{{--                        </div>--}}
{{--                        <div class="bg-white border border-top-0 p-3">--}}
{{--                            <div class="d-flex flex-wrap m-n1">--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>--}}
{{--                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


@endsection



