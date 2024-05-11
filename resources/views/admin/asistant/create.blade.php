@extends('admin.layout.main')
@section('content')
    <div class="p-lg-3">
        <h3 class="mt-0 mb-2 font-weight-bold">Tambah Asistant</h3>

        <hr />

        <div class="container-admin">
            <form action="/admin/asistant" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3 row d-flex justify-content-center">
                            <input class="form-control" type="text" placeholder="Nama" name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 row d-flex justify-content-center">
                            <input class="form-control" type="text" placeholder="Umur" name="umur" value="{{ old('umur') }}">
                            @error('umur')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 row d-flex justify-content-center">
                            <select class="form-select" aria-label="Default select example" name="gender">
                                <option selected value="">Gender</option>
                                <option value="L" {{ old('gender') == "L" ? 'selected' : '' }}>Laki Laki</option>
                                <option value="P" {{ old('gender') == "P" ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 row d-flex justify-content-center">
                            <textarea class="form-control" aria-label="With textarea" placeholder="Alamat Rumah" rows="6" name="alamat">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 row d-flex justify-content-center">
                            <input class="form-control" type="text" placeholder="Telepon" name="telepon" value="{{ old('telepon') }}">
                            @error('telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 row d-flex justify-content-center">
                            <select class="form-select" aria-label="Default select example" name="keterangan">
                                <option selected value="">Pulang Pergi / Menetap</option>
                                <option value="PP" {{ old('keterangan') == "PP" ? 'selected' : '' }}>Pulang Pergi</option>
                                <option value="M" {{ old('keterangan') == "M" ? 'selected' : '' }}>Menetap</option>
                            </select>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 row d-flex justify-content-center">
                            <textarea class="form-control" aria-label="With textarea" placeholder="Deskirpsi diri" rows="6" name="deskripsi">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="image-preview mb-3 row d-flex justify-content-center">
                            <label for="foto" class="form-label">Foto</label>
                            <input class="form-control" type="file" name="foto" id="imageImg" onchange="imgpreview()">
                            <img class="img-preview img-fluid mb-3 col-sm-5 ">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-3 row d-flex justify-content-center">
                    <button class="btn btn-admin" type="submit" style="width: 15%">Daftar</button>
                </div>
            </form>

        </div>
        <script>
        function imgpreview() {
            const image = document.querySelector('#imageImg');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const reader = new FileReader();
            reader.readAsDataURL(image.files[0]);

            reader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        </script>
    @endsection
