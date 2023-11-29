@extends('admin.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Blog</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create Blog</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <div class="input-group input-group" style="width: 250px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th width="60">Sl</th>
                                <th width="80">Image</th>
                                <th>Title</th>
                                <th width="100">Slug</th>
                                <th width="100">Category Name</th>
                                <th width="100">Date</th>
                                <th width="100">Blog Type</th>
                                <th width="100">Description</th>
                                <th width="100">status</th>
                                <th width="100">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset($blog->image) }}" alt="" class="img-fluid">
                                    </td>
                                    <td>{{ substr($blog->title,0,15) }}</td>
                                    <td>{{ substr($blog->slug,0,10) }}</td>
                                    <td>{{ $blog->category->category_name }}</td>
                                    <td>{{ $blog->date }}</td>
                                    <td>{{ $blog->blog_type }}</td>
                                    <td>{{ substr($blog->description,0,30) }}</td>
                                    <td class="text-center font-icon">
                                        @if($blog->status==1)
                                            <i class="bi bi-check-circle font-check-blue"></i>
                                        @else
                                            <i class="bi bi-x-circle font-check-red"></i>
                                        @endif

                                    </td>
                                    <td class="font-icon text-center" style="display: flex;flex-direction: row; justify-content: space-evenly">

                                        @if($blog->status == 1)
                                            <a href="{{ route('blogs.show',$blog->id) }}">
{{--                                                <i class="bi bi-app font-check-red p-1"></i>--}}
                                                <i class="bi bi-eye-slash-fill font-check-red"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('blogs.show',$blog->id) }}">
{{--                                                <i class="bi bi-app font-check-blue p-1"></i>--}}
                                                <i class="bi bi-eye-fill font-check-blue"></i>
                                            </a>
                                        @endif


                                        <a href="{{ route('blogs.edit',$blog->id) }}">
                                            <i class="bi bi-pen font-check-blue p-1"></i>
                                        </a>


                                        <form class="text-danger mr-1 text-red-500" action="{{ route('blogs.destroy',$blog->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn text-danger m-0 p-0" style="font-size: 20px"><i class="bi bi-trash3-fill p-1"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination m-0 float-right">

                            {{-- Previous Page Link --}}
                            @if ($blogs->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">&laquo;</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $blogs->previousPageUrl() }}" aria-label="Previous">&laquo;</a>
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
                                    <a class="page-link" href="{{ $blogs->nextPageUrl() }}" aria-label="Next">&raquo;</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">&raquo;</span>
                                </li>
                            @endif

                        </ul>
                    </div>

                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection






