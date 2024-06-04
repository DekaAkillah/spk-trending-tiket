@extends('admin.layouts.main')
@section('container')
    <div class="pagetitle">
        <h1>Create Visitor Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/view">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/visitor">Visitor Data</a></li>
                <li class="breadcrumb-item active">Edit Visitor Data</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/admin/visitor">
            @csrf
            {{-- @if ($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif --}}
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    required autofocus value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                    name="alamat" required autofocus value="{{ old('alamat') }}">
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Laki-Laki"
                            checked required>
                        <label class="form-check-label" for="gridRadios1">
                            Laki-Laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Perempuan" required>
                        <label class="form-check-label" for="gridRadios2">
                            Perempuan
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                    name="no_hp" required autofocus value="{{ old('no_hp') }}">
                @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_datang" class="form-label">Tanggal Kedatangan</label>
                <input type="date" class="form-control" id="tgl_datang" name="tgl_datang" required autofocus
                    value="{{ old('tgl_datang') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="is_active" class="form-label">Status Kedatangan</label>
                <select class="form-select" name="is_active">
                    <option disabled="disabled" selected="selected">Pilih Salah Satu</option>
                    <option value="1">Check IN</option>
                    <option value="0">Check OUT</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Visitor Data</button>
        </form>
    </div>
@endsection
