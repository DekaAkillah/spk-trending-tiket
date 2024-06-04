@extends('admin.layouts.main')
@section('container')
    <div class="pagetitle">
        <h1>Edit Visitor Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/view">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/visitor">Visitor Data</a></li>
                <li class="breadcrumb-item active">Edit Visitor Data</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/admin/visitor/{{ $data->id }}">
            @method('put')
            @csrf
            {{-- @if ($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif --}}
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    required autofocus value="{{ old('nama', $data->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                    name="alamat" required autofocus value="{{ old('alamat', $data->alamat) }}">
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                    name="no_hp" required autofocus value="{{ old('no_hp', $data->no_hp) }}">
                @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_datang" class="form-label">Tanggal Kedatangan</label>
                <input type="date" class="form-control" id="tgl_datang" name="tgl_datang" required autofocus
                    value="{{ old('tgl_datang', $data->tgl_datang) }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" required value="{{ old('email', $data->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="is_active" class="form-label">Status Kedatangan</label>
                <select class="form-select" name="is_active">
                    @if ($data->is_active == 1)
                        <option disabled selected>Check IN</option>
                    @elseif ($data->is_active == 0)
                        <option disabled selected>Check OUT</option>
                    @endif
                    <option value="1">Check IN</option>
                    <option value="0">Check OUT</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Visitor Data</button>
        </form>
    </div>
@endsection
