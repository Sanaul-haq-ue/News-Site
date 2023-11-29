@extends('admin.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Admin</h1>
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
{{--                    <div class="card-header">--}}
{{--                        <div class="card-tools">--}}
{{--                            <div class="input-group input-group" style="width: 250px;">--}}
{{--                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">--}}

{{--                                <div class="input-group-append">--}}
{{--                                    <button type="submit" class="btn btn-default">--}}
{{--                                        <i class="fas fa-search"></i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th width="60"></th>
                                <th width="80"></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th width="100">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($heads as $head)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td></td>
                                    <td>{{ $head->name }}</td>
                                    <td>{{ $head->email }}</td>
                                    <td style="display: flex;flex-direction: row; justify-content: space-evenly">
                                        <a href="{{ route('edit.admin',$head->id) }}">
                                            <svg class="filament-link-icon  mr-1" width="24px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection






