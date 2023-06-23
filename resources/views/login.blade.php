<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 400px;
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Login Page</h2>
        <form method="POST" action="{{ route('login.login') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            @if($errors->has('message'))
            <p style="color: red;">{{ $errors->first('message') }}</p>
            @endif
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>

</html>
