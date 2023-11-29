<div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
    <div class="row py-4">
        <div class="col-lg-4 col-md-4 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
            <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>{{ $contact_body->office_address }}</p>
            <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>{{ $contact_body->phone }}</p>
            <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>{{ $contact_body->email_address }}</p>
            <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
            <div class="d-flex justify-content-start">
                @if(!empty($headerSetting->twitterUrl))
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="{{$headerSetting->twitterUrl}}"><i class="fab fa-twitter"></i></a>
                @endif
                @if(!empty($headerSetting->facebookUrl))
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="{{$headerSetting->facebookUrl}}"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if(!empty($headerSetting->linkedinUrl))
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="{{$headerSetting->linkedinUrl}}"><i class="fab fa-linkedin-in"></i></a>
                @endif
                @if(!empty($headerSetting->instagramUrl))
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="{{$headerSetting->instagramUrl}}"><i class="fab fa-instagram"></i></a>
                @endif
                @if(!empty($headerSetting->youtubeUrl))
                <a class="btn btn-lg btn-secondary btn-lg-square" href="{{$headerSetting->youtubeUrl}}"><i class="fab fa-youtube"></i></a>
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-4 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
            <div class="mb-3">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                </div>
                <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
            </div>
            <div class="mb-3">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                </div>
                <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
            </div>
            <div class="">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                </div>
                <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
            <div class="m-n1">
                @foreach($categories->take(23) as $category)
                <a href="{{ route('category', $category->slug) }}" class="btn btn-sm btn-secondary m-1 {{ Route::currentRouteName() == 'category' && request()->route('slug') == $category->slug ? 'active' : '' }}">
                    {{ $category->category_name }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
    <p class="m-0 text-center">&copy; <a href="https://github.com/Sanaul-haq-ue">2023</a>. All Rights Reserved.

        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        Design by <a href="https://github.com/Sanaul-haq-ue">Sanaul Haque</a></p>
</div>
