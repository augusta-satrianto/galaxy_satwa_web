@extends('layouts.main')
<style>
    body {
        background-color: #d9d9d9;
        font-family: 'Roboto', sans-serif;
    }

    .Panel {
        width: 100%;
        max-width: 300px;
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
        width: 50%;
        text-align: center;
    }

    .Tabs__tab:first-child.active~.Tabs__presentation-slider {
        transform: translateX(0) scaleX(0.5);
    }

    .Tabs__tab:nth-child(2).active~.Tabs__presentation-slider {
        transform: translateX(50%) scaleX(0.5);
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
                <section class="search">
                    <div class="row">
                        <div class="card-body">
                        </div>
                        <div class="button" style="width:150px;">
                            <a href="/persuratan/buat">
                                <div class="tambah">Buat Surat</div>
                            </a>
                        </div>
                        <div class="button" style="width:150px;">
                            <a href="/persuratan/kirim">
                                <div class="tambah">Kirim Surat</div>
                            </a>
                        </div>
                    </div>
                </section>

                <div class="Panel" style="width: 300px;">
                    <nav>
                        <ul class="Tabs">
                            <li class="Tabs__tab active Tab"><a href="#" onclick="showContent(0)"
                                    style="font-family: 'Public Sans', sans-serif;">Surat</a></li>
                            <li class="Tabs__tab Tab"><a href="#" onclick="showContent(1)"
                                    style="font-family: 'Public Sans', sans-serif;">Riwayat</a></li>
                            <li class="Tabs__presentation-slider" role="presentation"></li>
                        </ul>
                    </nav>
                </div>
                <div style="width:100%;height:1px;background-color:#A2A3A7;margin:0;padding:0;"></div>

                <br>

                <div id="content0" class="content active">
                    <section class="tables">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-wrapper">
                                    <div class="table-content table-responsive">
                                        <table class="table align-middle table-basic table-basic--border ">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Kategori Surat</th>
                                                    <th scope="col">Nama Pemilik</th>
                                                    <th scope="col">Tanggal Surat Dikirim</th>
                                                    <th scope="col">File Surat</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($correspondences as $correspondence)
                                                    <tr>
                                                        <th scope="row">
                                                            {{ $correspondence->category }}</th>
                                                        <td>{{ $correspondence->patient->name }}</td>
                                                        <td>
                                                            {{ date('d/m/Y', strtotime($correspondence->created_at)) }}
                                                        </td>
                                                        <td><a href="{{ $correspondence->file }}">Unduh</a></td>
                                                        <td>Menunggu balasan</td>

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
                        {{ $correspondences->links() }}
                    </div>


                </div>
                <div id="content1" class="content" style="display:none;">
                    <section class="tables">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-wrapper">
                                    <div class="table-content table-responsive">
                                        <table class="table align-middle table-basic table-basic--border ">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Kategori Surat</th>
                                                    <th scope="col">Nama Pemilik</th>
                                                    <th scope="col">Tanggal Surat Dikirim</th>
                                                    <th scope="col">File Surat</th>
                                                    <th scope="col">File Surat Balasan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($histories as $history)
                                                    <tr>
                                                        <th scope="row">
                                                            {{ $history->category }}</th>
                                                        <td>{{ $history->patient->name }}</td>
                                                        <td>
                                                            {{ date('d/m/Y', strtotime($history->created_at)) }}
                                                        </td>
                                                        <td><a href="{{ $history->file }}">Unduh</a></td>
                                                        <td><a href="{{ $history->reply_file }}">Unduh</a></td>
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
                        {{ $histories->links() }}
                    </div>

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
