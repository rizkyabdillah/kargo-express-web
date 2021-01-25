<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">EXPRESS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Ex</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?= ($sidebar == 0) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= route_to('view_dashboard'); ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Master Data</li>

            <?php if (empty(session()->get('data_login_peg'))) : ?>
                <li class="<?= ($sidebar == 1) ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= route_to('view_pegawai'); ?>">
                        <i class="fas fa-user"></i>
                        <span>Data Pegawai</span>
                    </a>
                </li>
            <?php endif ?>

            <li class="<?= ($sidebar == 2) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= route_to('view_pelanggan'); ?>">
                    <i class="fas fa-user-tie"></i>
                    <span>Data Pelanggan</span>
                </a>
            </li>

            <li class="<?= ($sidebar == 3) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= route_to('view_kota'); ?>">
                    <i class="fas fa-hotel"></i>
                    <span>Data Kota</span>
                </a>
            </li>

            <li class="<?= ($sidebar == 4) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= route_to('view_jalur'); ?>">
                    <i class="fas fa-road"></i>
                    <span>Data Jalur</span>
                </a>
            </li>

            <li class="<?= ($sidebar == 5) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= route_to('view_jenis'); ?>">
                    <i class="fas fa-box-open"></i>
                    <span>Data Jenis Barang</span>
                </a>
            </li>

            <li class="menu-header">Transaksi</li>
            <li class="<?= ($sidebar == 6) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= route_to('view_order'); ?>">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Order Kargo</span>
                </a>
            </li>

        </ul>
    </aside>
</div>