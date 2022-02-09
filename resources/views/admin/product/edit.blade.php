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
                                Edit Article
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
    <script src="{{ asset('tinymce/js/tinymce/tinymce.js') }}"></script>
    <script src="{{ asset('select2/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.multiple').select2();
        });
    </script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea',
            height: 300,
            theme: 'modern',
            plugins: 'print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount   imagetools  contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            image_advtab: true,
            templates: [{
                    title: 'Test template 1',
                    content: 'Test 1'
                },
                {
                    title: 'Test template 2',
                    content: 'Test 2'
                }
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ]
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
                        <form action="{{ route('article.update', $article->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{ $article->title }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Image</label> <br>
                                <img src="{{ $article->image() }}" style="width: 100px; height:100px; padding:10px;">
                                <input type="file" value="{{ $article->foto }}" name="foto" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea type="file" name="content"
                                    class="form-control">{{ $article->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category_id" class="form-control" id="">
                                    @foreach ($category as $data)
                                        <option style="background-color: #414350" value="{{ $data->id }}"
                                            {{ $data->id == $article->category_id ? 'selected' : '' }}>
                                            {{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Tags</label>
                                <select name="tags[]" class="form-control multiple" id="" multiple="multiple">
                                    @foreach ($tag as $data)
                                        <option value="{{ $data->id }}"
                                            {{ in_array($data->id, $selectTag) ? 'selected' : '' }}>{{ $data->name }}
                                        </option>
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
