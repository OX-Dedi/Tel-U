<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark bg-dark" id="sidenavAccordion">
            <?php if ($this->session->userdata('role_id') == 1) : ?>
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading text-white">E-Learning</div>
                        <a class="nav-link" href="<?= base_url('User/kelasku'); ?>">
                            <div class="sb-nav-link-icon"><span class="fas fa-home text-white"></span></div>
                            Perkuliahan
                        </a>
                        <a class="nav-link" href="<?= base_url('Nilai/index'); ?>">
                            <div class="sb-nav-link-icon"><span class="fas fa-chart-area text-white"></span></div>
                            Nilai
                        </a>
                        <a class="nav-link" href="<?= base_url('absensi'); ?>">
                            <div class="sb-nav-link-icon"><span class="fas fa-user-check text-white"></span></div>
                            Absensi Mahasiswa
                        </a>
                        <a class="nav-link" href="<?= base_url('Calendar/index'); ?>">
                            <div class="sb-nav-link-icon"><span class="fas fa-calendar text-white"></span></div>
                            Agenda Perkuliahan
                        </a><div class="sb-sidenav-menu-heading text-white">Course</div>
                        </a><a class="nav-link" href="<?= base_url('Index/index'); ?>">
                            <div class="sb-nav-link-icon"><span class="fas fa-search text-white"></span></div>
                            Tes  Course
                          </a>        
                          <div class="sb-sidenav-menu-heading text-white">Tautan Cepat</div>
                        </a><a class="nav-link" href="<?= base_url('home/index'); ?>">
                            <div class="sb-nav-link-icon"><span class="fas fa-cog text-white"></span></div>
                            Oasis
                        </a>
                    </div>
                </div>
            <?php elseif ($this->session->userdata('role_id') == 2) : ?>
                <div class="sb-sidenav-menu">
                    <div class="nav">
                    <div class="sb-sidenav-menu-heading text-white">E-Learning</div>
                        <a class="nav-link" href="<?= base_url('User/kelasku'); ?>">
                            <div class="sb-nav-link-icon"><span class="fas fa-home text-white"></span></div>
                            Perkuliahan
                        </a>
                        <a class="nav-link" href="<?= base_url('Nilai/index'); ?>">
                            <div class="sb-nav-link-icon"><span class="fas fa-chart-area text-white"></span></div>
                            Nilai
                        </a>
                        <a class="nav-link" href="<?= base_url('absensi'); ?>">
                            <div class="sb-nav-link-icon"><span class="fas fa-user-check text-white"></span></div>
                            Absensi Mahasiswa
                        </a>
                        <a class="nav-link" href="<?= base_url('Calendar/index'); ?>">
                            <div class="sb-nav-link-icon"><span class="fas fa-calendar text-white"></span></div>
                            Agenda Perkuliahan
                        </a> <div class="sb-sidenav-menu-heading text-white">COURSE</div>
                        <a class="nav-link" href="http://localhost/Tel-U/E-learning/">
                            <div class="sb-nav-link-icon text-white"><span class="fas fa-course text-white"></span></div>
                            Tes Course
                        </a>
                        <div class="sb-sidenav-menu-heading text-white">Tautan Cepat</div>
                        </a><a class="nav-link" href="<?= base_url('home/index'); ?>">
                            <div class="sb-nav-link-icon"><span class="fas fa-cog text-white"></span></div>
                            Oasis
                        </a>
                    </div>
                </div>
            <?php elseif ($this->session->userdata('role_id') == 3) : ?>
                <div class="sb-sidenav-menu">
                    <div class="nav">
                    <div class="sb-sidenav-menu-heading text-white">E-Learning</div>
                        <a class="nav-link" href="<?= base_url('User/kelasku'); ?>">
                            <div class="sb-nav-link-icon"><span class="fas fa-home text-white"></span></div>
                            Perkuliahan
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="<?= base_url('absensi'); ?>">
                            <div class="sb-nav-link-icon"><span class="fas fa-user-check text-white"></span></div>
                            Absensi Mahasiswa
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            <div class="sb-sidenav-footer">
                <div class="small">Selamat Datang:</div>
                <?= $user['nama_lengkap'] ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>