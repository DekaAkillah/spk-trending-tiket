@extends('admin.layouts.main-pdf')
@section('container')
    <h3>Laporan Data Pengunjung</h3>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tgl Datang</th>
                <th>Gender</th>
                <th>Email</th>
                <th>No. HP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visitor as $data)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->tgl_datang }}</td>
                    <td>{{ $data->gender }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->no_hp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection