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
                                Article Category
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
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#articleCategory').DataTable();
        });
    </script>
    <script>
        $('.addcategory').on('click', function() {
            addcategory();
        });

        function addcategory() {
            let kategori =
            '<div>'+
                '<div class="form-group">'+
                    '<label for="">Nama Kategori</label>'+
                    '<div class="input-group input-group-outline">'+
                        '<input type="text" name="name[]" autocomplete="off" class="form-control @error('name.*') is-invalid @enderror">@error('name')>'+
                        '<span class="invalid-feedback" role="alert">'+
                            '<strong>{{ $message }}</strong>'+
                        '</span> @enderror'+
                    '</div>'+
                '</div>'+
                '<div class="form-group"> @csrf</div>'+
                '<div class="form-group">'+
                    '<a href="#" class="remove btn btn-danger">'+
                        '<i class="fa fa-trash-alt"></i> Hapus'+
                    '</a>'+
                '</div>'+
            '</div>';
            $('.kategori').append(kategori);
        };
        $('.remove').live('click', function() {
            $(this).parent().parent().remove();
        });
    </script> --}}
@endsection

@section('content')
    @include('layouts._flash')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Article Category
                        <a type="button" style="float: right;" class="btn btn-sm  btn-outline-primary" data-toggle="modal"
                            data-target=".articleCategory">Add
                            Data
                        </a>
                        @include('admin.articleCategory.create')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="articleCategory">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <form action="{{ route('article-category.destroy', $category->id) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a class="btn btn-outline btn-sm btn-outline-warning"
                                                        data-toggle="modal"
                                                        data-target=".articleCategory-edit-{{ $category->id }}">Edit
                                                    </a>
                                                    <a class="btn btn-outline btn-sm btn-outline-info" data-toggle="modal"
                                                        data-target=".articleCategory-show-{{ $category->id }}">Show
                                                    </a>
                                                    <button type="submit"
                                                        class="btn btn-outline btn-sm btn-outline-danger delete-confirm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('admin.articleCategory.edit')
                                        @include('admin.articleCategory.show')
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
