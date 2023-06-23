@extends('layout.main')

@section('title', 'Halaman Tambah Sopir')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Sopir
                    </div>
                    <div class="card-body">

                        <form action="{{ route('sopir.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nomorHP" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control @error('nomorHP') is-invalid @enderror"
                                    id="nomorHP" name="nomorHP" value="{{ old('nomorHP') }}">
                                @error('nomorHP')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="hargaJasa" class="form-label">Harga Jasa</label>
                                <input type="number" class="form-control @error('hargaJasa') is-invalid @enderror"
                                    id="hargaJasa" name="hargaJasa" value="{{ old('hargaJasa') }}">
                                @error('hargaJasa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="gambar">Gambar:</label>
                                <input type="file" id="gambar" name="gambar" value="{{ old('gambar') }}"
                                    class="form-control" required>
                                @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
