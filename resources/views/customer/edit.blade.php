@extends('layout.transscreen')

@section('title', 'Edit Customer')

@section('fil')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Edit Data Diri</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('customer.update', ['id' => $customer->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" name="nama" class="form-control" value="{{ $customer->nama }}" required>
                    </div>

                    <div class="form-group">
                        <label for="noHp">No. HP:</label>
                        <input type="text" name="noHp" class="form-control" value="{{ $customer->noHp }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" value="{{ $customer->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea name="alamat" class="form-control" rows="3" required>{{ $customer->alamat }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
