@extends('layout.layout')
@section('container')
<form>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" aria-describedby="nama" value="{{ $sertifikat->nama }}">
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" value="{{ $sertifikat->nim }}">
            </div>
            <div class="mb-3">
                <label for="nomor" class="form-label">Nomor</label>
                <input type="text" class="form-control" id="nomor" value="{{ $sertifikat->nomor }}">
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">Jabatan</label>
                <select class="form-select" aria-label="Default select example">
                    <option {{ $sertifikat->jabatan == NULL ? 'selected' : '' }}>Staff Tetap</option>
                    @foreach ($jabatan as $jb)
                        <option {{ $sertifikat->jabatan == $jb ? 'selected' : '' }}>{{ $jb }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-2"></div>
    </div>
  </form>
@endsection
