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
                                Data User
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
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(".delete-confirm").click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
    <script src="{{ asset('select2/select2.min.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#users').DataTable();
        });
    </script>
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
                    <div class="card-header">Users
                        <a type="button" style="float: right;" class="btn btn-sm  btn-outline-primary" data-toggle="modal"
                            data-target=".users">Add Data
                        </a>
                        <form action="{{ url('admin/laporan/users/export') }}" method="post">
                            @csrf
                            <button style="float: left;" class="btn btn-sm  btn-outline-info" type="submit">Export User
                            </button>
                        </form>
                        @include('admin.users.create')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="users">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        @if ($loop->first)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @foreach ($user->roles as $role)
                                                        {{ $role->name }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a class="btn btn-outline btn-sm btn-outline-warning"
                                                        data-toggle="modal"
                                                        data-target=".users-edit-{{ $user->id }}">Edit
                                                    </a>
                                                    <a class="btn btn-outline btn-sm btn-outline-info" data-toggle="modal"
                                                        data-target=".users-show-{{ $user->id }}">Show
                                                    </a>
                                                </td>
                                            </tr>
                                            @include('admin.users.edit')
                                            @include('admin.users.show')
                                        @else
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @foreach ($user->roles as $role)
                                                        {{ $role->name }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <a class="btn btn-outline btn-sm btn-outline-warning"
                                                            data-toggle="modal"
                                                            data-target=".users-edit-{{ $user->id }}">Edit
                                                        </a>
                                                        <a class="btn btn-outline btn-sm btn-outline-info"
                                                            data-toggle="modal"
                                                            data-target=".users-show-{{ $user->id }}">Show
                                                        </a>
                                                        <button type="submit"
                                                            class="btn btn-outline btn-sm btn-outline-danger delete-confirm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @include('admin.users.edit')
                                            @include('admin.users.show')
                                        @endif
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
