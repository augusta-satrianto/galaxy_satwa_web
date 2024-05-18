@extends('layouts.main')

@section('container')
    <div class="content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <div class="col-lg-8">
                    <div style="font-size: 24px;font-weight:700;text-align:center;margin-bottom:50px;">Formulir Titip Sehat
                    </div>
                    <form action="/persuratan/buat/titipsehat" method="post" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <div style="font-size: 20px;font-weight:700;">Identitas Pasien</div><br>
                        <div class="fromGroup mb-3">
                            <label>No. RM</label>
                            <input type="text" placeholder="Masukkan No. RM"
                                class="form-control @error('norm') is-invalid               
                            @enderror"
                                id="norm" name="norm" required autofocus value="{{ old('norm') }}"
                                autocomplete="off">
                            @error('norm')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Nama Pasien</label>
                            <input type="text" placeholder="Masukkan nama pasien"
                                class="form-control @error('namapasien') is-invalid               
                            @enderror"
                                id="namapasien" name="namapasien" required autofocus value="{{ old('namapasien') }}"
                                autocomplete="off">
                            @error('namapasien')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Jenis Hewan</label>
                            <input type="text" placeholder="Masukkan jenis hewan"
                                class="form-control @error('jenishewan') is-invalid               
                            @enderror"
                                id="jenishewan" name="jenishewan" required autofocus value="{{ old('jenishewan') }}"
                                autocomplete="off">
                            @error('jenishewan')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup has-icon mb-3">
                            <label>Tanggal Lahir</label>
                            <div class="form-control-icon">
                                <input id="tanggallahirpasien" name="tanggallahirpasien"
                                    class="form-control date-picker-calender" type="text" placeholder="DD / MM / YY"
                                    autocomplete="off" required />
                                <div class="icon-badge-2">
                                    <img src="../../images/svg/calendar.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Jenis Kelamin</label>
                            <div class="select-box" style="background: white;border-radius:4px;">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    name="jeniskelaminpasien" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Jantan">Jantan</option>
                                    <option value="Betina">Betina</option>
                                </select>
                            </div>
                        </div>

                        <div class="fromGroup has-icon mb-3">
                            <label>Tanggal Masuk</label>
                            <div class="form-control-icon">
                                <input id="tanggalmasuk" name="tanggalmasuk" class="form-control date-picker-calender"
                                    type="text" placeholder="DD / MM / YY" autocomplete="off" required />
                                <div class="icon-badge-2">
                                    <img src="../../images/svg/calendar.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Jam</label>
                            <input type="text" placeholder="Masukkan jam"
                                class="form-control @error('jam') is-invalid               
                            @enderror"
                                id="jam" name="jam" required autofocus value="{{ old('jam') }}"
                                autocomplete="off">
                            @error('jam')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Diagnosa</label>
                            <input type="text" placeholder="Masukkan diagnosa"
                                class="form-control @error('diagnosa') is-invalid               
                            @enderror"
                                id="diagnosa" name="diagnosa" required autofocus value="{{ old('diagnosa') }}"
                                autocomplete="off">
                            @error('diagnosa')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Diagnosa Banding</label>
                            <input type="text" placeholder="Masukkan diagnosa banding"
                                class="form-control @error('diagnosabanding') is-invalid               
                            @enderror"
                                id="diagnosabanding" name="diagnosabanding" required autofocus
                                value="{{ old('diagnosabanding') }}" autocomplete="off">
                            @error('diagnosabanding')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br><br>

                        <div style="font-size: 20px;font-weight:700;">Identitas Owner/Keluarga Pasien</div><br>
                        <div class="fromGroup mb-3">
                            <label>Nama Lengkap Owner/Keluarga Pasien</label>
                            <input type="text" placeholder="Masukkan nama lengkap owner/keluarga pasien"
                                class="form-control @error('namaowner') is-invalid               
                            @enderror"
                                id="namaowner" name="namaowner" required autofocus value="{{ old('namaowner') }}"
                                autocomplete="off">
                            @error('namaowner')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Jenis Kelamin</label>
                            <div class="select-box" style="background: white;border-radius:4px;">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    name="jeniskelaminowner" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Jantan">Jantan</option>
                                    <option value="Betina">Betina</option>
                                </select>
                            </div>
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Alamat Lengkap</label>
                            <input type="text" placeholder="Masukkan alamat lengkap"
                                class="form-control @error('alamatlengkap') is-invalid               
                            @enderror"
                                id="alamatlengkap" name="alamatlengkap" required autofocus
                                value="{{ old('alamatlengkap') }}" autocomplete="off">
                            @error('alamatlengkap')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Telp/WA</label>
                            <input type="text" placeholder="Masukkan telepon/WA"
                                class="form-control @error('telepon') is-invalid               
                            @enderror"
                                id="telepon" name="telepon" required autofocus value="{{ old('telepon') }}"
                                autocomplete="off">
                            @error('telepon')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div><br><br>

                        <div style="font-size: 20px;font-weight:700;">Informasi Yang DIberikan</div><br>
                        <div class="fromGroup mb-3">
                            <label>Keterangan khusus terkait kebutuhan pasien</label>
                            <input type="text" placeholder="Masukkan keterangan khusus"
                                class="form-control @error('keterangankhusus') is-invalid               
                            @enderror"
                                id="keterangankhusus" name="keterangankhusus" required autofocus
                                value="{{ old('keterangankhusus') }}" autocomplete="off">
                            @error('keterangankhusus')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
