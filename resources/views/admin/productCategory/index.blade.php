@extends('adminlte::page')

@section('content_header')
    Product Category Page
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <-- DataTable !-->
                        <div class="table-responsive">
                            <table class="table" id="example">
                                <thead>
                                    <tr>
                                        <th>Kolom 1</th>
                                        <th>Kolom 2</th>
                                        <th>Kolom 3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach() --}}
                                        <tr>
                                            <td>Isi Kolom 1</td>
                                            <td>Isi Kolom 2</td>
                                            <td>Isi Kolom 3</td>
                                        </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                        <-- End Data Table !-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
