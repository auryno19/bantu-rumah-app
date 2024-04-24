@extends('layout.main')
@section('content')
    <div class="jumbotron">
        <h2>Daftar Asistent Rumah Tangga</h2>
        <nav aria-label="breadcrumb" class="nav-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        {{-- <img src="assets/images/happy.png" alt="logo" height="120"> --}}
        <div class="container">
            <div class="text-center mb-5">
                <h3>REGISTER</h3>
            </div>
            <form action="/register" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3 row d-flex justify-content-center">
                            <input class="form-control" type="text" placeholder="Nama" name="nama">
                        </div>
                        <div class="mb-3 row d-flex justify-content-center">
                            <input class="form-control" type="text" placeholder="Umur" name="umur">
                        </div>
                        <div class="mb-3 row d-flex justify-content-center">
                            <select class="form-select" aria-label="Default select example" name="gender">
                                <option selected>Gender</option>
                                <option value="1">Laki Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3 row d-flex justify-content-center">
                            <textarea class="form-control" aria-label="With textarea" placeholder="Alamat Rumah" rows="6" name="alamat"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 row d-flex justify-content-center">
                            <select class="form-select" aria-label="Default select example" name="keterangan">
                                <option selected>Pulang Pergi / Menetap</option>
                                <option value="1">Pulang Pergi</option>
                                <option value="2">Menetap</option>
                            </select>
                        </div>
                        <div class="mb-3 row d-flex justify-content-center">
                            <textarea class="form-control" aria-label="With textarea" placeholder="Deskirpsi diri" rows="6" name="deskripsi"></textarea>
                        </div>
                        <div class="mb-3 row d-flex justify-content-center">
                            <label for="foto" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="foto" name="foto">
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-3 row d-flex justify-content-center">
                    <button class="btn btn-submit" type="submit" style="width: 15%">Daftar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
