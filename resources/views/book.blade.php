@extends('layout.transscreen')

@section('title', 'Halaman Daftar Customer')

@section('fil')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Form Transaksi</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tanggalSewa">Tanggal Sewa:</label>
                    <input type="date" name="tanggalSewa" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="mulaiSewa">Mulai Sewa:</label>
                    <input type="time" name="mulaiSewa" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="lamaSewa">Lama Sewa:</label>
                    <input type="number" name="lamaSewa" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="idMobil">ID Mobil:</label>
                    <select name="idMobil" class="form-control" required>
                        @foreach ($mobils as $mobil)
                            <option value="{{ $mobil->id }}">{{ $mobil->merk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" hidden>
                    <label for="idCustomer">ID Customer:</label>
                    <select name="idCustomer" class="form-control">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->id }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
