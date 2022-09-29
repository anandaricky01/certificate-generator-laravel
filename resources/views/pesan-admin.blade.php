<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesan Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="container-fluid">
    <div class="bg-light">
        <a href="/" class="btn btn-danger my-3">back</a>
        <div class="row mb-3">
            <div class="col-2"></div>
            <div class="col-8 text-center">
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! session('success') !!}
                    </div>
                @endif
                <h2>Pesan Kepada Admin</h2>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row mb-3">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="border border-1 rounded-1 p-3 bg-white">
                    <form method="POST" action="/kirim-pesan">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama">
                            @error('nama')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                            <div id="emailHelp" class="form-text">Gunakan nama panjang yang benar</div>
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">Nim</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim">
                            @error('nim')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea name="pesan" class="form-control @error('pesan') is-invalid @enderror" id="" cols="20" rows="3"></textarea>
                            @error('pesan')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                            <div id="emailHelp" class="form-text">Tuliskan kesalahan pada sertifikat yang kamu dapat dengan lugas dan jelas</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
