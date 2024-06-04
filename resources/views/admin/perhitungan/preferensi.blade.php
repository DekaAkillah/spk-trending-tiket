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
                    <div class="card-body">
                        <h3 class="p-2">Bobot Kriteria</h3>
                        {{-- <a href="/admin/alternatif/create" class="btn btn-primary my-3"><i class="bi bi-plus"></i> Buat Kriteria</a> --}}
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Harga Tiket</th>
                                    <th scope="col">Jumlah Tiket Terjual</th>
                                    <th scope="col">Jumlah Pengunjung Halaman</th>
                                    <th scope="col">Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($datas as $data) --}}
                                <tr>
                                    <td>{{ $widget1['kriterias'] }}</td>
                                    <td>{{ $widget2['kriterias'] }}</td>
                                    <td>{{ $widget3['kriterias'] }}</td>
                                    <td>{{ $widget4['kriterias'] }}</td>
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
    <section class="section dashboard">
        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h3 class="p-2">Normalisasi</h3>
                        {{-- <a href="/admin/alternatif/create" class="btn btn-primary my-3"><i class="bi bi-plus"></i> Buat Kriteria</a> --}}
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">C1</th>
                                    <th scope="col">C2</th>
                                    <th scope="col">C3</th>
                                    <th scope="col">C4</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hasilNormalisasi as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['C1'] }}</td>
                                    <td>{{ $item['C2'] }}</td>
                                    <td>{{ $item['C3'] }}</td>
                                    <td>{{ $item['C4'] }}</td>
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
    <section class="section dashboard">
        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h3 class="p-2">Nilai Preferensi</h3>
                        {{-- <a href="/admin/alternatif/create" class="btn btn-primary my-3"><i class="bi bi-plus"></i> Buat Kriteria</a> --}}
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Rank</th>
                                    <th scope="col">Nama Tiket</th>
                                    <th scope="col">Hasil Perhitungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nilaiPreferensi as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>{{ $item['nilai'] }}</td>
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
