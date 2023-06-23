@extends('layout.main')

@section('title', 'Halaman Daftar Sopir')

@section('content')
    <div class="container">
        <h1>Daftar Sopir</h1>
        <a href="{{ route('sopir.create') }}" class="btn btn-primary mb-3">Tambah Sopir</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Foto Supir</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nomor HP</th>
                    <th>Harga Jasa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sopir as $s)
                    <tr>
                        <td><img src="{{ Storage::url($s->gambar) }}" alt="gambar" loading="lazy" width="50" height="50"></td>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->nama }}</td>
                        <td>{{ $s->nomorHP }}</td>
                        <td>{{ $s->hargaJasa }}</td>
                        <td>
                            <a href="{{ route('sopir.edit', $s->id) }}" class="btn btn-primary btn-sm">Edit</a> <!-- Tombol Edit -->
                            <form action="{{ route('sopir.destroy', $s->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus sopir ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
