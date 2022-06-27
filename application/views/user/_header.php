<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="<?= base_url('asset/css/styles.css'); ?>" rel="stylesheet" />
<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="<?= site_url('user'); ?>"><img src="/investasi/img/abubakar.png" width="160" height="25"></a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <form class="d-none d-md-inline-block form-inline ms-auto">
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $this->session->userdata('firstname') ?> <?php echo $this->session->userdata('lastname') ?> <i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Edit Profile</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="<?= site_url('login'); ?>">Logout</a></li>
                </ul>
            </li>
        </ul>
    </form>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <br>
                    <a class="nav-link" href="<?= site_url('user'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Komponen</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-rupiah-sign"></i></div>
                        Biaya
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= site_url('procurement/procurement'); ?>">Procurement Cost</a>
                            <a class="nav-link" href="<?= site_url('startup/startup'); ?>">Start Up Cost</a>
                            <a class="nav-link" href="<?= site_url('project_related/project_related'); ?>">Project Related Cost</a>
                            <a class="nav-link" href="<?= site_url('ongoing/ongoing'); ?>">Ongoing Cost</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-dollar"></i></div>
                        Manfaat
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= site_url('tangible_benefit/tangible_benefit'); ?>">Tangible Benefit</a>
                            <a class="nav-link" href="<?= site_url('intangible_benefit/intangible_benefit'); ?>">Intangible Benefit</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Nilai</div>
                    <a class="nav-link" href="<?= site_url('proyek/proyek'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-gears"></i></div>
                        Nilai Proyek
                    </a>
                    <a class="nav-link" href="<?= site_url('user'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-file-invoice-dollar"></i></div>
                        Nilai Biaya
                    </a>
                    <a class="nav-link" href="<?= site_url('user'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-money-bill-trend-up"></i></div>
                        Nilai Manfaat
                    </a>
                    <div class="sb-sidenav-menu-heading">Kalkulator</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCalculator" aria-expanded="false" aria-controls="collapseCalculator">
                        <div class="sb-nav-link-icon"><i class="fas fa-calculator"></i></div>
                        Perhitungan
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseCalculator" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="layout-static.html">Benefit/Cost Ratio</a>
                            <a class="nav-link" href="layout-sidenav-light.html">Net Present Value</a>
                            <a class="nav-link" href="layout-sidenav-light.html">Profitability Index</a>
                            <a class="nav-link" href="layout-sidenav-light.html">Internal Rate of Return</a>
                            <a class="nav-link" href="layout-sidenav-light.html">Payback Period</a>
                            <a class="nav-link" href="layout-sidenav-light.html">Return on Investment</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="charts.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Laporan
                    </a>
                    <a class="nav-link" href="<?= site_url('user/review'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Pengguna
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>