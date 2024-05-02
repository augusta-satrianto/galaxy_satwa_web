@extends('layouts.main')

@section('container')
    <div class="content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <div class="col-lg-8">
                    <form action="/rekammedis/{{ $pet['id'] }}" method="post" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <div class="fromGroup mb-3">
                            <label>Gejala Klinis</label>
                            <input type="text" placeholder="Masukkan gejala klinis"
                                class="form-control @error('symptom') is-invalid               
                            @enderror"
                                id="symptom" name="symptom" required autofocus value="{{ old('symptom') }}"
                                autocomplete="off">
                            @error('symptom')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Diagnosa</label>
                            <input type="text" placeholder="Masukkan diagnosa"
                                class="form-control @error('diagnosis') is-invalid               
                            @enderror"
                                id="diagnosis" name="diagnosis" required autofocus value="{{ old('diagnosis') }}"
                                autocomplete="off">
                            @error('diagnosis')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Tindakan</label>
                            <input type="text" placeholder="Masukkan tindakan"
                                class="form-control @error('action') is-invalid               
                            @enderror"
                                id="action" name="action" required autofocus value="{{ old('action') }}"
                                autocomplete="off">
                            @error('action')
                                <div id="validationServer04Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Resep</label>
                            <input type="text" placeholder="Masukkan resep"
                                class="form-control @error('recipe') is-invalid               
                            @enderror"
                                id="recipe" name="recipe" required autofocus value="{{ old('recipe') }}"
                                autocomplete="off">
                            @error('recipe')
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
