@extends('layouts.main')

@section('container')
    <div class="content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
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
                        <div class="button" style="width:100px;margin:0;padding:0;padding-left:10px;">
                            <a href="/hewan/unduh">
                                <div class="edit">Unduh</div>
                            </a>
                        </div>
                    </div>
                </section>

                <!-- Pet Tables -->
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
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Jenis</th>
                                                <th scope="col">Umur</th>
                                                <th scope="col">Jenis Kelamin</th>
                                                <th scope="col">Warna</th>
                                                <th scope="col">Tato</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                            @foreach ($pets as $pet)
                                                <tr>
                                                    <th scope="row">
                                                        <img style="width: 40px;height:40px;border-radius:50%;"
                                                            src="{{ $pet->image }}" alt="Gambar Hewan Peliharaan">
                                                    </th>
                                                    <td>{{ $pet->name }}</td>
                                                    <td>{{ $pet->category }}</td>
                                                    <td>{{ $pet->type }}</td>
                                                    <td>{{ $pet->old }}</td>
                                                    <td>{{ $pet->gender }}</td>
                                                    <td>{{ $pet->color }}</td>
                                                    <td>{{ $pet->tatto }}</td>
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
                    {{ $pets->links() }}
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
