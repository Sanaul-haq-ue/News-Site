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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="p-2" action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="category_name" class="form-control p-4" placeholder="Category Name" required="required"/>
                                </div>

                                <div class="col-12">
                                    <label class="form-label mt-2" id="slug">Slug</label>
                                    <input type="text" name="slug" class="form-control p-4"/>
                                </div>

                                <div>
                                    <label class="form-label"> Status</label>&nbsp;&nbsp;

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" checked name="status" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                    </div>
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






