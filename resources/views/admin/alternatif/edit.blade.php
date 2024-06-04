@extends('admin.layouts.main')
@section('container')
    <div class="pagetitle">
        <h1>Edit Alternatif</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/view">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/alternatif">Alternatif</a></li>
                <li class="breadcrumb-item active">Edit Alternatif</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/admin/alternatif/{{ $datas->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Alternatif</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    name="nama" required autofocus value="{{ old('nama', $datas->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="C1" class="form-label">Harga Tiket</label>
                <input type="text" class="form-control @error('C1') is-invalid @enderror" id="C1"
                    name="C1" required autofocus value="{{ old('C1', $datas->C1) }}">
                @error('C1')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="C2" class="form-label">Jumlah Pengunjung Halaman</label>
                <input type="text" class="form-control @error('C2') is-invalid @enderror" id="C2"
                    name="C2" required autofocus value="{{ old('C2', $datas->C2) }}">
                @error('C2')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="C3" class="form-label">Jumlah Tiket Terjual</label>
                <input type="text" class="form-control @error('C3') is-invalid @enderror" id="C3"
                    name="C3" required autofocus value="{{ old('C3', $datas->C3) }}">
                @error('C3')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="C4" class="form-label">Rating Tiket</label>
                <input type="text" class="form-control @error('C4') is-invalid @enderror" id="C4"
                    name="C4" required autofocus value="{{ old('C4', $datas->C4) }}">
                @error('C4')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Alternatif</button>
        </form>
    </div>
@endsection
