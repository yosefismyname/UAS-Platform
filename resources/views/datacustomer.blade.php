<!DOCTYPE html>
<html>
<head>
    <title>Create Customer</title>
</head>
<body>
    <form action="{{ route('customer.store') }}" method="POST">
        @csrf
        <label for="loginuser_id">Login User ID:</label>
        <input type="text" name="loginuser_id" required><br>

        <label for="noKtp">No. KTP:</label>
        <input type="text" name="noKtp" required><br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>

        <label for="noHp">No. HP:</label>
        <input type="text" name="noHp" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" required><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
