@extends('layout.layout')
@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <table class="table table-stripped table-hover">
                <thead>
                    <th colspan="2">Detail</th>
                    <a href="/admin" class="btn btn-danger">Back</a>
                </thead>
                <tbody>
                    <tr>
                        <th>Nama : </th>
                        <td>{{ $sertifikat->nama }}</td>
                    </tr>
                    <tr>
                        <th>NIM : </th>
                        <td>{{ $sertifikat->nim }}</td>
                    </tr>
                    <tr>
                        <th>Jabatan : </th>
                        <td>{{ $sertifikat->jabatan == NULL ? 'Anggota' : $sertifikat->jabatan }}</td>
                    </tr>
                    <tr>
                        <th>No Sertifikat : </th>
                        <td>{{ $sertifikat->nomor }}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
