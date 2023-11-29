<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="{{route('home')}}" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-uppercase text-primary">
                Biz<span class="text-white font-weight-normal">News</span>
            </h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{route('home')}}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">News</a>
{{--                <div class="nav-item dropdown">--}}
{{--                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>--}}
{{--                    <div class="dropdown-menu rounded-0 m-0">--}}
{{--                        @foreach($categories as $category)--}}
{{--                        <a href="{{route('category',$category->slug)}}" class="dropdown-item">{{ $category->category_name }}</a>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
                @foreach($categories->take(7) as $category)
                    <a href="{{ route('category', $category->slug) }}" class="nav-item nav-link {{ Route::currentRouteName() == 'category' && request()->route('slug') == $category->slug ? 'active' : '' }}">
                        {{ $category->category_name }}
                    </a>
                @endforeach



                {{--                <div class="nav-item dropdown">--}}
{{--                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>--}}
{{--                    <div class="dropdown-menu rounded-0 m-0">--}}
{{--                        <a href="#" class="dropdown-item">Menu item 1</a>--}}
{{--                        <a href="#" class="dropdown-item">Menu item 2</a>--}}
{{--                        <a href="#" class="dropdown-item">Menu item 3</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <a href="{{route('contact')}}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
            </div>
            <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                <input type="text" class="form-control border-0" placeholder="Keyword">
                <div class="input-group-append">
                    <button class="input-group-text bg-primary text-dark border-0 px-3">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</div>
