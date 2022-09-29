@extends('layout.layout')
@section('container')


    <table class="table table-stripped table-hover">
        <thead>
            <th>#</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jabatan</th>
            <th>Nomor</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($sertifikats as $sertifikat)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $sertifikat->nama }}</td>
                <td>{{ $sertifikat->nim }}</td>
                <td>{{ $sertifikat->jabatan }}</td>
                <td>{{ $sertifikat->nomor }}</td>
                <td>
                    <a href="/admin/{{ $sertifikat->id }}"><span class="badge bg-primary">Show</span></a>
                    <a href="/admin/{{ $sertifikat->id }}/edit"><span class="badge bg-warning">Edit</span></a>
                    <form action="#" class="d-inline" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn badge bg-danger" type="submit" onclick="return confirm('Kamu yakin ingin menghapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


@endsection
