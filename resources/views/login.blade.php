<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/4555ee8635.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Website Properti</title>
</head>
<style>
    body {
        background-color: #269dff;
    }
</style>

<body class="p-2 px-4">
    <div class="d-flex align-items-center justify-content-center col-sm-auto" style="height:100vh;">
        <div class="card card-login pb-2 pt-2 ">
            @if (session()->has('message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="/login" method="post">
                @csrf
                <div class="card-body" >
                    <div class="text-center">

                        <img src="{{ asset('assets/images/logo-light.png') }}"  class="loginImage" alt="logo">
                    </div>

                    <h4 class="mb-3"><b>LOGIN</b></h4>
                    <div class="row align-items-center mb-3">
                        <label for="email" style="font-weight: 100;">Email</label><br>
                        <input type="text" id="inputEmail"
                            class="form-control @error('email') is-invalid                        
                        @enderror"
                            name="email" placeholder="Masukkan Email...">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row align-items-center">
                        <label for="password" style="font-weight: 100;">Password</label><br>
                        <input type="password" id="inputPassword"
                            class="form-control @error('password') is-invalid                        
                        @enderror"
                            name="password" placeholder="Masukkan Password...">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="d-grid gap-2" style="text-align: right;">
                            <a href="/forgot" class="lupapw line-clamp-1">Lupa password ?</a>
                            <button type="submit" class="btn button-login">Masuk</button>
                            <a href="/" class="text-center lupapw">Kembali</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</body>

</html>
