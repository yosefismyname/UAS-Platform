@extends('layout.main')

@section('title', 'Halaman Daftar Mobil')

@section('content')
    <div class="container">
        <h2>Daftar Mobil</h2>
        <a href="{{ route('mobil.create') }}" class="btn btn-primary mb-3">Tambah Mobil</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Id</th>
                        <th>Plat</th>
                        <th>Merk</th>
                        <th>Kapasitas</th>
                        <th>Tipe Mobil</th>
                        <th>Tahun Produksi</th>
                        <th>Harga Sewa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mobil as $m)
                        <tr>
                            <td><img src="{{ Storage::url($m->gambar) }}" alt="Gambar Mobil" loading="lazy" width="50" height="50"></td>
                            <td>{{ $m->id }}</td>
                            <td>{{ $m->plat }}</td>
                            <td>{{ $m->merk }}</td>
                            <td>{{ $m->kapasitas }}</td>
                            <td>{{ $m->tipe}}</td>
                            <td>{{ $m->tahunproduksi }}</td>
                            <td>{{ $m->hargasewa }}</td>
                            <td>
                                <a href="{{ route('mobil.edit', $m->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('mobil.destroy', $m->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
