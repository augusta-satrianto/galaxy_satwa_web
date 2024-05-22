@extends('layouts.main')
<style>
    body {
        background-color: #d9d9d9;
        font-family: 'Roboto', sans-serif;
    }

    .Panel {
        width: 100%;
        max-width: 400px;
        margin: 0;
    }

    .Panel__body {
        background-color: #f2f2f2;
        padding: 10px 20px;
    }

    .Tabs {
        position: relative;
        background-color: #fff;
    }

    .Tabs:after {
        content: ' ';
        display: table;
        clear: both;
    }

    .Tabs__tab {
        float: left;
        /* Cambiado a float:left para alinear a la izquierda */
        width: 25%;
        text-align: center;
    }

    .Tabs__tab:first-child.active~.Tabs__presentation-slider {
        transform: translateX(0) scaleX(0.25);
    }

    .Tabs__tab:nth-child(2).active~.Tabs__presentation-slider {
        transform: translateX(25%) scaleX(0.25);
    }

    .Tabs__tab:nth-child(3).active~.Tabs__presentation-slider {
        transform: translateX(calc(25% * 2)) scaleX(0.25);
    }

    .Tabs__tab:nth-child(4).active~.Tabs__presentation-slider {
        transform: translateX(calc(25% * 3)) scaleX(0.25);
    }


    .Tabs__presentation-slider {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #A2A3A7;
        transform-origin: 0 0;
        transition: transform .25s;
    }

    .Tab {
        font-family: 'Roboto Slab';
    }

    .Tab>a {
        display: block;
        padding: 10px 12px;
        text-decoration: none;
        color: #666;
        transition: color .15s;
    }

    .Tab.active>a,
    .Tab:hover>a {
        color: #222;
    }
</style>

@section('container')
    <div class="content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div class="alert alert-success col-12" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (Auth::user()->role == 'admin')
                    <section class="search">
                        <div class="row">
                            <div class="card-body"> </div>
                            <div class="button" style="width:150px;">
                                <a href="/jadwal/buat">
                                    <div class="tambah">+ Buat Jadwal</div>
                                </a>
                            </div>
                        </div>
                    </section>
                @endif

                <div class="Panel" style="width: 400px;">
                    <nav>
                        <ul class="Tabs">
                            <li class="Tabs__tab active Tab"><a href="#" onclick="showContent(0)"
                                    style="font-family: 'Public Sans', sans-serif;">Hari Ini</a></li>
                            <li class="Tabs__tab Tab"><a href="#" onclick="showContent(1)"
                                    style="font-family: 'Public Sans', sans-serif;">Mendatang</a></li>
                            <li class="Tabs__tab Tab"><a href="#" onclick="showContent(2)"
                                    style="font-family: 'Public Sans', sans-serif;">Selesai</a></li>
                            <li class="Tabs__tab Tab"><a href="#" onclick="showContent(3)"
                                    style="font-family: 'Public Sans', sans-serif;">Dibatalkan</a></li>
                            <li class="Tabs__presentation-slider" role="presentation"></li>
                        </ul>
                    </nav>
                </div>
                <div style="width:100%;height:1px;background-color:#A2A3A7;margin:0;padding:0;"></div>
                <br>
                {{-- Hari Ini --}}
                <div id="content0" class="content active">
                    <section class="cards">
                        <div class="row">
                            @foreach ($hariini2 as $schedule)
                                <div class="col-xxxl-4 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card jadwal" style="padding: 20px;">
                                        <div class="row">
                                            @if ($schedule->category == 'Vaksinasi')
                                                <div class="image"
                                                    style=" background-image: url('../images/img_vaksinasi.svg');">
                                                </div>
                                            @else
                                                <div class="image"
                                                    style=" background-image: url('../images/img_imunisasi.svg');">
                                                </div>
                                            @endif

                                            <div class="profile" style="">
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Tanggal</p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ str_replace(
                                                            [
                                                                'Monday',
                                                                'Tuesday',
                                                                'Wednesday',
                                                                'Thursday',
                                                                'Friday',
                                                                'Saturday',
                                                                'Sunday',
                                                                'January',
                                                                'February',
                                                                'March',
                                                                'April',
                                                                'May',
                                                                'June',
                                                                'July',
                                                                'August',
                                                                'September',
                                                                'October',
                                                                'November',
                                                                'December',
                                                            ],
                                                            [
                                                                'Senin',
                                                                'Selasa',
                                                                'Rabu',
                                                                'Kamis',
                                                                'Jumat',
                                                                'Sabtu',
                                                                'Minggu',
                                                                'Januari',
                                                                'Februari',
                                                                'Maret',
                                                                'April',
                                                                'Mei',
                                                                'Juni',
                                                                'Juli',
                                                                'Agustus',
                                                                'September',
                                                                'Oktober',
                                                                'November',
                                                                'Desember',
                                                            ],
                                                            date('l, j F Y', strtotime($schedule->date)),
                                                        ) }}
                                                    </p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Agenda</p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ $schedule->category }}
                                                    </p>
                                                </div>
                                            </div>
                                            @if (Auth::user()->role == 'admin')
                                                <div class="con-button">
                                                    <form action="/vaksinimun/batalkan/{{ $schedule->id }}" method="post"
                                                        class="d-inline" enctype="multipart/form-data">
                                                        @method('put')
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return confirm('Apakah Anda yakin ingin membatalkan jadwal?')">
                                                            <div class="button">
                                                                Batalkan
                                                            </div>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach ($hariini as $appointment)
                                <div class="col-xxxl-4 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card jadwal" style="padding: 20px;">
                                        <div class="row">
                                            <div class="image"
                                                style=" background-image: url({{ $appointment->pet->image }});">
                                            </div>
                                            <div class="profile" style="">
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Tanggal</p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ str_replace(
                                                            [
                                                                'Monday',
                                                                'Tuesday',
                                                                'Wednesday',
                                                                'Thursday',
                                                                'Friday',
                                                                'Saturday',
                                                                'Sunday',
                                                                'January',
                                                                'February',
                                                                'March',
                                                                'April',
                                                                'May',
                                                                'June',
                                                                'July',
                                                                'August',
                                                                'September',
                                                                'October',
                                                                'November',
                                                                'December',
                                                            ],
                                                            [
                                                                'Senin',
                                                                'Selasa',
                                                                'Rabu',
                                                                'Kamis',
                                                                'Jumat',
                                                                'Sabtu',
                                                                'Minggu',
                                                                'Januari',
                                                                'Februari',
                                                                'Maret',
                                                                'April',
                                                                'Mei',
                                                                'Juni',
                                                                'Juli',
                                                                'Agustus',
                                                                'September',
                                                                'Oktober',
                                                                'November',
                                                                'Desember',
                                                            ],
                                                            date('l, j F Y', strtotime($appointment->date)),
                                                        ) }}
                                                    </p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Jam</p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ substr($appointment->time, 0, 5) }}
                                                    </p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Dokter
                                                    </p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ $appointment->doctor->name }}</p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Hewan
                                                    </p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ $appointment->pet->name }}</p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Pemilik
                                                    </p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ $appointment->patient->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @if (Auth::user()->role == 'admin')
                                            <div class="con-button">
                                                <form action="/jadwal/batalkan/{{ $appointment->id }}" method="post"
                                                    class="d-inline" enctype="multipart/form-data">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Apakah Anda yakin ingin membatalkan janji?')">
                                                        <div class="button">
                                                            Batalkan Janji
                                                        </div>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                {{-- Mendatang --}}
                <div id="content1" class="content" style="display:none;">
                    <section class="cards">
                        <div class="row">
                            @foreach ($mendatang2 as $schedule)
                                <div class="col-xxxl-4 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card jadwal" style="padding: 20px;">
                                        <div class="row">
                                            @if ($schedule->category == 'Vaksinasi')
                                                <div class="image"
                                                    style=" background-image: url('../images/img_vaksinasi.svg');">
                                                </div>
                                            @else
                                                <div class="image"
                                                    style=" background-image: url('../images/img_imunisasi.svg');">
                                                </div>
                                            @endif

                                            <div class="profile" style="">
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Tanggal</p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ str_replace(
                                                            [
                                                                'Monday',
                                                                'Tuesday',
                                                                'Wednesday',
                                                                'Thursday',
                                                                'Friday',
                                                                'Saturday',
                                                                'Sunday',
                                                                'January',
                                                                'February',
                                                                'March',
                                                                'April',
                                                                'May',
                                                                'June',
                                                                'July',
                                                                'August',
                                                                'September',
                                                                'October',
                                                                'November',
                                                                'December',
                                                            ],
                                                            [
                                                                'Senin',
                                                                'Selasa',
                                                                'Rabu',
                                                                'Kamis',
                                                                'Jumat',
                                                                'Sabtu',
                                                                'Minggu',
                                                                'Januari',
                                                                'Februari',
                                                                'Maret',
                                                                'April',
                                                                'Mei',
                                                                'Juni',
                                                                'Juli',
                                                                'Agustus',
                                                                'September',
                                                                'Oktober',
                                                                'November',
                                                                'Desember',
                                                            ],
                                                            date('l, j F Y', strtotime($schedule->date)),
                                                        ) }}
                                                    </p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Agenda</p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ $schedule->category }}
                                                    </p>
                                                </div>
                                            </div>

                                            @if (Auth::user()->role == 'admin')
                                                <div class="con-button">
                                                    <form action="/vaksinimun/batalkan/{{ $schedule->id }}"
                                                        method="post" class="d-inline" enctype="multipart/form-data">
                                                        @method('put')
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return confirm('Apakah Anda yakin ingin membatalkan jadwal?')">
                                                            <div class="button">
                                                                Batalkan
                                                            </div>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach ($mendatang as $appointment)
                                <div class="col-xxxl-4 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card jadwal" style="padding: 20px;">
                                        <div class="row">
                                            <div class="image"
                                                style=" background-image: url({{ $appointment->pet->image }});">
                                            </div>
                                            <div class="profile" style="">
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Tanggal</p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ str_replace(
                                                            [
                                                                'Monday',
                                                                'Tuesday',
                                                                'Wednesday',
                                                                'Thursday',
                                                                'Friday',
                                                                'Saturday',
                                                                'Sunday',
                                                                'January',
                                                                'February',
                                                                'March',
                                                                'April',
                                                                'May',
                                                                'June',
                                                                'July',
                                                                'August',
                                                                'September',
                                                                'October',
                                                                'November',
                                                                'December',
                                                            ],
                                                            [
                                                                'Senin',
                                                                'Selasa',
                                                                'Rabu',
                                                                'Kamis',
                                                                'Jumat',
                                                                'Sabtu',
                                                                'Minggu',
                                                                'Januari',
                                                                'Februari',
                                                                'Maret',
                                                                'April',
                                                                'Mei',
                                                                'Juni',
                                                                'Juli',
                                                                'Agustus',
                                                                'September',
                                                                'Oktober',
                                                                'November',
                                                                'Desember',
                                                            ],
                                                            date('l, j F Y', strtotime($appointment->date)),
                                                        ) }}
                                                    </p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Jam</p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ substr($appointment->time, 0, 5) }}
                                                    </p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Dokter
                                                    </p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ $appointment->doctor->name }}</p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Hewan
                                                    </p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ $appointment->pet->name }}</p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Pemilik
                                                    </p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ $appointment->patient->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @if (Auth::user()->role == 'admin')
                                            <div class="con-button">
                                                <form action="/jadwal/batalkan/{{ $appointment->id }}" method="post"
                                                    class="d-inline" enctype="multipart/form-data">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Apakah Anda yakin ingin membatalkan janji?')">
                                                        <div class="button">
                                                            Batalkan Janji
                                                        </div>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </section>
                </div>
                {{-- Selesai --}}
                <div id="content2" class="content" style="display:none;">
                    <section class="cards">
                        <div class="row">
                            @foreach ($selesai2 as $schedule)
                                <div class="col-xxxl-4 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card jadwal" style="padding: 20px;">
                                        <div class="row">
                                            @if ($schedule->category == 'Vaksinasi')
                                                <div class="image"
                                                    style=" background-image: url('../images/img_vaksinasi.svg');">
                                                </div>
                                            @else
                                                <div class="image"
                                                    style=" background-image: url('../images/img_imunisasi.svg');">
                                                </div>
                                            @endif

                                            <div class="profile" style="">
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Tanggal</p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ str_replace(
                                                            [
                                                                'Monday',
                                                                'Tuesday',
                                                                'Wednesday',
                                                                'Thursday',
                                                                'Friday',
                                                                'Saturday',
                                                                'Sunday',
                                                                'January',
                                                                'February',
                                                                'March',
                                                                'April',
                                                                'May',
                                                                'June',
                                                                'July',
                                                                'August',
                                                                'September',
                                                                'October',
                                                                'November',
                                                                'December',
                                                            ],
                                                            [
                                                                'Senin',
                                                                'Selasa',
                                                                'Rabu',
                                                                'Kamis',
                                                                'Jumat',
                                                                'Sabtu',
                                                                'Minggu',
                                                                'Januari',
                                                                'Februari',
                                                                'Maret',
                                                                'April',
                                                                'Mei',
                                                                'Juni',
                                                                'Juli',
                                                                'Agustus',
                                                                'September',
                                                                'Oktober',
                                                                'November',
                                                                'Desember',
                                                            ],
                                                            date('l, j F Y', strtotime($schedule->date)),
                                                        ) }}
                                                    </p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Agenda</p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ $schedule->category }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach ($selesai as $appointment)
                                <div class="col-xxxl-4 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card jadwal" style="padding: 20px;">
                                        <div class="row">
                                            <div class="image"
                                                style=" background-image: url({{ $appointment->pet->image }});">
                                            </div>
                                            <div class="profile" style="">
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Tanggal</p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ str_replace(
                                                            [
                                                                'Monday',
                                                                'Tuesday',
                                                                'Wednesday',
                                                                'Thursday',
                                                                'Friday',
                                                                'Saturday',
                                                                'Sunday',
                                                                'January',
                                                                'February',
                                                                'March',
                                                                'April',
                                                                'May',
                                                                'June',
                                                                'July',
                                                                'August',
                                                                'September',
                                                                'October',
                                                                'November',
                                                                'December',
                                                            ],
                                                            [
                                                                'Senin',
                                                                'Selasa',
                                                                'Rabu',
                                                                'Kamis',
                                                                'Jumat',
                                                                'Sabtu',
                                                                'Minggu',
                                                                'Januari',
                                                                'Februari',
                                                                'Maret',
                                                                'April',
                                                                'Mei',
                                                                'Juni',
                                                                'Juli',
                                                                'Agustus',
                                                                'September',
                                                                'Oktober',
                                                                'November',
                                                                'Desember',
                                                            ],
                                                            date('l, j F Y', strtotime($appointment->date)),
                                                        ) }}
                                                    </p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Jam</p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ substr($appointment->time, 0, 5) }}
                                                    </p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Dokter
                                                    </p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ $appointment->doctor->name }}</p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Hewan
                                                    </p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ $appointment->pet->name }}</p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Pemilik
                                                    </p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ $appointment->patient->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                {{-- Dibatalkan --}}
                <div id="content3" class="content" style="display:none;">
                    <section class="cards">
                        <div class="row">
                            @foreach ($dibatalkan2 as $schedule)
                                <div class="col-xxxl-4 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card jadwal" style="padding: 20px;">
                                        <div class="row">
                                            @if ($schedule->category == 'Vaksinasi')
                                                <div class="image"
                                                    style=" background-image: url('../images/img_vaksinasi.svg');">
                                                </div>
                                            @else
                                                <div class="image"
                                                    style=" background-image: url('../images/img_imunisasi.svg');">
                                                </div>
                                            @endif

                                            <div class="profile" style="">
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Tanggal</p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ str_replace(
                                                            [
                                                                'Monday',
                                                                'Tuesday',
                                                                'Wednesday',
                                                                'Thursday',
                                                                'Friday',
                                                                'Saturday',
                                                                'Sunday',
                                                                'January',
                                                                'February',
                                                                'March',
                                                                'April',
                                                                'May',
                                                                'June',
                                                                'July',
                                                                'August',
                                                                'September',
                                                                'October',
                                                                'November',
                                                                'December',
                                                            ],
                                                            [
                                                                'Senin',
                                                                'Selasa',
                                                                'Rabu',
                                                                'Kamis',
                                                                'Jumat',
                                                                'Sabtu',
                                                                'Minggu',
                                                                'Januari',
                                                                'Februari',
                                                                'Maret',
                                                                'April',
                                                                'Mei',
                                                                'Juni',
                                                                'Juli',
                                                                'Agustus',
                                                                'September',
                                                                'Oktober',
                                                                'November',
                                                                'Desember',
                                                            ],
                                                            date('l, j F Y', strtotime($schedule->date)),
                                                        ) }}
                                                    </p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Agenda</p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ $schedule->category }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach ($dibatalkan as $appointment)
                                <div class="col-xxxl-4 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card jadwal" style="padding: 20px;">
                                        <div class="row">
                                            <div class="image"
                                                style=" background-image: url({{ $appointment->pet->image }});">
                                            </div>
                                            <div class="profile" style="">
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Tanggal</p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ str_replace(
                                                            [
                                                                'Monday',
                                                                'Tuesday',
                                                                'Wednesday',
                                                                'Thursday',
                                                                'Friday',
                                                                'Saturday',
                                                                'Sunday',
                                                                'January',
                                                                'February',
                                                                'March',
                                                                'April',
                                                                'May',
                                                                'June',
                                                                'July',
                                                                'August',
                                                                'September',
                                                                'October',
                                                                'November',
                                                                'December',
                                                            ],
                                                            [
                                                                'Senin',
                                                                'Selasa',
                                                                'Rabu',
                                                                'Kamis',
                                                                'Jumat',
                                                                'Sabtu',
                                                                'Minggu',
                                                                'Januari',
                                                                'Februari',
                                                                'Maret',
                                                                'April',
                                                                'Mei',
                                                                'Juni',
                                                                'Juli',
                                                                'Agustus',
                                                                'September',
                                                                'Oktober',
                                                                'November',
                                                                'Desember',
                                                            ],
                                                            date('l, j F Y', strtotime($appointment->date)),
                                                        ) }}
                                                    </p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Jam</p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ substr($appointment->time, 0, 5) }}
                                                    </p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Dokter
                                                    </p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ $appointment->doctor->name }}</p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Hewan
                                                    </p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ $appointment->pet->name }}</p>
                                                </div>
                                                <div class="row profile-data" style="padding:0;">
                                                    <p class="title">Pemilik
                                                    </p>
                                                    <p class="space"> : </p>
                                                    <p class="value">
                                                        {{ $appointment->patient->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>

    <script>
        var tabs = document.getElementsByClassName('Tab');

        Array.prototype.forEach.call(tabs, function(tab) {
            tab.addEventListener('click', setActiveClass);
        });

        function setActiveClass(evt) {
            Array.prototype.forEach.call(tabs, function(tab) {
                tab.classList.remove('active');
            });

            evt.currentTarget.classList.add('active');
        }

        function showContent(index) {
            // Ocultar todos los contenidos
            var contents = document.querySelectorAll('.content');
            contents.forEach(function(content) {
                content.style.display = 'none';
            });

            // Mostrar el contenido correspondiente
            var selectedContent = document.getElementById('content' + index);
            selectedContent.style.display = 'block';
        }
    </script>
@endsection
