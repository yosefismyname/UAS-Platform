@extends('layout.transscreen')

@section('title', 'Halaman Daftar Customer')

@section('fil')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Detail Data Diri</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id">ID:</label>
                        <label id="customer_id" class="form-control">{{ $customer->id }}</label>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <label id="customer_nama" class="form-control">{{ $customer->nama }}</label>
                    </div>

                    <div class="form-group">
                        <label for="noHp">No. HP:</label>
                        <label id="customer_noHp" class="form-control">{{ $customer->noHp }}</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <label id="customer_email" class="form-control">{{ $customer->email }}</label>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <label id="customer_alamat" class="form-control">{{ $customer->alamat }}</label>
                    </div>
                    <div class="form-group mt-3">
                        <div class="d-flex">
                            <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-primary mr-2">
                                <button id="editCustomer" class="btn btn-primary">Edit</button>
                            </a>
                            <a href="{{ route('transaksi.create', ['id_customer' => $customer->id]) }}" class="btn btn-primary">
                                <button id="lanjutTransaksi" class="btn btn-primary">Lanjut</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
