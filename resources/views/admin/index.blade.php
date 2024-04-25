@extends('admin.layout.main')
@section('content')
<div class="p-lg-3">
    <h3 class="mt-0 mb-2 font-weight-bold">List Asistant</h3>

    <hr/>

    @if ($asistants->count())
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Keterangan</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($asistants as $asistant)
            <tr>
                <th scope="row">1</th>
                <td>{{ $asistant->nama }}</td>
                <td>
                @if ($asistant->gender == "L")
                  Laki-Laki
                @elseif ($asistant->gender == "P")
                  Perempuan
                @endif
                <td>
                  @if ($asistant->keterangan == "PP")
                      Pulang-Pergi
                  @elseif ($asistant->keterangan == "M")
                      Menetap
                  @endif
                </td>
              </tr>
            @endforeach

        </tbody>
      </table>
    @else
        <h1>Asisten belum tersedia</h1>
    @endif

@endsection