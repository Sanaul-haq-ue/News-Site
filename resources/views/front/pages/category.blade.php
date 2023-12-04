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
                                        <span class="text-gray-500 text-sm">{{ $blog->getReadingTime() }} min read<span/>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>
                                            @if(!empty( $blog->count ))
                                                {{ $blog->count }}
                                            @else
                                                0
                                            @endif
                                        </small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>{{ $blog->comments->count() ?? 0 }}</small>
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
                        @php
                            $oneMonthAgo = now()->subMonth(); // Assuming you want to get posts from one month ago
                        @endphp
                        <div class="bg-white border border-top-0 p-3">
                            <div class="bg-white border border-top-0 p-3">
                                @foreach($popularPosts->where('created_at', '>=', $oneMonthAgo) as $post)
                                    <x-post.popular :post="$post"/>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Ads Start -->
                    @if($homeSetting->advertisementStatus == 1)
                        <x-post.advertisement :homeSetting="$homeSetting"/>
                    @endif
                    <!-- Ads End -->

                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


@endsection



