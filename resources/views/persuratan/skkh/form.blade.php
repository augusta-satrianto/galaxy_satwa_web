@extends('layouts.main')

@section('container')
    <div class="content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <div class="col-lg-8">
                    <div style="font-size: 24px;font-weight:700;text-align:center;margin-bottom:50px;">Formulir Surat
                        Keterangan Sehat Hewan (SKKH)
                    </div>
                    <form action="/persuratan/buat/skkh" method="post" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <div style="font-size: 20px;font-weight:700;">Identitas Anak</div><br>
                        <div class="fromGroup mb-3">
                            <label>Nama</label>
                            <input type="text" placeholder="Masukkan nama"
                                class="form-control @error('namahewan') is-invalid               
                            @enderror"
                                id="namahewan" name="namahewan" required autofocus value="{{ old('namahewan') }}"
                                autocomplete="off">
                            @error('namahewan')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Jenis Ras</label>
                            <input type="text" placeholder="Masukkan jenis ras"
                                class="form-control @error('jenisras') is-invalid               
                            @enderror"
                                id="jenisras" name="jenisras" required autofocus value="{{ old('jenisras') }}"
                                autocomplete="off">
                            @error('jenisras')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Warna</label>
                            <input type="text" placeholder="Masukkan warna"
                                class="form-control @error('warna') is-invalid               
                            @enderror"
                                id="warna" name="warna" required autofocus value="{{ old('warna') }}"
                                autocomplete="off">
                            @error('warna')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Jenis Kelamin</label>
                            <div class="select-box" style="background: white;border-radius:4px;">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    name="jeniskelaminhewan" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Jantan">Jantan</option>
                                    <option value="Betina">Betina</option>
                                </select>
                            </div>
                        </div>
                        <div class="fromGroup has-icon mb-3">
                            <label>Tanggal Lahir</label>
                            <div class="form-control-icon">
                                <input id="tanggallahirhewan" name="tanggallahirhewan"
                                    class="form-control date-picker-calender" type="text" placeholder="DD / MM / YY"
                                    autocomplete="off" required />
                                <div class="icon-badge-2">
                                    <img src="../../images/svg/calendar.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Nomor Indentitas</label>
                            <input type="text" placeholder="Masukkan nomor identitas"
                                class="form-control @error('noid') is-invalid               
                            @enderror"
                                id="noid" name="noid" required autofocus value="{{ old('noid') }}"
                                autocomplete="off">
                            @error('noid')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br><br>

                        <div style="font-size: 20px;font-weight:700;">Identitas Pemilik</div><br>
                        <div class="fromGroup mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" placeholder="Masukkan nama"
                                class="form-control @error('namaowner') is-invalid               
                            @enderror"
                                id="namaowner" name="namaowner" required autofocus value="{{ old('namaowner') }}"
                                autocomplete="off">
                            @error('namaowner')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
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

                        <div style="font-size: 20px;font-weight:700;">Pemeriksaan Umum</div><br>
                        <div class="fromGroup mb-3">
                            <label>Berat Badan</label>
                            <input type="text" placeholder="Masukkan berat badan"
                                class="form-control @error('beratbadan') is-invalid               
                            @enderror"
                                id="beratbadan" name="beratbadan" required autofocus value="{{ old('beratbadan') }}"
                                autocomplete="off">
                            @error('beratbadan')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Suhu</label>
                            <input type="text" placeholder="Masukkan pemeriksaan suhu"
                                class="form-control @error('suhu') is-invalid               
                            @enderror"
                                id="suhu" name="suhu" required autofocus value="{{ old('suhu') }}"
                                autocomplete="off">
                            @error('suhu')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Mata</label>
                            <input type="text" placeholder="Masukkan pemeriksaan mata"
                                class="form-control @error('mata') is-invalid               
                            @enderror"
                                id="mata" name="mata" required autofocus value="{{ old('mata') }}"
                                autocomplete="off">
                            @error('mata')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Telinga</label>
                            <input type="text" placeholder="Masukkan pemeriksaan telinga"
                                class="form-control @error('telinga') is-invalid               
                            @enderror"
                                id="telinga" name="telinga" required autofocus value="{{ old('telinga') }}"
                                autocomplete="off">
                            @error('telinga')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Mulut dan Gigi</label>
                            <input type="text" placeholder="Masukkan pemeriksaan mulut dan gigi"
                                class="form-control @error('mulut') is-invalid               
                            @enderror"
                                id="mulut" name="mulut" required autofocus value="{{ old('mulut') }}"
                                autocomplete="off">
                            @error('mulut')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Kulit dan Bulu</label>
                            <input type="text" placeholder="Masukkan pemeriksaan kulit dan bulu"
                                class="form-control @error('kulit') is-invalid               
                            @enderror"
                                id="kulit" name="kulit" required autofocus value="{{ old('kulit') }}"
                                autocomplete="off">
                            @error('kulit')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Sistem Pernafasan</label>
                            <input type="text" placeholder="Masukkan pemeriksaan sistem pernafasan"
                                class="form-control @error('pernafasan') is-invalid               
                            @enderror"
                                id="pernafasan" name="pernafasan" required autofocus value="{{ old('pernafasan') }}"
                                autocomplete="off">
                            @error('pernafasan')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Ekstermitas</label>
                            <input type="text" placeholder="Masukkan ekstermitas"
                                class="form-control @error('ekstermitas') is-invalid               
                            @enderror"
                                id="ekstermitas" name="ekstermitas" required autofocus value="{{ old('ekstermitas') }}"
                                autocomplete="off">
                            @error('ekstermitas')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Nama Vaksin Terakhir (Jika sudah pernah)</label>
                            <input type="text" placeholder="Masukkan nama vaksin terakhir"
                                class="form-control @error('namavaksin') is-invalid               
                            @enderror"
                                id="namavaksin" name="namavaksin" required autofocus value="{{ old('namavaksin') }}"
                                autocomplete="off">
                            @error('namavaksin')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup has-icon mb-3">
                            <label>Tanggal Vaksin Terakhir (Jika sudah pernah)</label>
                            <div class="form-control-icon">
                                <input id="tanggalvaksin" name="tanggalvaksin" class="form-control date-picker-calender"
                                    type="text" placeholder="DD / MM / YY" autocomplete="off" required />
                                <div class="icon-badge-2">
                                    <img src="../../images/svg/calendar.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <br><br>

                        <button type="submit" class="btn btn-primary">Kirim Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
