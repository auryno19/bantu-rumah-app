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
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($asistants as $asistant)
            <tr>
                <th style="vertical-align: middle;" scope="row">{{ $iteration++ }}</th>
                <td style="vertical-align: middle;">{{ $asistant->nama }}</td>
                <td style="vertical-align: middle;">
                @if ($asistant->gender == "L")
                  Laki-Laki
                @elseif ($asistant->gender == "P")
                  Perempuan
                @endif
                <td style="vertical-align: middle;">
                  @if ($asistant->keterangan == "PP")
                      Pulang-Pergi
                  @elseif ($asistant->keterangan == "M")
                      Menetap
                  @endif
                </td>
                <td style="vertical-align: middle;">
                  <a type="button" class="btn btn-sm btn-primary" href=""><i class="fa-solid fa-eye"></i></a>
                  <a type="button" class="btn btn-sm btn-warning" href=""><i class="fa-solid fa-pen-to-square"></i></a>
                  <a type="button" class="btn btn-sm btn-danger" href=""><i class="fa-solid fa-delete-left"></i></a>
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