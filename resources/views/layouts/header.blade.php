<header class="app-header rt-sticky">
    <div class="navbar align-items-center">
        <div class="container-fluid">
            <div class="left-content">
                <div class="logo-segment">
                    <div class="all-logo">
                        <a href="/" class="brand-logo">
                            <img src="../../images/logo/logo.svg" alt="" draggable="false" class="logo-black" />
                            <img src="../../images/logo/logo-white.svg" alt="" draggable="false"
                                class="logo-white" />
                            <img src="../../images/logo/logo-icon.svg" alt="" draggable="false"
                                class="logo-icon rt-mr-10" />
                            <img src="../../images/logo/logo-white.svg" alt="" draggable="false"
                                class="logo-full-white rt-mr-10" />
                        </a>
                        <a href="index.html" class="brand-logo white">
                            <img src="../../images/logo/logo-white.svg" alt="" draggable="false" />
                        </a>
                        <a href="index.html" class="collapse-in-logo">
                            <img src="../../images/logo/logo-icon.svg" alt="" draggable="false"
                                class="logo-icon-blue" />
                            <img src="../../images/logo/logo-icon-white.svg" alt="" draggable="false"
                                class="logo-icon-white" />
                        </a>
                    </div>
                    <div class="opener_sidebar">
                        <span class="icon-bar-open" id="opener_icon"></span>
                    </div>
                    <div class="opener_horizentalmenu" id="mainmenuOpen">
                        <span class="icon-bar-open2" id="opener_icon2"></span>
                    </div>
                </div>
                <div class="dashboard-message position-relative">
                    <span class="back_sidebar_icon">
                        <i class="ph-arrow-right"></i>
                    </span>
                </div>
            </div>
            <div class="ms-auto">
                <div class="rt-nav-tolls d-flex align-items-center">
                    <ul>
                        <li>
                            <div>
                                <img style="width: 40px;height:40px;border-radius:50%;" src="{{ Auth::user()->image }}"
                                    alt="Gambar Pengguna">
                            </div>

                        </li>
                        <li>{{ Auth::user()->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
