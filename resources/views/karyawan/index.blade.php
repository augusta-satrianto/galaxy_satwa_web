@extends('layouts.main')

@section('container')
    <div class="content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <section class="search">
                    <div class="row">
                        <div class="card-body">
                            <div class="fromGroup has-icon">
                                <div class="form-control-icon">
                                    <form action="/karyawan">
                                        <input class="form-control" type="search" placeholder="Search" name="karyawan"
                                            value="{{ request('karyawan') }}">
                                        <div class="icon-badge-2">
                                            <img src="../images/svg/search2.svg" alt="">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @if (Auth::user()->role == 'admin')
                            <div class="button">
                                <a href="/karyawan/tambah">
                                    <div class="tambah">Tambah</div>
                                </a>
                            </div>
                        @endif
                        <div class="button" style="width:100px;margin:0;padding:0;padding-left:10px;">
                            <a href="/karyawan/unduh">
                                <div class="edit">Unduh</div>
                            </a>
                        </div>
                    </div>
                </section>

                <!-- Employee Tables -->
                <section class="tables">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-wrapper">
                                <div class="table-content table-responsive">
                                    <table class="table align-middle table-basic table-basic--border ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Gambar</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Tanggal Lahir</th>
                                                <th scope="col">Jenis Kelamin</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">No.Tlpn</th>
                                                @if (Auth::user()->role == 'admin')
                                                    <th scope="col">Aksi</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employees as $employee)
                                                <tr>
                                                    <th scope="row">
                                                        <img style="width: 40px;height:40px;border-radius:50%;"
                                                            src="{{ $employee->image }}" alt="Gambar Hewan Peliharaan">
                                                    </th>
                                                    <td>{{ $employee->name }}</td>
                                                    <td>{{ $employee->email }}</td>
                                                    <td> {{ date('d/m/Y', strtotime($employee->date_of_birth)) }}</td>
                                                    <td>{{ $employee->gender }}</td>
                                                    <td>{{ $employee->address }}</td>
                                                    <td>{{ $employee->phone }}</td>
                                                    @if (Auth::user()->role == 'admin')
                                                        <td style="padding-top:0;padding-bottom:0;">
                                                            <ul class="action-btn">
                                                                <li>
                                                                    <a href="/karyawan/{{ $employee->id }}/edit">
                                                                        <div class="edit">
                                                                            <img src="images/edit.png" alt="Edit">
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <form action="/karyawan/{{ $employee->id }}"
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
                                                                            <img src="images/delete.png" alt="Delete">
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
                </section>
                <!-- Pagination Links -->
                <div class="d-flex justify-content-end mt-4">
                    {{ $employees->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection