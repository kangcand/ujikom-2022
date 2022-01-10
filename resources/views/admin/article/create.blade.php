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
                            <a href="{{ route('article.index') }}">
                                Article
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                Add Article
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="{{ asset('select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('js')
    <script src="{{ asset('select2/select2.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.multiple').select2();
        });
    </script>
@endsection

@section('content')
    @include('layouts._flash')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Article
                    </div>
                    <div class="card-body">
                        <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea type="file" name="content" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category_id" class="form-control" id="">
                                    @foreach ($category as $data)
                                        <option style="background-color: #414350" value="{{ $data->id }}">
                                            {{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Tags</label>
                                <select name="tags[]" class="form-control multiple" id="" multiple="multiple">
                                    @foreach ($tag as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-outline-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
