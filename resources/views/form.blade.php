@extends('layout.main')
@section('content')
    <div class="jumbotron">
        <h2>Kriteria Asistent Rumah Tangga</h2>
        <nav aria-label="breadcrumb" class="nav-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <img src="assets/images/happy.png" alt="logo" height="120">
        <div class="container">
            <form action="/search" method="post">
                @csrf
                <div class="text-center mb-5">
                    <h3>Kriteria Asisten Rumah Tangga</h3>
                </div>
                <div class="mb-3 row d-flex justify-content-center">
                    <input class="form-control" type="text" placeholder="Umur">
                </div>
                <div class="mb-3 row d-flex justify-content-center">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Gender</option>
                        <option value="1">Laki Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3 row d-flex justify-content-center">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Pulang Pergi / Menetap</option>
                        <option value="1">Pulang Pergi</option>
                        <option value="2">Menetap</option>
                    </select>
                </div>
                <div class="mb-3 row d-flex justify-content-center">
                    <textarea class="form-control" name="search" aria-label="With textarea" placeholder="Isi text deskripsi rumah tangga yang diinginkan"
                        rows="6"></textarea>
                </div>
                <div class="mb-3 row d-flex justify-content-center">
                    <button class="btn btn-submit" type="submit" style="width: 15%">Rekomendasi</button>
                </div>
            </form>

        </div>
    </div>
@endsection
