@extends('admin.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <h6 class="text-uppercase font-weight-bold mb-3">Create Category</h6>
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="card ">
                            @if(session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <form class="p-2" action="{{ route('update.admin') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $heads->id }}" name="id">

{{--                                <div class="form-group">--}}
{{--                                    <label for="">Image</label>--}}
{{--                                    <input type="file" name="image" class="form-control" id="img" accept="image/*">--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" value="{{ $heads->name }}" name="name" class="form-control p-4" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" value="{{ $heads->email }}" name="email" class="form-control p-4" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="">Old Password</label>
                                    <input type="password" name="old_pass" class="form-control p-4" required="required"/>
                                    @error('old_pass')
                                    <div class="text-danger">{{ $error }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input type="password" name="new_pass" class="form-control p-4" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="">conform Password</label>
                                    <input type="password" name="conform_pass" class="form-control p-4" required="required"/>
                                </div>

                                <div>
                                    <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                            type="submit">Save</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection






