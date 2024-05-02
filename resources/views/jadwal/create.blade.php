@extends('layouts.main')
@section('container')
    <div class="content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <div class="col-lg-8">
                    <form action="/jadwal" method="post" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <div class="fromGroup mb-3">
                            <label>Dokter</label>
                            <div class="select-box" style="background: white; border-radius: 4px;">
                                <select class="form-select form-select-sm" style="height: 40px;"
                                    aria-label=".form-select-sm example" name="doctor_id" required>
                                    <option value="" disabled selected>Pilih Dokter</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">
                                            {{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="fromGroup has-icon mb-3">
                            <label>Tanggal</label>
                            <div class="form-control-icon">
                                <input name="date" class="form-control date-picker-calender" type="text"
                                    placeholder="DD / MM / YY" onchange="formatDate(this)" required autocomplete="off" />
                                <div class="icon-badge-2">
                                    <img src="../images/svg/calendar.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="fromGroup mb-3">
                            <label>Jam</label>
                            <div class="select-box" style="background: white;border-radius:4px;">
                                <select class="form-select form-select-sm" style="height: 40px;"
                                    aria-label=".form-select-sm example" name="time" required>
                                    <option value="" disabled selected>Pilih Jam</option>
                                    <option value="09:00:00">09:00</option>
                                    <option value="12:00:00">12:00</option>
                                    <option value="15:00:00">15:00</option>
                                    <option value="18:00:00">18:00</option>
                                    <option value="19:00:00">19:00</option>
                                    <option value="20:00:00">20:00</option>
                                </select>
                            </div>
                        </div>

                        <div class="fromGroup mb-3">
                            <label for="category" class="form-label">Pemilik Hewan</label>
                            <div class="select-box" style="background: white; border-radius: 4px;">
                                <select class="form-select form-select-sm" style="height: 40px;"
                                    aria-label=".form-select-sm example" name="patient_id" id="category" required>
                                    <option value="" disabled selected>Pilih Pemilik Hewan</option>
                                    @foreach ($patients as $item)
                                        <option style="padding: 10px;
                                    cursor: pointer;"
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="fromGroup mb-3" id="petField" style="display: none;">
                            <label for="hewan" class="form-label">Hewan</label>
                            <div style="background: white;border-radius:4px;">
                                <select class="form-select form-select-sm" style="height: 40px;"
                                    aria-label=".form-select-sm example" name="hewan" id="hewan" required></select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#category').on('change', function() {
                var categoryID = $(this).val();
                if (categoryID) {
                    $.ajax({
                        url: '/getHewan/' + categoryID,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#hewan').empty();
                                $('#hewan').append(
                                    '<option value="" disabled selected>Pilih Hewan</option>'
                                );
                                $.each(data, function(key, hewan) {
                                    $('select[name="hewan"]').append(
                                        '<option value="' + hewan.id + '">' + hewan
                                        .name + '</option>');
                                });
                            } else {
                                $('#hewan').empty();
                            }
                        }
                    });
                } else {
                    $('#hewan').empty();
                }
            });
        });
    </script>

    <script>
        document.getElementById('category').addEventListener('change', function() {
            var petField = document.getElementById('petField');
            petField.style.display = 'block';
        });
    </script>
@endsection