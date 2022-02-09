@extends('adminlte::page')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">
                                Article Tag
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#articleTag').DataTable();
        });
    </script>
@endsection

@section('content')
    @include('layouts._flash')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Article Tag
                        <a type="button" style="float: right;" class="btn btn-sm  btn-outline-primary" data-toggle="modal"
                            data-target=".articleTag">Add
                            Data
                        </a>
                        @include('admin.articleTag.create')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="articleTag">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tag Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $tag->name }}</td>
                                            <td>{{ $tag->slug }}</td>
                                            <td>
                                                <form action="{{ route('article-tag.destroy', $tag->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a class="btn btn-outline btn-sm btn-outline-warning"
                                                        data-toggle="modal"
                                                        data-target=".articleTag-edit-{{ $tag->id }}">Edit
                                                    </a>
                                                    <a class="btn btn-outline btn-sm btn-outline-info" data-toggle="modal"
                                                        data-target=".articleTag-show-{{ $tag->id }}">Show
                                                    </a>
                                                    <button type="submit" class="btn btn-outline btn-sm btn-outline-danger"
                                                        onclick="return confirm('Are you Sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('admin.articleTag.edit')
                                        @include('admin.articleTag.show')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
