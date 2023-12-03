@props(['homeSetting'])

    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
        </div>
        <div class="bg-white text-center border border-top-0 p-3">
            <a href="{{ $homeSetting->link }}"><img class="img-fluid" src="{{ asset($homeSetting->image) }}" alt=""></a>
        </div>
    </div>

