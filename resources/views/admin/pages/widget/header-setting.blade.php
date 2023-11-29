@extends('admin.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <h6 class="text-uppercase font-weight-bold mb-5">Header Setting</h6>
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-9">
                                        <h1>Header Part</h1>
                                    </div>
                                    <div class="col-3 pt-3">
                                        @if($header_setting->topbarStatus == 1)
                                            <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                        @else
                                            <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <form class="p-2" action="{{ route('update.header.content') }}" method="post" enctype="multipart/form-data">
                                @csrf
{{--                                <input type="hidden" value="{{ $header_setting->id }}" name="id">--}}

                                <div class="col-12">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <div>
                                                <label class="form-label mt-2">Facebook Url</label>
                                                <input type="text" value="{{ $header_setting->facebookUrl }}" name="facebookUrl" class="form-control p-4"/>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div>
                                                <label class="form-label mt-2">Twitter Url</label>
                                                <input type="text" value="{{ $header_setting->twitterUrl }}" name="twitterUrl" class="form-control p-4"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <div>
                                                <label class="form-label mt-2">Linkedin Url</label>
                                                <input type="text" value="{{ $header_setting->linkedinUrl }}" name="linkedinUrl" class="form-control p-4"/>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div>
                                                <label class="form-label mt-2">Instagram Url</label>
                                                <input type="text" value="{{ $header_setting->instagramUrl }}" name="instagramUrl" class="form-control p-4"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12  mt-3">
                                    <div>
                                                <label class="form-label mt-2">Youtube Url</label>
                                                <input type="text" value="{{ $header_setting->youtubeUrl }}" name="youtubeUrl" class="form-control p-4"/>
                                            </div>
                                </div>

                                <div class="card mt-3 mb-2 pt-1 pb-3">
                                    <div class="col-12 mt-3">
                                        <label class="form-label mt-2">Logo</label>
                                        <div>
                                            <img src="{{ asset($header_setting->logoImage) }}" width="200px" height="120px" style="margin-bottom: 10px">
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <input type="file" class="form-control p-0" name="logoImage" accept="image/*">

                                        <div class="mt-2">
                                            <label class="form-label">Logo Status</label>&nbsp;&nbsp;

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="logoStatus" id="inlineRadio1" value="1" {{ $header_setting->logoStatus =='1'? 'checked': null }}>
                                                <label class="form-check-label" for="inlineRadio1">Text Logo</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="logoStatus" id="inlineRadio2" value="0" {{ $header_setting->logoStatus =='0'? 'checked': null }}>
                                                <label class="form-check-label" for="inlineRadio2">Logo</label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label mt-2">Logo First Heading</label>
                                                <input type="text" value="{{ $header_setting->logoFirstHeading }}" name="logoFirstHeading" class="form-control p-4"/>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label mt-2">Logo Last Heading</label>
                                                <input type="text" value="{{ $header_setting->logoLastHeading }}" name="logoLastHeading" class="form-control p-4"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6 pl-4">
                                        @if($header_setting->topbarStatus == 1)
                                            <a class="btn btn-sm btn-warning font-weight-semi-bold mt-2 px-4" href="{{ route('save.topbar.status', $header_setting->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                        @else
                                            <a class="btn btn-sm btn-success font-weight-semi-bold mt-2 px-4" href="{{ route('save.topbar.status', $header_setting->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-primary font-weight-semi-bold mt-2 px-4" style="height: 50px;"
                                                type="submit">Save</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-10 offset-1">
                        <form action="{{ route('save.advertisementtwo') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header" style="display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#collapseOffer">
                            <div>
                                <h6 class="text-black" style="margin-bottom: 0px">ADVERTISEMENT<i class="bi bi-question-circle" style=" color: red" data-bs-toggle="tooltip" data-bs-placement="top" title="Show Advertisement in homw page"></i></h6>
                            </div>
                            <div>
                                @if($header_setting->advertisementtwoStatus == 1)
                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                @else
                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                @endif
                            </div>

                        </div>
                            <div class="card-body row collapse" id="collapseOffer">
                            <input type="hidden" name="id" value="{{ $header_setting->id }}">
                            <div class="col-md-12 mb-2">
                                <img src="{{ asset($header_setting->advertisementwoImage) }}" width="600px" height="120px" style="margin-bottom: 10px">
                                <input type="file" class="form-control p-0" name="advertisementwoImage" accept="image/*">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label>Link</label>
                                <input type="text" class="form-control" name="advertisementwoLink" value="{{ $header_setting->advertisementwoLink }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                @if($header_setting->advertisementtwoStatus == 1)
                                    <a class="btn btn-sm btn-warning" href="{{ route('save.advertisementtwo.status', $header_setting->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                @else
                                    <a class="btn btn-sm btn-success" href="{{ route('save.advertisementtwo.status', $header_setting->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                @endif
                            </div>
                            <div class="col-md-6 mb-2">
                                <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                            </div>

                        </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection






