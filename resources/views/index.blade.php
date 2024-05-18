@extends('layouts.main')

@section('container')
    <div class="content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <!-- Statistik Presensi -->
                <section class="cards" style="margin-bottom: 50px;">
                    <div class="row">
                        <div class="col-xxxl-4 col-xxl-4 col-xl-4 col-lg-6 col-md-4 col-sm-6" style="margin-bottom: 10px;">
                            <div class="card" style="margin: 0;padding:0;">
                                <div class="profile-left active-visitor">
                                    <div class="profile-thumb">
                                        <img src="../../images/img_total_hewan.svg" alt="" />
                                    </div>
                                    <div class="profile-data">
                                        <h4>{{ $pets_count }}</h4>
                                        <p>Total Hewan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxxl-4 col-xxl-4 col-xl-4 col-lg-6 col-md-4 col-sm-6" style="margin-bottom: 10px;">
                            <div class="card" style="margin: 0;padding:0;">
                                <div class="profile-left active-visitor">
                                    <div class="profile-thumb">
                                        <img src="../../images/img_pemeriksaan.svg" alt="" />
                                    </div>
                                    <div class="profile-data">
                                        <h4>{{ $records_count }}</h4>
                                        <p>Pemeriksaan Pasien</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxxl-4 col-xxl-4 col-xl-4 col-lg-6 col-md-4 col-sm-6" style="margin-bottom: 10px;">
                            <div class="card" style="margin: 0;padding:0;">
                                <div class="profile-left active-visitor">
                                    <div class="profile-thumb">
                                        <img src="../../images/img_dokter_pegawai.svg" alt="" />
                                    </div>
                                    <div class="profile-data">
                                        <h4>{{ $employees_count }}</h4>
                                        <p>Dokter & Paramedis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Table -->
                <section class="tables">
                    <div class="row">
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8" style="margin-bottom: 50px;">

                            <div class="table-wrapper">
                                <div class="table-head">
                                    <h2>Jadwal</h2>
                                </div>
                                <div class="table-content table-responsive table-responsives">
                                    <table class="table align-middle table-basic--border">
                                        <thead>
                                            <tr>
                                                <th colspan="2" scope="col">Tanggal</th>
                                                <th scope="col" colspan="2">Hewan</th>
                                                <th scope="col" colspan="2">Dokter</th>
                                                <th scope="col">Jam/Pukul</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($appointments as $appointment)
                                                <tr>
                                                    <th colspan="2" scope="row">
                                                        {{ date('d/m/Y', strtotime($appointment->date)) }}</th>
                                                    <td colspan="2">
                                                        <span>
                                                            <img style="width:30px;height:30px;"
                                                                src="{{ $appointment->pet->image }}" alt="user-icon" />
                                                        </span>
                                                        {{ $appointment->pet->name }}
                                                    </td>
                                                    <td colspan="2">{{ $appointment->doctor->name }}</td>
                                                    <td>{{ $appointment->time }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4" style="margin-bottom: 50px;">

                            <div class="table-wrapper">
                                <div class="table-head">
                                    <h2>Data Dokter</h2>
                                </div>
                                <div style="height:10px;"></div>
                                @foreach ($doctors as $doctor)
                                    <div class="card" style="margin-bottom:2px;padding:10px 10px 0 10px;">
                                        <div class="row" style="margin:0;padding:0;">
                                            <div class="image"
                                                style="height:45px;width:45px;
                                                background-size: cover;
                                                background-position: center;
                                                border-radius: 50%; background-image: url({{ $doctor->image }});">
                                            </div>
                                            <div class="profile-data" style="width:calc(100% - 45px);">
                                                <p style="font-size: 13pt;padding:0;margin:0px;">{{ $doctor->name }}</p>
                                                <p style="padding:0;font-size: 11pt;">{{ $doctor->specialization }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </section>

                <section class="tables">
                    <div class="row">
                        <div class="col-lg-5" style="margin-bottom: 50px;">
                            <div class="table-wrapper">
                                <div class="table-head">Data Hewan</div>
                                <div class="table-content table-responsive">
                                    <table class="table align-middle table-basic table-basic--border ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Umur</th>
                                                <th scope="col">Jenis Hewan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pets as $pet)
                                                <tr>
                                                    <th scope="row">
                                                        {{ $pet->name }}</th>
                                                    <td>{{ $pet->old }}</td>
                                                    <td>{{ $pet->type }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7" style="margin-bottom: 50px;">
                            <div class="table-wrapper">
                                <div class="table-head">Data Pemilik Hewan</div>
                                <div class="table-content table-responsive">
                                    <table class="table align-middle table-basic table-basic--border ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">No.Tlpn</th>
                                                <th scope="col">Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($patients as $patient)
                                                <tr>
                                                    <th scope="row">
                                                        {{ $patient->name }}</th>
                                                    <td>{{ $patient->email }}</td>
                                                    <td>{{ $patient->phone }}</td>
                                                    <td>{{ $patient->address }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
        </div>
    </div>
@endsection
