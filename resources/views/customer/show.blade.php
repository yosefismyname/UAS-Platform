@extends('layout.main')


@section('title', 'Halaman Daftar Customer')

@section('content')
    <div class="container">
        <h1>Daftar Customer</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->nama }}</td>
                        <td>{{ $c->noHp }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->alamat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
