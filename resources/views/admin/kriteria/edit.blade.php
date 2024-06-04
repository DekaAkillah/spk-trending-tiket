@extends('admin.layouts.main')
@section('container')
    <div class="pagetitle">
        <h1>Edit Kriteria</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/view">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/kriteria">Kriteria</a></li>
                <li class="breadcrumb-item active">Edit Kriteria</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/admin/kriteria/{{ $kriteria->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Kriteria</label>
                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode"
                    name="kode" required autofocus value="{{ old('kode', $kriteria->kode) }}">
                @error('kode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    name="nama" required autofocus value="{{ old('nama', $kriteria->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="bobot" class="form-label">Bobot</label>
                <input type="text" class="form-control @error('bobot') is-invalid @enderror" id="bobot"
                    name="bobot" required autofocus value="{{ old('bobot', $kriteria->bobot) }}">
                @error('bobot')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="atribut" class="form-label">Atribut</label>
                <input type="text" class="form-control @error('atribut') is-invalid @enderror" id="atribut"
                    name="atribut" required autofocus value="{{ old('Atribut', $kriteria->atribut) }}">
                @error('atribut')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Kriteria</button>
        </form>
    </div>
@endsection
