@extends('admin.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <h6 class="text-uppercase font-weight-bold mb-3">Create Blog</h6>
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="card ">
                            <form class="p-2" action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="col-12">
                                    <label class="form-label" id="title">Title</label>
                                    <input type="text" name="title" class="form-control p-4" required="required"/>
                                </div>

                                <div class="col-12">
                                    <label class="form-label mt-2" id="slug">Slug</label>
                                    <input type="text" name="slug" class="form-control p-4"/>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label mt-2" id="slug">Category</label>
                                            <select name="category_id" id="category" class="form-control" required="required">
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label mt-2">Date</label>
                                            <input type="date" name="date" class="form-control" required="required"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6 form-group pl-4">
                                            <div class="row">
                                                <label class="form-label mt-2">Add Slider</label>&nbsp;&nbsp;&nbsp;
                                            </div>
                                            <div class="form-control row  mr-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" checked name="addSlider" id="inlineRadio1" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Active</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="addSlider" id="inlineRadio2" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label mt-2">Blog Type</label>
                                            <select name="blog_type" class="form-control">
                                                <option value="">Select BLog Type</option>
                                                <option value="Breaking-News">Breking News</option>
                                                <option value="tranding">Tranding</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <label class="form-label mt-2">Image</label>
                                    <input type="file" name="image" class="form-control" id="img" required="required/" accept="image/*">
                                </div>

                                <div class="col-12">
                                    <label class="form-label mt-2" id="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="10" required="required"></textarea>
                                </div>


                                <div class="col-12">
                                    <button class="btn btn-primary font-weight-semi-bold mt-2 px-4" style="height: 50px;"
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






