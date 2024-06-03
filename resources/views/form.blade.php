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
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 row d-flex justify-content-end">
                            <input class="form-control" type="text" placeholder="Umur minimal" name="min_umur">
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 row d-flex justify-content-start">
                            <input class="form-control" type="text" placeholder="Umur maksimal" name="max_umur">
                        </div>
                    </div>
                </div>
                <div class="mb-3 row d-flex justify-content-center">
                    <select class="form-select" aria-label="Default select example" name="gender">
                        <option value="" selected>Gender</option>
                        <option value="L">Laki Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3 row d-flex justify-content-center">
                    <select class="form-select" aria-label="Default select example" name="keterangan">
                        <option value="" selected>Pulang Pergi / Menetap</option>
                        <option value="PP">Pulang Pergi</option>
                        <option value="M">Menetap</option>
                    </select>
                </div>
                <div class="mb-3 row d-flex justify-content-center">
                    <textarea class="form-control" name="deskripsi" aria-label="With textarea" placeholder="Isi text deskripsi rumah tangga yang diinginkan"
                        rows="6"></textarea>
                </div>
                <div class="mb-3 d-flex justify-content-center px-5">
                    {{-- <button type="button" class="btn btn-primary">Primary</button> --}}
                    <button class="btn btn-lg btn-submit" type="submit">Rekomendasi</button>
                </div>
            </form>

        </div>
    </div>
@endsection
