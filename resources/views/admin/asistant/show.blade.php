@extends('admin.layout.main')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($errors->any())
        {!! implode(
            '',
            $errors->all('    
                <div class="alert alert-danger alert-dismissible fade show" role="alert">:message
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                '),
        ) !!}
    @endif
    <div class="p-lg-3">
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="/admin/asistant/{{ $asistant->id }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="modal-header" id="modal-header">

                        </div>
                        <div class="modal-body" id="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </div>
            </div>
        </div>
        <h3 class="mt-0 mb-2 font-weight-bold">Profile Asistant</h3>

        <hr />
        <div class="wrap">
            <div class="row mb-3">
                <div class="col-md-5">
                    <img src="{{ asset('assets/images/img1.jpg') }}" alt="gambar">
                </div>
                <div class="col-md-7 ">
                    <div class="row">
                        <h2 class="mb-0">{{ $asistant->nama }}
                            <a onclick="myFunction(this.id)" type="button" data-bs-toggle="modal"
                                data-bs-target="#editModal" id="nama">
                                <sup><small>
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </small></sup>
                            </a>
                        </h2>
                        <p style="font-weight: lighter" class="mb-4">{{ $asistant->umur }} tahun
                            <a onclick="myFunction(this.id)" type="button" data-bs-toggle="modal"
                                data-bs-target="#editModal" id="umur">
                                <sup><small>
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </small></sup>
                            </a>
                        </p>

                        <h5><i class="fa-solid fa-phone mb-3 me-1"></i> {{ $asistant->telepon }}
                            <a onclick="myFunction(this.id)" type="button" data-bs-toggle="modal"
                                data-bs-target="#editModal" id="telepon">
                                <sup><small>
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </small></sup>
                            </a>
                        </h5>

                        @if ($asistant->gender == 'P')
                            <h5><i class="fa-solid fa-venus mb-3 me-1"></i> Perempuan
                                <a onclick="myFunction(this.id)" type="button" data-bs-toggle="modal"
                                    data-bs-target="#editModal" id="gender">
                                    <sup><small>
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </small></sup>
                                </a>
                            </h5>
                        @elseif($asistant->gender == 'L')
                            <h5><i class="fa-solid fa-mars mb-3 me-1"></i> Laki-Laki
                                <a onclick="myFunction(this.id)" type="button" data-bs-toggle="modal"
                                    data-bs-target="#editModal" id="gender">
                                    <sup><small>
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </small></sup>
                                </a>
                            </h5>
                        @endif

                        @if ($asistant->keterangan == 'PP')
                            <h5><i class="fa-solid fa-suitcase-rolling mb-3 me-1"></i></i> Pulang Pergi
                                <a onclick="myFunction(this.id)" type="button" data-bs-toggle="modal"
                                    data-bs-target="#editModal" id="keterangan">
                                    <sup><small>
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </small></sup>
                                </a>
                            </h5>
                        @elseif($asistant->keterangan == 'M')
                            <h5><i class="fa-solid fa-house mb-3 me-1"></i> Menetap
                                <a onclick="myFunction(this.id)" type="button" data-bs-toggle="modal"
                                    data-bs-target="#editModal" id="keterangan">
                                    <sup><small>
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </small></sup>
                                </a>
                            </h5>
                        @endif

                        <h5><i class="fa-solid fa-location-dot mb-3 me-1"></i> {{ $asistant->alamat }}
                            <a onclick="myFunction(this.id)" type="button" data-bs-toggle="modal"
                                data-bs-target="#editModal" id="alamat">
                                <sup><small>
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </small></sup>
                            </a>
                        </h5>

                        <h5>Deskripsi</h5>
                        <p style="text-align: justify;">{{ $asistant->deskripsi }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction(id) {
            if (id == "nama") {
                document.getElementById("modal-header").innerHTML = `
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Nama </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                `;
                document.getElementById("modal-body").innerHTML = `
                <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" 
                    value="{{ $asistant->nama }}" required/>
                </div>
                `;
            } else if (id == "umur") {
                document.getElementById("modal-header").innerHTML = `
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Umur </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                `;
                document.getElementById("modal-body").innerHTML = `
                <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="text" class="form-control" id="umur" name="umur" 
                    value="{{ $asistant->umur }}" required/>
                </div>
                `;
            } else if (id == "gender") {
                document.getElementById("modal-header").innerHTML = `
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Gender </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                `;
                document.getElementById("modal-body").innerHTML = `
                <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender">
                            <option value=""> Pilih Nama gender</option>
                            <option value="L" {{ $asistant->gender == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="P" {{ $asistant->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                `;
            } else if (id == "telepon") {
                document.getElementById("modal-header").innerHTML = `
                <h1 class="modal-title fs-5" id="editModalLabel">Edit No Telepon</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                `;
                document.getElementById("modal-body").innerHTML = `
                <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" 
                    value="{{ $asistant->telepon }}" required/>
                </div>
                `;
            } else if (id == "keterangan") {
                document.getElementById("modal-header").innerHTML = `
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Keterangan </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                `;
                document.getElementById("modal-body").innerHTML = `
                <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                    <select class="form-select" id="keterangan" name="keterangan">
                            <option value=""> Pilih Nama keterangan</option>
                            <option value="PP" {{ $asistant->keterangan == 'PP' ? 'selected' : '' }}>Pulang-Pergi</option>
                            <option value="M" {{ $asistant->keterangan == 'M' ? 'selected' : '' }}>Menetap</option>
                    </select>
                </div>
                `;
            } else if (id == "alamat") {
                document.getElementById("modal-header").innerHTML = `
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Alamat </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                `;
                document.getElementById("modal-body").innerHTML = `
                <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" 
                    value="{{ $asistant->alamat }}" required/>
                </div>
                `;
            }
        }
    </script>
@endsection
