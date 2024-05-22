@extends('layouts.main')

@section('container')
    <div class="content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <div class="col-lg-8">
                    <form action="/obat" method="post" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <div class="fromGroup mb-3">
                            <label>Kode Obat</label>
                            <input type="text" placeholder="Masukkan kode obat"
                                class="form-control @error('code') is-invalid               
                            @enderror"
                                id="code" name="code" required autofocus value="{{ old('code') }}"
                                autocomplete="off">
                            @error('code')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Nama Obat</label>
                            <input type="text" placeholder="Masukkan nama obat"
                                class="form-control @error('name') is-invalid               
                            @enderror"
                                id="name" name="name" required autofocus value="{{ old('name') }}"
                                autocomplete="off">
                            @error('name')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup has-icon mb-3">
                            <label>Tanggal Kadaluarsa</label>
                            <div class="form-control-icon">
                                <input id="expiry_date" name="expiry_date" class="form-control date-picker-calender"
                                    type="text" placeholder="DD / MM / YY" required autocomplete="off" />
                                <div class="icon-badge-2">
                                    <img src="../images/svg/calendar.svg" alt="" />
                                </div>
                            </div>
                        </div>

                        <div class="fromGroup mb-3">
                            <label>Stok Obat</label>
                            <input type="number" placeholder="Masukkan stok obat"
                                class="form-control @error('stock') is-invalid               
                            @enderror"
                                id="stock" name="stock" required autofocus value="{{ old('stock') }}"
                                autocomplete="off">
                            @error('stock')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
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
@endsection
