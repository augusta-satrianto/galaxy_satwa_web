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
                <!-- Search & Add & Download -->
                <section class="search">
                    <div class="row">
                        <div class="card-body">
                            <div class="fromGroup has-icon">
                                <div class="form-control-icon">
                                    <input class="form-control" type="search" placeholder="Search"id="searchInput"
                                        autocomplete="off">
                                    <div class="icon-badge-2">
                                        <img src="../images/svg/search2.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (Auth::user()->role == 'admin')
                            <div class="button">
                                <a href="/obat/tambah">
                                    <div class="tambah">Tambah</div>
                                </a>
                            </div>
                        @endif
                        <div class="button" style="width:100px;margin:0;padding:0;padding-left:10px;">
                            <a href="/obat/unduh">
                                <div class="edit">Unduh</div>
                            </a>
                        </div>
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
                                                <th scope="col">Kode Obat</th>
                                                <th scope="col">Nama Obat</th>
                                                <th scope="col">Tanggal Kadaluarsa</th>
                                                <th scope="col">Stok Obat</th>
                                                @if (Auth::user()->role == 'admin')
                                                    <th scope="col">Aksi</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                            @foreach ($medicines as $medicine)
                                                <tr>
                                                    <th scope="row">{{ $medicine->code }}</th>
                                                    <td>{{ $medicine->name }}</td>
                                                    <td>{{ date('d/m/Y', strtotime($medicine->expiry_date)) }}</td>
                                                    <td>{{ $medicine->stock }}</td>
                                                    @if (Auth::user()->role == 'admin')
                                                        <td style="padding-top:0;padding-bottom:0;">
                                                            <ul class="action-btn">
                                                                <li>
                                                                    <a href="/obat/{{ $medicine->id }}/edit">
                                                                        <div class="edit">
                                                                            <img src="images/edit.png" alt="Edit">
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <form action="/obat/{{ $medicine->id }}" method="post"
                                                                        class="d-inline">
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
                    {{ $medicines->links() }}
                </div>


            </div>
        </div>
    </div>

    <script>
        document.getElementById("searchInput").addEventListener("input", function() {

            var searchValue = this.value.toLowerCase();
            var rows = document.querySelectorAll("#tableBody tr");

            rows.forEach(function(row) {
                var nameCell = row.querySelector("td:nth-child(2)");
                var nameText = nameCell.textContent.toLowerCase();
                var nameMatch = nameText.includes(searchValue);

                if (nameMatch) {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
@endsection
