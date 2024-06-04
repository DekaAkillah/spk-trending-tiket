@extends('admin.layouts.main')
@section('container')
    <div class="pagetitle">
        <h1>Buat Kriteria</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/view">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/kriteria">Kriteria</a></li>
                <li class="breadcrumb-item active">Buat Kriteria</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/admin/kriteria">
            @csrf
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Kriteria</label>
                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode"
                    name="kode" required autofocus value="{{ old('kode') }}">
                @error('kode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    name="nama" required autofocus value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Bobot" class="form-label">Bobot</label>
                <input type="text" class="form-control @error('Bobot') is-invalid @enderror" id="Bobot"
                    name="bobot" required autofocus value="{{ old('Bobot') }}">
                @error('Bobot')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Atribut" class="form-label">Atribut</label>
                <input type="text" class="form-control @error('Atribut') is-invalid @enderror" id="Atribut"
                    name="atribut" required autofocus value="{{ old('Atribut') }}">
                @error('Atribut')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Buat Kriteria</button>
        </form>
    </div>
@endsection
