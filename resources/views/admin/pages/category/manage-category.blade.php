@extends('admin.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Category</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">New Category</a>
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
                                <th width="80"></th>
                                <th>Category Name</th>
                                <th width="100">Status</th>
                                <th width="100">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td></td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    @if($category->status == 1)
                                        <svg class="text-success-500 h-6 w-6 text-success" width="24px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @else

                                        <svg class="text-danger-500 h-6 w-6 text-danger" width="24px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @endif
                                </td>
                                <td style="display: flex;flex-direction: row; justify-content: space-evenly">
{{--                                    @if($category->status == 1)--}}
{{--                                        <a href="{{ route('categories.show',$category->id) }}">Inactive</a>--}}
{{--                                    @else--}}

{{--                                        <a href="{{ route('categories.show',$category->id) }}">Active</a>--}}
{{--                                    @endif--}}
                                    <a href="{{ route('categories.edit',$category->id) }}">
                                        <svg class="filament-link-icon  mr-1" width="24px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                    <form class="text-danger mr-1 text-red-500 cursor-pointer" action="{{ route('categories.destroy',$category->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn text-danger m-0 p-0" type="submit"><i class="bi bi-trash3-fill p-1"></i></button>
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
                            @if ($categories->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">&laquo;</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $categories->previousPageUrl() }}" aria-label="Previous">&laquo;</a>
                                </li>
                            @endif

                            {{-- Numeric Page Links --}}
                            @foreach ($categories->links()->elements[0] as $page => $url)
                                <li class="page-item {{ ($page == $categories->currentPage()) ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($categories->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $categories->nextPageUrl() }}" aria-label="Next">&raquo;</a>
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






