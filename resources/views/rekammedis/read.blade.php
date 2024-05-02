@extends('layouts.main')

@section('container')
    <div class="content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div class="alert alert-success col-12" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                {{-- Profile --}}
                <div class="col-xxxl-5 col-xxl-5 col-xl-5 col-lg-6 col-md-6 col-sm-6">
                    <div class="card rekammedis" style="padding: 20px;">
                        <div>{{ $pet['name'] }}</div><br>

                        <div class="row">
                            <div class="image" style=" background-image: url({{ $pet->image }});margin-left:10px;">
                            </div>
                            <div class="profile" style="">
                                <div class="row profile-data" style="padding:0;">
                                    <p class="title">Umur</p>
                                    <p class="space"> : </p>
                                    <p class="value">
                                        {{ $pet['old'] }}
                                    </p>
                                </div>
                                <div class="row profile-data" style="padding:0;">
                                    <p class="title">Kategori Hewan</p>
                                    <p class="space"> : </p>
                                    <p class="value">
                                        {{ $pet['category'] }}
                                    </p>
                                </div>
                                <div class="row profile-data" style="padding:0;">
                                    <p class="title">Jenis Hewan</p>
                                    <p class="space"> : </p>
                                    <p class="value">
                                        {{ $pet['type'] }}
                                    </p>
                                </div>
                                <div class="row profile-data" style="padding:0;">
                                    <p class="title">Jenis Kelamin</p>
                                    <p class="space"> : </p>
                                    <p class="value">
                                        {{ $pet['gender'] }}
                                    </p>
                                </div>
                                <div class="row profile-data" style="padding:0;">
                                    <p class="title">Warna</p>
                                    <p class="space"> : </p>
                                    <p class="value">
                                        {{ $pet['color'] }}
                                    </p>
                                </div>
                                <div class="row profile-data" style="padding:0;">
                                    <p class="title">Tato</p>
                                    <p class="space"> : </p>
                                    <p class="value">
                                        {{ $pet['tatto'] }}
                                    </p>
                                </div>
                                <div class="row profile-data" style="padding:0;">
                                    <p class="title">Nama Pemilik</p>
                                    <p class="space"> : </p>
                                    <p class="value">
                                        {{ $pet['user']['name'] }}
                                    </p>
                                </div>
                                <div class="row profile-data" style="padding:0;">
                                    <p class="title">No.Tlpn Pemilik</p>
                                    <p class="space"> : </p>
                                    <p class="value">
                                        {{ $pet['user']['phone'] }}
                                    </p>
                                </div>
                                <div class="row profile-data" style="padding:0;">
                                    <p class="title">Alamat Pemilik</p>
                                    <p class="space"> : </p>
                                    <p class="value">
                                        {{ $pet['user']['address'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Search & Add & Download -->
                <section class="search">
                    <div class="row">
                        <div class="card-body">

                        </div>
                        @if (Auth::user()->role == 'dokter')
                            <div class="button" style="width:150px;">
                                <a href="/rekammedis/{{ $pet['id'] }}/buat">
                                    <div class="tambah">+ Tambah</div>
                                </a>
                            </div>
                        @endif
                    </div>
                </section>

                <!-- Medicine Tables -->
                <section class="tables">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-wrapper">
                                <div class="table-content table-responsive">
                                    <table class="table align-middle table-basic table-basic--border ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Gejala Klinis</th>
                                                <th scope="col">Diagnosa</th>
                                                <th scope="col">Tindakan</th>
                                                <th scope="col">Resep</th>
                                                @if (Auth::user()->role == 'dokter')
                                                    <th scope="col">Aksi</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($records as $record)
                                                <tr>
                                                    <td> {{ date('d/m/Y', strtotime($record->date)) }}</td>
                                                    <td>{{ $record->symptom }}</td>
                                                    <td>{{ $record->diagnosis }}</td>
                                                    <td>{{ $record->action }}</td>
                                                    <td
                                                        style="max-width: 200px; word-wrap: break-word; white-space: normal;">
                                                        {{ $record->recipe }}
                                                    </td>
                                                    @if (Auth::user()->role == 'dokter')
                                                        <td style="padding-top:0;padding-bottom:0;">
                                                            <ul class="action-btn">
                                                                <li>
                                                                    <a href="/rekammedis/{{ $record->id }}/edit">
                                                                        <div class="edit">
                                                                            <img src="../images/edit.png" alt="Edit">
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <form
                                                                        action="/rekammedis/{{ $pet['id'] }}/{{ $record->id }}"
                                                                        method="post" class="d-inline">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button type="submit"
                                                                            style=" width: 36px; 
                                                                                height: 36px;
                                                                                padding: 7px;
                                                                                border-radius: 50%;
                                                                                 background-color: rgb(250, 60, 8);"
                                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                            <img src="../images/delete.png" alt="Delete">
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="tables">






            </div>
        </div>
    </div>
@endsection
