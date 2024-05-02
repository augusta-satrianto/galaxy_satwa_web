@extends('layouts.main')

@section('container')
    <div class="content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <div class="col-lg-8">
                    <form action="/persuratan/buat/persetujuantindakan" method="post" class="mb-5"
                        enctype="multipart/form-data">
                        @csrf
                        <div>Identitas Pasien</div><br>
                        <div class="fromGroup mb-3">
                            <label>No. RM</label>
                            <input type="text" placeholder="Masukkan kode obat"
                                class="form-control @error('norm') is-invalid               
                            @enderror"
                                id="norm" name="norm" required autofocus value="{{ old('norm') }}">
                            @error('norm')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Nama Pasien</label>
                            <input type="text" placeholder="Masukkan kode obat"
                                class="form-control @error('namapasien') is-invalid               
                            @enderror"
                                id="namapasien" name="namapasien" required autofocus value="{{ old('namapasien') }}">
                            @error('namapasien')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Jenis Hewan</label>
                            <input type="text" placeholder="Masukkan kode obat"
                                class="form-control @error('jenishewan') is-invalid               
                            @enderror"
                                id="jenishewan" name="jenishewan" required autofocus value="{{ old('jenishewan') }}">
                            @error('jenishewan')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup has-icon mb-3">
                            <label>Tanggal Lahir</label>
                            <div class="form-control-icon">
                                <input id="tanggallahirpasien" name="tanggallahirpasien"
                                    class="form-control date-picker-calender" type="text" placeholder="DD / MM / YY" />
                                <div class="icon-badge-2">
                                    <img src="../../images/svg/calendar.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Jenis Kelamin</label>
                            <div class="select-box" style="background: white;border-radius:4px;">
                                <select class="custom-select" title="Pilih Role" name="jeniskelaminpasien">
                                    <option value="Jantan">Jantan</option>
                                    <option value="Betina">Betina</option>
                                </select>
                            </div>
                        </div>
                        <div class="fromGroup has-icon mb-3">
                            <label>Tanggal Masuk</label>
                            <div class="form-control-icon">
                                <input id="tanggalmasuk" name="tanggalmasuk" class="form-control date-picker-calender"
                                    type="text" placeholder="DD / MM / YY" />
                                <div class="icon-badge-2">
                                    <img src="../images/svg/calendar.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Jam</label>
                            <input type="text" placeholder="Masukkan kode obat"
                                class="form-control @error('jam') is-invalid               
                            @enderror"
                                id="jam" name="jam" required autofocus value="{{ old('jam') }}">
                            @error('jam')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Diagnosa</label>
                            <input type="text" placeholder="Masukkan kode obat"
                                class="form-control @error('diagnosa') is-invalid               
                            @enderror"
                                id="diagnosa" name="diagnosa" required autofocus value="{{ old('diagnosa') }}">
                            @error('diagnosa')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Diagnosa Banding</label>
                            <input type="text" placeholder="Masukkan kode obat"
                                class="form-control @error('diagnosabanding') is-invalid               
                            @enderror"
                                id="diagnosabanding" name="diagnosabanding" required autofocus
                                value="{{ old('diagnosabanding') }}">
                            @error('diagnosabanding')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br><br>

                        <div>Identitas Owner/Keluarga Pasien</div><br>
                        <div class="fromGroup mb-3">
                            <label>Nama Lengkap Owner/Keluarga Pasien</label>
                            <input type="text" placeholder="Masukkan kode obat"
                                class="form-control @error('namaowner') is-invalid               
                            @enderror"
                                id="namaowner" name="namaowner" required autofocus value="{{ old('namaowner') }}">
                            @error('namaowner')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Jenis Kelamin</label>
                            <div class="select-box" style="background: white;border-radius:4px;">
                                <select class="custom-select" title="Pilih Role" name="jeniskelaminowner">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Alamat Lengkap</label>
                            <input type="text" placeholder="Masukkan kode obat"
                                class="form-control @error('alamatlengkap') is-invalid               
                            @enderror"
                                id="alamatlengkap" name="alamatlengkap" required autofocus
                                value="{{ old('alamatlengkap') }}">
                            @error('alamatlengkap')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Telp/WA</label>
                            <input type="text" placeholder="Masukkan kode obat"
                                class="form-control @error('telepon') is-invalid               
                            @enderror"
                                id="telepon" name="telepon" required autofocus value="{{ old('telepon') }}">
                            @error('telepon')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
