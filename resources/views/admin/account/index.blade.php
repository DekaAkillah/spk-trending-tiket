@extends('admin.layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>Account Section</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/view">Dashboard</a></li>
                <li class="breadcrumb-item active">Account</li>
            </ol>
        </nav>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @elseif (session()->has('success-delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('success-delete') }}
            </div>
        @endif
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <a href="/admin/account/create" class="btn btn-primary my-3"><i class="bi bi-plus"></i> Create
                            Account</a>

                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row"><a href="#">{{ $loop->iteration }}</a></th>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="/admin/account/{{ $user->id }}" class="btn btn-info"><i
                                                    class="bi bi-eye-fill"></i></a>
                                            <a href="/admin/account/{{ $user->id }}/edit" class="btn btn-warning"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <form action="/admin/account/{{ $user->id }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger border-0"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i
                                                        class="bi bi-x-circle"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- End Recent Sales -->
        </div><!-- End Left side columns -->
        </div>
    </section>
@endsection
