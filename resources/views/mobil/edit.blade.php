@extends('layout.main')

@section('title', 'Halaman Edit Mobil')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Mobil</div>

                    <div class="card-body">
                        <form action="{{ route('mobil.update', $mobil->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="plat">Plat</label>
                                <input type="text" class="form-control" id="plat" name="plat"
                                    value="{{ $mobil->plat }}" required>
                            </div>

                            <div class="form-group mb-3 mt-3">
                                <label for="gambar">Gambar</label>
                                <br>
                                <input type="file" class="form-control-file" id="gambar" name="gambar"
                                    value="{{ $mobil->gambar }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="merk">Merk</label>
                                <input type="text" class="form-control" id="merk" name="merk"
                                    value="{{ $mobil->merk }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tipe" class="form-label">Tipe Mobil</label>
                                <select class="form-control @error('tipe') is-invalid @enderror" id="tipe" name="tipe">
                                    <option value="manual" {{ old('tipe', $mobil->tipeMobil) == 'manual' ? 'selected' : '' }}>Manual</option>
                                    <option value="automatic" {{ old('tipe', $mobil->tipeMobil) == 'automatic' ? 'selected' : '' }}>Automatic</option>
                                </select>
                                @error('tipe')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="kapasitas">Kapasitas</label>
                                <input type="number" class="form-control" id="kapasitas" name="kapasitas"
                                    value="{{ $mobil->kapasitas }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tahunproduksi">Tahun Produksi</label>
                                <select class="form-control" id="tahunproduksi" name="tahunproduksi" required>
                                    @for ($i = 2001; $i <= 2023; $i++)
                                        <option value="{{ $i }}"
                                            {{ $mobil->tahunproduksi == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="hargasewa">Harga Sewa</label>
                                <input type="number" class="form-control" id="hargasewa" name="hargasewa"
                                    value="{{ $mobil->hargasewa }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
