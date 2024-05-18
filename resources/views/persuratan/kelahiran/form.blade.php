@extends('layouts.main')

@section('container')
    <div class="content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <div class="col-lg-8">
                    <div style="font-size: 24px;font-weight:700;text-align:center;margin-bottom:50px;">Formulir Kelahiran
                    </div>
                    <form action="/persuratan/buat/kelahiran" method="post" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <div style="font-size: 20px;font-weight:700;">Identitas Anak</div><br>
                        <div class="fromGroup mb-3">
                            <label>Nama</label>
                            <input type="text" placeholder="Masukkan nama"
                                class="form-control @error('namaanak') is-invalid               
                            @enderror"
                                id="namaanak" name="namaanak" required autofocus value="{{ old('namaanak') }}"
                                autocomplete="off">
                            @error('namaanak')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Jenis Ras</label>
                            <input type="text" placeholder="Masukkan jenis ras"
                                class="form-control @error('jenisrasanak') is-invalid               
                            @enderror"
                                id="jenisrasanak" name="jenisrasanak" required autofocus value="{{ old('jenisrasanak') }}"
                                autocomplete="off">
                            @error('jenisrasanak')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Jenis Kelamin</label>
                            <div class="select-box" style="background: white;border-radius:4px;">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    name="jeniskelaminanak" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Jantan">Jantan</option>
                                    <option value="Betina">Betina</option>
                                </select>
                            </div>
                        </div>
                        <div class="fromGroup has-icon mb-3">
                            <label>Tanggal Lahir</label>
                            <div class="form-control-icon">
                                <input id="tanggallahiranak" name="tanggallahiranak"
                                    class="form-control date-picker-calender" type="text" placeholder="DD / MM / YY"
                                    autocomplete="off" required />
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
                            <label>Berat</label>
                            <input type="text" placeholder="Masukkan berat"
                                class="form-control @error('berat') is-invalid               
                            @enderror"
                                id="berat" name="berat" required autofocus value="{{ old('berat') }}"
                                autocomplete="off">
                            @error('berat')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Panjang</label>
                            <input type="text" placeholder="Masukkan panjang"
                                class="form-control @error('panjang') is-invalid               
                            @enderror"
                                id="panjang" name="panjang" required autofocus value="{{ old('panjang') }}"
                                autocomplete="off">
                            @error('panjang')
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
                        <br><br>

                        <div style="font-size: 20px;font-weight:700;">Identitas Induk</div><br>
                        <div class="fromGroup mb-3">
                            <label>Nama Induk Betina</label>
                            <input type="text" placeholder="Masukkan nama induk betina"
                                class="form-control @error('namabetina') is-invalid               
                            @enderror"
                                id="namabetina" name="namabetina" required autofocus value="{{ old('namabetina') }}"
                                autocomplete="off">
                            @error('namabetina')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Jenis Ras Induk Betina</label>
                            <input type="text" placeholder="Masukkan jenis ras induk betina"
                                class="form-control @error('jenisrasbetina') is-invalid               
                            @enderror"
                                id="jenisrasbetina" name="jenisrasbetina" required autofocus
                                value="{{ old('jenisrasbetina') }}" autocomplete="off">
                            @error('jenisrasbetina')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup has-icon mb-3">
                            <label>Tanggal Lahir Induk Betina</label>
                            <div class="form-control-icon">
                                <input id="tanggallahirbetina" name="tanggallahirbetina"
                                    class="form-control date-picker-calender" type="text" placeholder="DD / MM / YY"
                                    autocomplete="off" required />
                                <div class="icon-badge-2">
                                    <img src="../../images/svg/calendar.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="fromGroup mb-3">
                            <label>No. Id Microchip Induk Betina</label>
                            <input type="text" placeholder="Masukkan no. id microchip induk betina"
                                class="form-control @error('microchipbetina') is-invalid               
                            @enderror"
                                id="microchipbetina" name="microchipbetina" required autofocus
                                value="{{ old('microchipbetina') }}" autocomplete="off">
                            @error('microchipbetina')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Nama Induk Jantan</label>
                            <input type="text" placeholder="Masukkan nama induk jantan"
                                class="form-control @error('namajantan') is-invalid               
                            @enderror"
                                id="namajantan" name="namajantan" required autofocus value="{{ old('namajantan') }}"
                                autocomplete="off">
                            @error('namajantan')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Jenis Ras Induk Jantan</label>
                            <input type="text" placeholder="Masukkan jenis ras induk jantan"
                                class="form-control @error('jenisrasjantan') is-invalid               
                            @enderror"
                                id="jenisrasjantan" name="jenisrasjantan" required autofocus
                                value="{{ old('jenisrasjantan') }}" autocomplete="off">
                            @error('jenisrasjantan')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup has-icon mb-3">
                            <label>Tanggal Lahir Induk Jantan</label>
                            <div class="form-control-icon">
                                <input id="tanggallahirjantan" name="tanggallahirjantan"
                                    class="form-control date-picker-calender" type="text" placeholder="DD / MM / YY"
                                    autocomplete="off" required />
                                <div class="icon-badge-2">
                                    <img src="../../images/svg/calendar.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="fromGroup mb-3">
                            <label>No. Id Microchip Induk Jantan</label>
                            <input type="text" placeholder="Masukkan no. id microchip induk jantan"
                                class="form-control @error('microchipjantan') is-invalid               
                            @enderror"
                                id="microchipjantan" name="microchipjantan" required autofocus
                                value="{{ old('microchipjantan') }}" autocomplete="off">
                            @error('microchipjantan')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br><br>

                        <div style="font-size: 20px;font-weight:700;">Identitas Owner</div><br>
                        <div class="fromGroup mb-3">
                            <label>Nama Lengkap Owner</label>
                            <input type="text" placeholder="Masukkan nama lengkap owner"
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

                        <button type="submit" class="btn btn-primary">Kirim Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
