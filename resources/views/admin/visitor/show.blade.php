@extends('admin.layouts.main')
@section('container')
    <div class="pagetitle">
        <h1>Show Visitor Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/view">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/visitor">Visitor Data</a></li>
                <li class="breadcrumb-item active">Show Visitor Data</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-8">
        {{-- @if ($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif --}}
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                disabled value="{{ old('nama', $data->nama) }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                disabled value="{{ old('alamat', $data->alamat) }}">
            @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp"
                disabled value="{{ old('no_hp', $data->no_hp) }}">
            @error('no_hp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tgl_datang" class="form-label">Tanggal Kedatangan</label>
            <input type="date" class="form-control" id="tgl_datang" name="tgl_datang" disabled
                value="{{ old('tgl_datang', $data->tgl_datang) }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email', $data->email) }}" disabled>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="is_active" class="form-label">Status Kedatangan</label>
            <select class="form-select" name="is_active" disabled>
                @if ($data->is_active == 1)
                    <option disabled selected>Check IN</option>
                @elseif ($data->is_active == 0)
                    <option disabled selected>Check OUT</option>
                @endif
                <option value="1">Check IN</option>
                <option value="0">Check OUT</option>
            </select>
        </div>
        <a class="btn btn-success mb-3" href="/admin/visitor"><i class="bi bi-arrow-left"></i> Back to all Visitor Data</a>
    </div>
@endsection
