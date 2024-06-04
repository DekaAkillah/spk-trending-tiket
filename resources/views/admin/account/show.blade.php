@extends('admin.layouts.main')
@section('container')
    <div class="pagetitle">
        <h1>Create New Account</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/view">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/user">Account</a></li>
                <li class="breadcrumb-item active">Create Account</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/admin/account">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username" disabled value="{{ old('username', $users->username) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" disabled value="{{ old('email', $users->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </form>
    </div>
@endsection