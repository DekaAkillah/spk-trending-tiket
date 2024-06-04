@extends('admin.layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>Visitor Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/view">Dashboard</a></li>
                <li class="breadcrumb-item active">Visitor Data</li>
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
                        {{-- <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a> --}}
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body p-3">
                        <form action="{{ route('view-pdf') }}" method="post" target="_blank">
                            @csrf
                            <a href="/admin/visitor/create" class="btn btn-primary mt-3"><i class="bi bi-plus"></i> Create
                                Visitor</a>
                            <a style="float: right;" href="/pengunjung/viewPDF" class="btn btn-danger mt-3 mx-2"><i class="bi bi-filetype-pdf"></i>
                                Export Data to PDF</a>
                            
                        </form>
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nomor Hp</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $datas)
                                    <tr>
                                        <th scope="row"><a href="#">{{ $loop->iteration }}</a></th>
                                        <td>{{ $datas->nama }}</td>
                                        <td>{{ $datas->alamat }}</td>
                                        <td>{{ $datas->no_hp }}</td>
                                        <td>{{ $datas->email }}</td>
                                        <td>
                                            @if ($datas->is_active == 0)
                                                <span class="badge bg-danger">Check Out</span>
                                            @elseif ($datas->is_active == 1)
                                                <span class="badge bg-success">Check In</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/admin/visitor/{{ $datas->id }}" class="btn btn-info"><i
                                                    class="bi bi-eye-fill"></i></a>
                                            <a href="/admin/visitor/{{ $datas->id }}/edit" class="btn btn-warning"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <form action="/admin/visitor/{{ $datas->id }}" method="post"
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
