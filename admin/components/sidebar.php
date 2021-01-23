<ul class="sidebar navbar-nav" style="background-color: ghostwhite;">
    <li class="nav-item ">
        <a class="nav-link text-dark" href="home.html">
            <i class="fas fa-home"></i>
            <span>Home</span>
        </a>
    </li>

    <?php if ($_SESSION['admin']['admin_level'] == 'admin') { ?>
        <li class="nav-item ">
            <a class="nav-link text-dark" href="admin.html">
                <i class="fa fa-user"></i>
                <span>Data Admin</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-dark" href="berita.html">
                <i class="fa fa-newspaper"></i>
                <span>Data Berita</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-dark" href="kriteria.html">
                <i class="fa fa-list"></i>
                <span>Data Kriteria</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-dark" href="siswa.html">
                <i class="fa fa-users"></i>
                <span>Data Siswa</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-dark" href="penilaian.html">
                <i class="fa fa-circle"></i>
                <span>Penilaian</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-dark" href="perhitungan.html">
                <i class="fa fa-check"></i>
                <span>Perhitungan</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-dark" href="laporan.html">
                <i class="fa fa-list"></i>
                <span>Laporan</span>
            </a>
        </li>
    <?php } elseif ($_SESSION['admin']['admin_level'] == 'kepsek') { ?>
        <li class="nav-item ">
            <a class="nav-link text-dark" href="admin.html">
                <i class="fa fa-user"></i>
                <span>Data Admin</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-dark" href="berita.html">
                <i class="fa fa-newspaper"></i>
                <span>Data Berita</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-dark" href="rangkingkepsek.html">
                <i class="fa fa-list"></i>
                <span>Hasil Rangking Siswa</span>
            </a>
        </li>
    <?php } ?>



    <!-- <li class="nav-item ">
        <a class="nav-link" href="laporan.html">
            <i class="fas fa-calendar-alt"></i>
            <span>Laporan</span>
        </a>
    </li> -->







</ul>