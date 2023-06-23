@extends('layout.main')

@section('title', 'Halaman Edit Sopir')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Sopir
                    </div>
                    <div class="card-body">

                        <form action="{{ route('sopir.update', $sopir->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ $sopir->nama }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nomorHP" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control @error('nomorHP') is-invalid @enderror"
                                    id="nomorHP" name="nomorHP" value="{{ $sopir->nomorHP }}">
                                @error('nomorHP')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="hargaJasa" class="form-label">Harga Jasa</label>
                                <input type="number" class="form-control @error('hargaJasa') is-invalid @enderror"
                                    id="hargaJasa" name="hargaJasa" value="{{ $sopir->hargaJasa }}">
                                @error('hargaJasa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3 mt-3">
                                <label for="gambar">Gambar</label>
                                <br>
                                <input type="file" class="form-control-file" id="gambar" name="gambar"
                                    value="{{ $sopir->gambar }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
