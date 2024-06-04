@extends('admin.layouts.main')
@section('container')
    <div class="pagetitle">
        <h1>Edit Tiket Event</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/view">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/tiket">Tiket</a></li>
                <li class="breadcrumb-item active">Edit Tiket Event</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/admin/tiket/{{ $data->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama_event" class="form-label">Nama Event</label>
                <input type="text" class="form-control @error('nama_event') is-invalid @enderror" id="nama_event"
                    name="nama_event" required autofocus value="{{ old('nama_event', $data->nama_event) }}">
                @error('nama_event')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tanggal_event" class="form-label">Tanggal Event</label>
                <input type="text" class="form-control @error('tanggal_event') is-invalid @enderror" id="tanggal_event"
                    name="tanggal_event" required placeholder="(tahun-bulan-hari)" autofocus value="{{ old('tanggal_event', $data->tanggal_event) }}">
                @error('tanggal_event')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="lokasi_event" class="form-label">Lokasi Event</label>
                <input type="text" class="form-control @error('lokasi_event') is-invalid @enderror" id="lokasi_event"
                    name="lokasi_event" required autofocus value="{{ old('lokasi_event', $data->lokasi_event) }}">
                @error('lokasi_event')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga_tiket" class="form-label">Harga Tiket</label>
                <input type="text" class="form-control @error('harga_tiket') is-invalid @enderror" id="harga_tiket"
                    name="harga_tiket" required autofocus value="{{ old('harga_tiket', $data->harga_tiket) }}">
                @error('harga_tiket')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating Tiket</label>
                <input type="text" class="form-control @error('rating') is-invalid @enderror" id="rating"
                    name="rating" required autofocus value="{{ old('rating', $data->rating) }}">
                @error('rating')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jumlah_pengunjung_hal" class="form-label">Jumlah Pengunjung Halaman Tiket</label>
                <input type="text" class="form-control @error('jumlah_pengunjung_hal') is-invalid @enderror" id="jumlah_pengunjung_hal"
                    name="jumlah_pengunjung_hal" required autofocus value="{{ old('jumlah_pengunjung_hal', $data->jumlah_pengunjung_hal) }}">
                @error('jumlah_pengunjung_hal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tiket_terjual" class="form-label">Total Tiket Terjual</label>
                <input type="text" class="form-control @error('tiket_terjual') is-invalid @enderror" id="tiket_terjual"
                    name="tiket_terjual" required autofocus value="{{ old('tiket_terjual', $data->tiket_terjual) }}">
                @error('tiket_terjual')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Tiket</button>
        </form>
    </div>
@endsection
