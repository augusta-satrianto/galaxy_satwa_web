@extends('layouts.main')

@section('container')
    <div class="content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <div class="col-lg-8">
                    <form action="/persuratan/kirim" method="post" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <div class="fromGroup mb-3">
                            <label>Pemilik Hewan</label>
                            <div class="select-box" style="background: white;border-radius:4px;">
                                <select class="form-select form-select-sm" style="height: 40px;"
                                    aria-label=".form-select-sm example" name="patient_id" required>
                                    <option value="" disabled selected>Pilih Pemilik Hewan</option>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}">
                                            {{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Kategori Surat</label>
                            <div class="select-box" style="background: white;border-radius:4px;">
                                <select class="form-select form-select-sm" style="height: 40px;"
                                    aria-label=".form-select-sm example" name="category" required>
                                    <option value="" disabled selected>Pilih Kategori Surat</option>
                                    <option value="Berita Kematian">Berita Kematian</option>
                                    <option value="Kelahiran">Kelahiran</option>
                                    <option value="Persetujuan Tindakan">Persetujuan Tindakan</option>
                                    <option value="Rawat Inap">Rawat Inap</option>
                                    <option value="Rawat Jalan">Rawat Jalan</option>
                                    <option value="SKKH">SKKH</option>
                                    <option value="Tindakan Operasi">Tindakan Operasi</option>
                                    <option value="Titip Sehat">Titip Sehat</option>
                                    <option value="Vaksinasi">Vaksinasi</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">Unggah File</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control @error('file') is-invalid @enderror" type="file" id="file"
                                name="file" accept="application/pdf" required>
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button id="submitButton" type="submit" class="btn btn-primary">Simpan Data</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
