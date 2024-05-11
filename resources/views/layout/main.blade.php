<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantu Rumah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4555ee8635.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="{{ asset('assets/images/logo-bg.png') }}">

    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet" />

</head>
<body>
    <header>
        @include('layout.header')
    </header>
    <body>
        @yield('content')
        @include('layout.body-footer')
    </body>
    <footer class="line-footer">
        @include('layout.footer')
    </footer>
</body>
</html>