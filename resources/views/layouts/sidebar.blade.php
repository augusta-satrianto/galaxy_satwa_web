<div class="app-sidebar">
    <div class="h-100" data-simplebar>
        <div class="sidebar-menu">
            <ul id="side-menu">
                <li class="menu-title no-margin">Dashboard</li>
                <li>
                    <a href="/" aria-expanded="false" class="waves-effect primary-light">
                        <span class="icon-box"><i class="ph-house"></i></span>
                        <div class="text-box">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="/rekammedis" aria-expanded="false" class="waves-effect primary-light">
                        <span class="icon-box"><i class="ph-first-aid"></i></span>
                        <div class="text-box">Rekam Medis</div>
                    </a>
                </li>
                <li>
                    <a href="/jadwal" aria-expanded="false" class="waves-effect primary-light">
                        <span class="icon-box"><i class="ph-calendar-blank"></i></span>
                        <div class="text-box">Jadwal</div>
                    </a>
                </li>
                <li>
                    <a href="/persuratan" aria-expanded="false" class="waves-effect primary-light">
                        <span class="icon-box"><i class="ph-envelope-simple"></i></span>
                        <div class="text-box">Persuratan</div>
                    </a>
                </li>
                <li class="has-child">
                    <a href="javascript: void(0);" aria-expanded="false" class="waves-effect primary-light">
                        <span class="icon-box"><i class="ph-folder-notch-open"></i></span>
                        <div class="text-box">Master Data</div>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/obat">Obat</a></li>
                        <li><a href="/hewan">Hewan</a></li>
                        <li><a href="/pemilik">Pemilik Hewan</a></li>
                        <li><a href="/karyawan">Karyawan</a></li>
                    </ul>
                </li>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    @csrf
                </form>
                <li onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <a aria-expanded="false" class="waves-effect primary-light">
                        <span class="icon-box"><i class="ph-sign-out"></i></span>
                        <div class="text-box">Logout</div>
                    </a>
                </li>


            </ul>
        </div>
    </div>
</div>
