@extends('layout.main')
@section('content')
    <div class="jumbotron">
        <h2>Rekomendasi Asistent Rumah Tangga</h2>
        <nav aria-label="breadcrumb" class="nav-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Asistent Rumah Tangga</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="container">
            <h2>{{ isset($results) ? 'Rekomendasi Asisten Rumah Tangga' : 'Daftar Asisten Rumah Tangga' }}</h2>
            <div class="list-recom">
                @if (isset($results))
                    @foreach ( $results as $result)
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <img src="{{ asset('images/photo-assist') }}/{{ $result['asistant']->foto !== null ? $result['asistant']->foto : 'thumb.jpg' }}" alt="foto {{ $result['asistant']->nama }}">
                        </div>
                        <div class="description col-md-7 d-flex align-content-center">
                            <div class="row">
                                <h3>{{ $result['asistant']->nama }}</h3>
                                <p class="line-clamp-5">{{ $result['asistant']->deskripsi }}</p>
                            </div>
                            <div class="row d-flex justify-content-between">
                                <div class="col-md-3 ">
                                    <button class="btn btn-submit">Booking</button>
                                </div>
                                <div class="col-md-3">
                                    <a type="button" href="/profile/{{ $result['asistant']->id }}" class="btn btn-submit">Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    
                @foreach ( $asistants as $asistant)
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <img src="{{ asset('images/photo-assist') }}/{{ $asistant->foto !== null ? $asistant->foto : 'thumb.jpg' }}" alt="foto {{ $asistant->nama }}">
                        </div>
                        <div class="description col-md-7 d-flex align-content-center">
                            <div class="row">
                                <h3>{{ $asistant->nama }}</h3>
                                <p class="line-clamp-5">{{ $asistant->deskripsi }}</p>
                            </div>
                            <div class="row d-flex justify-content-between">
                                <div class="col-md-3 ">
                                    <button class="btn btn-submit">Booking</button>
                                </div>
                                <div class="col-md-3">
                                    <a type="button" href="/profile/{{ $asistant->id }}" class="btn btn-submit">Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center mt-5">
                    {{ $asistants->links() }}
                </div>
                @endif


                {{-- <div class="row mb-3">
                    <div class="col-md-5">
                        <img src="assets/images/img2.jpg" alt="gambar">
                    </div>
                    <div class="description col-md-7 d-flex align-content-center ">
                        <div class="row">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore, aspernatur? Et, rerum
                                dicta? Voluptas, incidunt? Minima saepe est iste quidem aperiam suscipit harum accusamus
                                quod aut, magni consequuntur quisquam fugiat consequatur eos, rerum facilis tempore delectus
                                totam. Quas aspernatur dicta eos aliquid placeat ipsa autem.</p>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-3">
                                <button class="btn btn-submit">Booking</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-submit">Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-5">
                        <img src="assets/images/img3.jpg" alt="gambar">
                    </div>
                    <div class="description col-md-7 d-flex align-content-center ">
                        <div class="row">

                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum sequi impedit praesentium
                                dolore voluptate pariatur ipsam quas, facilis repudiandae, laboriosam molestiae consequuntur
                                vero tenetur fuga?</p>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class=" col-md-3 ">
                                <button class="btn btn-submit">Booking</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-submit">Profile</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
    </div>
@endsection
