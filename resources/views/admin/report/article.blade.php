@extends('adminlte::page')

@section('content_header')
    Admin Dashrboard
@endsection

@section('css')

@endsection

@section('js')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <form action="{{ route('reportArticle') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Date Start</label>
                                <input type="date" name="tanggalAwal" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Date End</label>
                                <input type="date" name="tanggalAkhir" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-primary" type="submit">Search Report</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
