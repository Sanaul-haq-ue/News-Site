@extends('admin.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Home Setting</h1>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">

                <div class="col-md-6 offset-3">
                        <form action="{{ route('save.advertisement') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header" style="display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#collapseOffer">
                                    <div>
                                        <h6 class="text-black" style="margin-bottom: 0px">ADVERTISEMENT<i class="bi bi-question-circle" style=" color: red" data-bs-toggle="tooltip" data-bs-placement="top" title="Show Advertisement in homw page"></i></h6>
                                    </div>
                                    <div>
                                        @if($homeSetting->advertisementStatus == 1)
                                            <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                        @else
                                            <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                        @endif
                                    </div>

                                </div>
                                <div class="card-body row collapse" id="collapseOffer">
                                    <input type="hidden" name="id" value="{{ $homeSetting->id }}">
                                    <div class="col-md-12 mb-2">
                                        <img src="{{ asset($homeSetting->image) }}" width="200px" height="120px" style="margin-bottom: 10px">
                                        <input type="file" class="form-control p-0" name="image" accept="image/*">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label>Link</label>
                                        <input type="text" class="form-control" name="link" value="{{ $homeSetting->link }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        @if($homeSetting->advertisementStatus == 1)
                                            <a class="btn btn-sm btn-warning" href="{{ route('save.advertisement.status', $homeSetting->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                        @else
                                            <a class="btn btn-sm btn-success" href="{{ route('save.advertisement.status', $homeSetting->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>


                <div class="row mt-5">
                    <div class="col-md-6">
                         <form action="{{ route('save.first') }}" method="post" enctype="multipart/form-data">
                             @csrf
                             <div class="card">

                                 <div class="card-header" style="display: flex; justify-content: space-between;">
                                     <div class="w-70">
                                         <h6 class="text-black" style="margin-bottom: 0px;">Select a Category which Products you want to show at first</h6>
                                     </div>
                                     <div class="w-30">
                                         @if($homeSetting->firstStatus == 1)
                                             <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                         @else
                                             <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                         @endif
                                     </div>
                                 </div>
                                 <div class="card-body row">
                                     <input type="hidden" name="id" value="{{ $homeSetting->id }}">
                                     <div class="col-md-12 mb-2">
                                         <select class="form-control" name="firstCategory">
                                             @foreach($categories as $category)
                                                 <option value="{{ $category->id }}" {{ $category->id == $homeSetting->firstCategory ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                             @endforeach
                                         </select>
                                     </div>
                                     <div class="col-md-12 mb-2" style="padding-top: 20px;">
                                         <div class="row">
                                             <div class="col-md-6 mb-2">
                                                 @if($homeSetting->firstStatus == 1)
                                                     <a class="btn btn-sm btn-warning" href="{{ route('save.first.status', $homeSetting->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                                 @else
                                                     <a class="btn btn-sm btn-success" href="{{ route('save.first.status', $homeSetting->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                                 @endif
                                             </div>
                                             <div class="col-md-6 mb-2">
                                                 <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                             </div>
                                         </div>

                                     </div>
                                 </div>
                             </div>
                         </form>
                    </div>
                    <div class="col-md-6">
                                <form action="{{ route('save.second') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card">
                                        <div class="card-header" style="display: flex; justify-content: space-between;">
                                            <div class="w-70">
                                                <h6 class="text-black" style="margin-bottom: 0px;">Select a Category which Products you want to show at Second</h6>
                                            </div>
                                            <div class="w-30">
                                                @if($homeSetting->secondStatus == 1)
                                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                                @else
                                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                                @endif
                                            </div>

                                        </div>
                                        <div class="card-body row">
                                            <input type="hidden" name="id" value="{{ $homeSetting->id }}">
                                            <div class="col-md-12 mb-2">
                                                <select class="form-control" name="secondCategory">
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id == $homeSetting->secondCategory ? 'selected' : '' }}>{{ $category->category_name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-2" style="padding-top: 20px;">
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        @if($homeSetting->secondStatus == 1)
                                                            <a class="btn btn-sm btn-warning" href="{{ route('save.second.status', $homeSetting->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                                        @else
                                                            <a class="btn btn-sm btn-success" href="{{ route('save.second.status', $homeSetting->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    <div class="col-md-6  mt-5">
                                <form action="{{ route('save.third') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card">
                                        <div class="card-header" style="display: flex; justify-content: space-between;">
                                            <div class="w-70">
                                                <h6 class="text-black" style="margin-bottom: 0px;">Select a Category which Products you want to show at third</h6>
                                            </div>
                                            <div class="w-30">
                                                @if($homeSetting->thirdStatus == 1)
                                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                                @else
                                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                                @endif
                                            </div>

                                        </div>
                                        <div class="card-body row">
                                            <input type="hidden" name="id" value="{{ $homeSetting->id }}">
                                            <div class="col-md-12 mb-2">
                                                <select class="form-control" name="thirdCategory">
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id == $homeSetting->thirdCategory ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-2" style="padding-top: 20px;">
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        @if($homeSetting->thirdStatus == 1)
                                                            <a class="btn btn-sm btn-warning" href="{{ route('save.third.status', $homeSetting->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                                        @else
                                                            <a class="btn btn-sm btn-success" href="{{ route('save.third.status', $homeSetting->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    <div class="col-md-6  mt-5">
                                <form action="{{ route('save.four') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card">
                                        <div class="card-header" style="display: flex; justify-content: space-between;">
                                            <div class="w-70">
                                                <h6 class="text-black" style="margin-bottom: 0px;">Select a Category which Products you want to show at third</h6>
                                            </div>
                                            <div class="w-30">
                                                @if($homeSetting->fourStatus == 1)
                                                    <i class="bi bi-check-circle-fill" style="color: green"></i> ACTIVE
                                                @else
                                                    <i class="bi bi-x-circle-fill" style="color: red"></i> INACTIVE
                                                @endif
                                            </div>

                                        </div>
                                        <div class="card-body row">
                                            <input type="hidden" name="id" value="{{ $homeSetting->id }}">
                                            <div class="col-md-12 mb-2">
                                                <select class="form-control" name="fourCategory">
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id == $homeSetting->fourCategory ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-2" style="padding-top: 20px;">
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        @if($homeSetting->fourStatus == 1)
                                                            <a class="btn btn-sm btn-warning" href="{{ route('save.four.status', $homeSetting->id) }}"><i class="bi bi-x-circle-fill"></i> Inactive</a>
                                                        @else
                                                            <a class="btn btn-sm btn-success" href="{{ route('save.four.status', $homeSetting->id) }}"><i class="bi bi-check-circle-fill"></i> Active</a>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <button class="btn btn-sm btn-primary" type="submit">Save Settings</button>
                                                    </div>
                                                </div>

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






