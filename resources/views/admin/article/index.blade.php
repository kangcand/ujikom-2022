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
                                Article
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
            $('#article').DataTable();
        });
    </script>
@endsection

@section('content')
    @include('layouts._flash')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Article
                        <a href="{{ route('article.create') }}" style="float: right;"
                            class="btn btn-sm  btn-outline-primary">Add Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="article">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Tags</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->User->name }}</td>
                                            <td>
                                                <img src="{{ $article->image() }}" style="height: 100px; width:100px;"
                                                    alt="">
                                            </td>
                                            <td>{{ $article->Category->name }}</td>
                                            <td>
                                                @foreach ($article->ArticleTag as $tags)
                                                    <li>{{ $tags->name }}</li>
                                                @endforeach
                                            </td>
                                            <td>
                                                <form action="{{ route('article.destroy', $article->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('article.edit', $article->id) }}"
                                                        class="btn btn-outline btn-sm btn-outline-warning">Edit</a>
                                                    <a href="{{ route('article.show', $article->id) }}"
                                                        class="btn btn-outline btn-sm btn-outline-info">Show
                                                    </a>
                                                    <button type="submit" class="btn btn-outline btn-sm btn-outline-danger"
                                                        onclick="return confirm('Are you Sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
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
