@extends('layout.main')

@section('title', 'Halaman Tambah Mobil')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Mobil</div>

                    <div class="card-body">
                        <form action="{{ route('mobil.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="plat">Plat:</label>
                                <input type="text" id="plat" name="plat" value="{{ old('plat') }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar:</label>
                                <input type="file" id="gambar" name="gambar" value="{{ old('gambar') }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="merk">Merk:</label>
                                <input type="text" id="merk" name="merk" value="{{ old('merk') }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tipe" class="form-label">Tipe Mobil</label>
                                <select class="form-control @error('tipe') is-invalid @enderror" id="tipe" name="tipe">
                                    <option value="manual" {{ old('tipe') == 'manual' ? 'selected' : '' }}>Manual</option>
                                    <option value="automatic" {{ old('tipe') == 'automatic' ? 'selected' : '' }}>Automatic</option>
                                </select>
                                @error('tipe')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kapasitas">Kapasitas:</label>
                                <input type="number" id="kapasitas" name="kapasitas" value="{{ is_array(old('kapasitas')) ? implode(old('kapasitas')) : old('kapasitas') }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tahunproduksi">Tahun Produksi:</label>
                                <select id="tahunproduksi" name="tahunproduksi" class="form-control" required>
                                    @for ($tahun = 2001; $tahun <= 2023; $tahun++)
                                        <option value="{{ $tahun }}" {{ old('tahunproduksi') == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="hargasewa">Harga Sewa:</label>
                                <input type="number" id="hargasewa" name="hargasewa" value="{{ old('hargasewa') }}" class="form-control" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
