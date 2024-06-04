@extends('admin.layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>Hasil Perhitungan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/view">Dashboard</a></li>
                <li class="breadcrumb-item active">Hasil Perhitungan</li>
            </ol>
        </nav>
        {{-- @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @elseif (session()->has('success-delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('success-delete') }}
            </div>
        @endif --}}
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        {{-- <a href="/admin/alternatif/create" class="btn btn-primary my-3"><i class="bi bi-plus"></i> Buat Kriteria</a> --}}
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga Tiket</th>
                                    <th scope="col">Jumlah Tiket Terjual</th>
                                    <th scope="col">Jumlah Pengunjung Halaman</th>
                                    <th scope="col">Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($datas as $data) --}}
                                    <tr>
                                        <td>Konser Musik 2024</td>
                                        <td>10000</td>
                                        <td>98</td>
                                        <td>102</td>
                                        <td>3</td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- End Recent Sales -->
        </div><!-- End Left side columns -->
        </div>
    </section>
@endsection
