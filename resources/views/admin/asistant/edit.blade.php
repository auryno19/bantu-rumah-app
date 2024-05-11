@extends('admin.layout.main')
@section('content')
<div class="p-lg-3">
    <h3 class="mt-0 mb-2 font-weight-bold">Profile Asistant</h3>

    <hr/>
    <div class="wrap">
        <div class="row mb-3">
            <div class="col-md-5">
                <img src="{{ asset('assets/images/img1.jpg') }}" alt="gambar">
            </div>
            <div class="col-md-7 ">
                <div class="row">

                    <h2 class="mb-0">{{ $asistant->nama }}</h2>
                    <p style="font-weight: lighter" class="mb-4">{{ $asistant->umur }} tahun</p>
                    
                    <h5><i class="fa-solid fa-phone mb-3 me-1"></i> {{ $asistant->telepon }}</h5>

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


@endsection