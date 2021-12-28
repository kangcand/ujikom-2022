@extends('adminlte::page')

@section('content_header')
    Dashrboard
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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @role('admin')
                            Welcoma back <strong>{{ Auth::user()->name }}</strong>
                        @endrole

                        @role('member')
                            Welcoma member <strong>{{ Auth::user()->name }}</strong>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
