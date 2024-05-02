@extends('layouts.main')

@section('container')
    <div class="content-wrapper">
        <div class="page-content">
            <div class="container-fluid">

                <div class="col-lg-8">
                    <div class="text-center">
                        <img style="width: 100px;height:100px;border-radius:50%;" src="{{ $employee->image }}"
                            alt="Gambar Hewan Peliharaan">
                    </div>
                    <br>
                    <form action="/karyawan/{{ $employee->id }}" method="post" class="mb-5" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="fromGroup mb-3">
                            <label>Email</label>
                            <input type="text" placeholder="Masukkan email"
                                class="form-control @error('email') is-invalid               
                            @enderror"
                                id="email" name="email" disabled autofocus
                                value="{{ old('email', $employee->email) }}">
                            @error('email')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="fromGroup eye mb-3">
                            <label>Password</label>
                            <div
                                class="form-control-icon @error('password') is-invalid               
                            @enderror">
                                <input id="password-hide_show" name="password" class="form-control" type="password"
                                    placeholder="Masukkan password" value="{{ old('password') }}">
                                <div class="has-badge">
                                    <i class="ph-eye"></i>
                                </div>
                            </div>
                            @error('password')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="fromGroup mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" placeholder="Masukkan nama lengkap"
                                class="form-control @error('name') is-invalid               
                            @enderror"
                                id="name" name="name" required autofocus value="{{ old('name', $employee->name) }}"
                                autocomplete="off">
                            @error('name')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Role</label>
                            <div class="select-box" style="background: white; border-radius: 4px;">
                                <select class="form-select form-select-sm" style="height: 40px;"
                                    aria-label=".form-select-sm example" name="role" id="roleSelect" required>
                                    <option value="" disabled selected>Pilih Role</option>
                                    <option value="dokter" {{ old('role', $employee->role) == 'dokter' ? 'selected' : '' }}>
                                        Dokter</option>
                                    <option value="paramedis"
                                        {{ old('role', $employee->role) == 'paramedis' ? 'selected' : '' }}>Paramedis
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="fromGroup mb-3" id="spesialisField"
                            @if ($employee->role == 'dokter') style="display: block;" @else style="display: none;" @endif>
                            <label>Spesialis</label>
                            <input type="text" placeholder="Masukkan spesialis"
                                class="form-control @error('specialization') is-invalid @enderror" id="specialization"
                                name="specialization" required autofocus autocomplete="off"
                                value="{{ old('specialization', $employee->specialization) }}">
                            @error('specialization')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="fromGroup has-icon mb-3">
                            <label>Tanggal Lahir</label>
                            <div class="form-control-icon">
                                <input id="date_of_birth" name="date_of_birth" class="form-control date-picker-calender"
                                    type="text" placeholder="DD / MM / YYYY" onchange="formatDate(this)"
                                    value="{{ Carbon\Carbon::parse($employee->date_of_birth)->format('d/m/Y') }}" required
                                    autocomplete="off" />

                                <div class="icon-badge-2">
                                    <img src="../../images/svg/calendar.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Jenis Kelamin</label>
                            <div class="select-box" style="background: white;border-radius:4px;">
                                <select class="form-select form-select-sm" style="height: 40px;"
                                    aria-label=".form-select-sm example" name="gender" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki"
                                        {{ old('gender', $employee->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                    </option>
                                    <option value="Perempuan"
                                        {{ old('gender', $employee->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Alamat</label>
                            <input type="text" placeholder="Masukkan alamat"
                                class="form-control @error('address') is-invalid               
                            @enderror"
                                id="address" name="address" required value="{{ old('address', $employee->address) }}"
                                autocomplete="off">
                            @error('address')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="fromGroup mb-3">
                            <label>No.Telepon</label>
                            <input type="number" placeholder="Masukkan nomor telepon"
                                class="form-control @error('phone') is-invalid               
                            @enderror"
                                id="phone" name="phone" value="{{ old('phone', $employee->phone) }}"
                                autocomplete="off">
                            @error('phone')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Foto</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control @error('image') is-invalid @enderror" type="file"
                                id="image" name="image" onchange="previewImage()" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

    <script>
        document.getElementById('roleSelect').addEventListener('change', function() {
            var role = this.value;
            var spesialisField = document.getElementById('spesialisField');
            var spesialisInput = document.getElementById('specialization');

            if (role === 'dokter') {
                spesialisField.style.display = 'block';
                spesialisInput.required = true; // Menambahkan atribut required
            } else {
                spesialisField.style.display = 'none';
                spesialisInput.required = false; // Menghapus atribut required
            }
        });
    </script>
@endsection
