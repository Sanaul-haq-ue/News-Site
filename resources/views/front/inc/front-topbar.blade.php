<div class="container-fluid d-none d-lg-block">
    <div class="row align-items-center bg-dark px-lg-5">
        @if($headerSetting->topbarStatus == 1)
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-n2">
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">Monday, January 1, 2045</a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="{{ route('contact') }}">Contact</a>
                    </li>
                @if(session()->has('visitorId'))
                    <!-- If the user is logged in, show the Logout link -->
                        <li class="nav-item">
                            <a class="nav-link text-body small" href="{{ route('visitor.logout') }}">Logout</a>
                        </li>
                @else
                    <!-- If the user is not logged in, show the Login and Register links -->
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="{{ route('visitor.login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body small" href="{{ route('visitor.registration') }}">Register</a>
                        </li>
                    @endif

                </ul>
            </nav>
        </div>
        <div class="col-lg-3 text-right d-none d-md-block">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-auto mr-n2">
                    <li class="nav-item">
                        @if(!empty($headerSetting->twitterUrl))
                        <a class="nav-link text-body" href="{{$headerSetting->twitterUrl}}"><small class="fab fa-twitter"></small></a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if(!empty($headerSetting->facebookUrl))
                        <a class="nav-link text-body" href="{{$headerSetting->facebookUrl}}"><small class="fab fa-facebook-f"></small></a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if(!empty($headerSetting->linkedinUrl))
                        <a class="nav-link text-body" href="{{$headerSetting->linkedinUrl}}"><small class="fab fa-linkedin-in"></small></a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if(!empty($headerSetting->instagramUrl))
                        <a class="nav-link text-body" href="{{$headerSetting->instagramUrl}}"><small class="fab fa-instagram"></small></a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if(!empty($headerSetting->youtubeUrl))
                        <a class="nav-link text-body" href="{{$headerSetting->youtubeUrl}}"><small class="fab fa-youtube"></small></a>
                        @endif
                    </li>
                </ul>
            </nav>
        </div>
        @endif
    </div>
    <div class="row align-items-center bg-white py-3 px-lg-5">
        <div class="col-lg-4">
            @if($headerSetting->logoStatus == 1)
            <a href="{{route('home')}}" class="navbar-brand p-0 d-none d-lg-block">
                <h1 class="m-0 display-4 text-uppercase text-primary">{{$headerSetting->logoFirstHeading}}<span class="text-secondary font-weight-normal">{{$headerSetting->logoLastHeading}}</span></h1>
            </a>
            @endif
            @if($headerSetting->logoStatus == 0)
            <a href="{{route('home')}}" class="navbar-brand p-0 d-none d-lg-block">
                <img class="m-0 display-4" width="200px" height="50px" src="{{ asset($headerSetting->logoImage) }}" alt="LOgo">
            </a>
            @endif
        </div>
        <div class="col-lg-8 text-center text-lg-right">
            @if($headerSetting->advertisementtwoStatus == 1)
            <a href="{{ $headerSetting->advertisementwoLink }}"><img class="img-fluid" src="{{ $headerSetting->advertisementwoImage }}" alt=""></a>
            @endif
        </div>
    </div>
</div>
