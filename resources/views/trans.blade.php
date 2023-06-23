@extends('layout.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Daftar Transaksi</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Tanggal Sewa</th>
                                <th>Mulai Sewa</th>
                                <th>Lama Sewa</th>
                                <th>Mobil</th>
                                <th>Customer</th>
                                <th>Sopir</th>
                                <th>Waktu Pembuatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksis as $transaksi)
                            <tr>
                                <td>{{ $transaksi->id }}</td>
                                <td>{{ $transaksi->created_at }}</td>
                                <td>{{ $transaksi->tanggalSewa }}</td>
                                <td>{{ $transaksi->mulaiSewa }}</td>
                                <td>{{ $transaksi->lamaSewa }}</td>
                                <td>{{ $transaksi->mobil->nama }}</td>
                                <td>{{ $transaksi->customer->nama }}</td>
                                <td>{{ $transaksi->sopir->nama }}</td>
                                <td>{{ $transaksi->created_at }}</td>
                                <td>
                                    @if ($transaksi->selesai)
                                        <span>Transaksi Selesai</span>
                                    @else
                                        <a href="{{ route('transaksi.showConfirmation', $transaksi->id) }}">Konfirmasi</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
