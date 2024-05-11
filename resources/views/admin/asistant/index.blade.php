@extends('admin.layout.main')
@section('content')
    <div class="p-lg-3">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h3 class="mt-0 mb-2 font-weight-bold">List Asistant</h3>

        <hr />

        @if ($asistants->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($asistants as $asistant)
                        <tr>
                            <th style="vertical-align: middle;" scope="row">{{ $iteration++ }}</th>
                            <td style="vertical-align: middle;">{{ $asistant->nama }}</td>
                            <td style="vertical-align: middle;">
                                @if ($asistant->gender == 'L')
                                    Laki-Laki
                                @elseif ($asistant->gender == 'P')
                                    Perempuan
                                @endif
                            <td style="vertical-align: middle;">
                                @if ($asistant->keterangan == 'PP')
                                    Pulang-Pergi
                                @elseif ($asistant->keterangan == 'M')
                                    Menetap
                                @endif
                            </td>
                            <td style="vertical-align: middle;">
                                <a href="/admin/asistant/{{ $asistant->id }}" type="button" class="btn btn-sm btn-primary"
                                    href=""><i class="fa-solid fa-eye"></i></a>
                                    
                                <form action="/admin/asistant/{{ $asistant->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm border-0" 
                                    onclick="return confirm('Apakah anda yakin?')"><i
                                    class="fa-solid fa-delete-left"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div>
                {{ $asistants->links() }}
            </div>
        @else
            <h1>Asisten belum tersedia</h1>
        @endif

    @endsection
