<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CartoGo - Go Places with CartoGo</title>

    <!--
    - favicon
  -->
    <link rel="shortcut icon" href="./favicon.png" type="image/svg+xml">

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
        rel="stylesheet">
<link rel="stylesheet" href="stylescreen.css">
        
</head>
<body>
    <div class="wrapper">
        @include('partials.navbar')
        <div class="isi">
            @yield('isi')
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
