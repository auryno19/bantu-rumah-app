@extends('layout.main')
@section('content')
    <div class="jumbotron">
        <h2>Profile Asistent Rumah Tangga</h2>
        <nav aria-label="breadcrumb" class="nav-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil Rumah Tangga</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="container-profile">
            <div class="wrap">
                <div class="row mb-3">
                    <div class="col-md-5">
                        <img src="{{ asset('images/photo-assist') }}/{{ $asistant->foto !== null ? $asistant->foto : 'thumb.jpg' }}" alt="gambar">
                    </div>
                    <div class="col-md-7 ">
                        <div class="row">
                            <div class="row d-flex justify-content-between">
                                <div class="col-md-9 ">
                                    <h2 class="mb-0">{{ $asistant->nama }}</h2>
                                    <p style="font-weight: lighter" class="mb-4">{{ $asistant->umur }} tahun</p>
                                </div>
                                <div class="col-md-3 text-end">
                                    <button class="btn btn-submit" style="border-radius: 5%">Book Now</button>
                                </div>
                            </div>
                            
                            @if ($asistant->gender == 'P' )
                            <h5><i class="fa-solid fa-venus mb-3 me-1"></i> Perempuan</h5>
                            @elseif($asistant->gender == 'L' )
                            <h5><i class="fa-solid fa-mars mb-3 me-1"></i> Laki-Laki</h5>
                            @endif

                            @if ($asistant->keterangan == 'PP' )
                            <h5><i class="fa-solid fa-suitcase-rolling mb-3 me-1"></i></i> Pulang Pergi</h5>
                            @elseif($asistant->keterangan == 'M' )
                            <h5><i class="fa-solid fa-house mb-3 me-1"></i> Menetap</h5>
                            @endif
                               
                            <h5><i class="fa-solid fa-location-dot mb-3 me-1"></i> {{ $asistant->alamat }}</h5>

                            <h5>Deskripsi</h5>
                            <p style="text-align: justify;">{{ $asistant->deskripsi }}</p>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
