<div class="py-3">
    <div class="container">
        <div class="row d-flex align-items-start align-items-center px-3 px-md-0">
            <div class="col-md-4 d-flex mb-2 mb-md-0">
                <a class="navbar-brand d-flex align-items-center" href="<?= base_url() ?>">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <img src="<?= base_url(); ?>/assets_/images/logo1.png" class="mr-1">
                    </div>
                    <span> Ethree <small> Three Time Faster</small></span>
                </a>
            </div>
            <div class="col-md-4 d-flex topper mb-md-0 mb-2 align-items-center ">
                <div class="icon d-flex justify-content-center align-items-center ">
                    <span class="fa fa-phone "></span>
                </div>
                <div class="pr-md-4 pl-md-3 pl-3 text ">
                    <p class="hr"><span>Call Center</span> <span>+62 823-3382-6883</span></p>
                    <p class="con">Kami Melayani Anda Selama 24 Jam</p>
                </div>
            </div>
            <div class="col-md-4 d-flex topper mb-md-0 align-items-center ">
                <div class="icon d-flex justify-content-center align-items-center ">
                    <span class="fa fa-map"></span>
                </div>
                <div class="text pl-3 pl-md-3 ">
                    <p class="hr "><span>Lokasi Kami</span></p>
                    <p class="con ">JL. Teluk Mandar, No.23, Arjosari, Malang</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Navigasi Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light " id="ftco-navbar ">
    <div class="container d-flex align-items-center ">
        <button class="navbar-toggler " type="button " data-toggle="collapse " data-target="#ftco-nav " aria-controls="ftco-nav " aria-expanded="false " aria-label="Toggle navigation ">
            <span class="fa fa-bars "></span> Menu
        </button>
        <div class="collapse navbar-collapse " id="ftco-nav ">
            <ul class="navbar-nav m-auto ">
                <li class="nav-item <?= (($aktif === 1) ? 'active' : ''); ?>"><a href="<?= route_to('index') ?>" class="nav-link ">Home</a></li>
                <li class="nav-item <?= (($aktif === 6) ? 'active' : ''); ?>"><a href=" <?= route_to('resi') ?>" class=" nav-link ">Cek Resi</a></li>
                <li class="nav-item <?= (($aktif === 2) ? 'active' : ''); ?>"><a href=" <?= route_to('order') ?>" class=" nav-link ">Order</a></li>
                <li class=" nav-item <?= (($aktif === 3) ? 'active' : ''); ?>"><a href=" <?= route_to('produk') ?>" class=" nav-link ">Produk & Layanan</a></li>
                <li class=" nav-item <?= (($aktif === 4) ? 'active' : ''); ?>"><a href=" <?= route_to('tentang') ?>" class=" nav-link ">Tentang Kami</a></li>
                <?php if (session()->get('is_login_user')) { ?>
                    <li class=" nav-item <?= (($aktif === 5) ? 'active' : ''); ?> "><a href="<?= route_to('dashboard') ?>" class="nav-link ">Dashboard</a></li>
                    <li class=" nav-item "><a href="<?= route_to('logout_user') ?>" class="nav-link ">logout</a></li>
                <?php } else { ?>
                    <li class=" nav-item <?= (($aktif === 5) ? 'active' : ''); ?> cta"><a href="<?= route_to('login_user') ?>" class="nav-link ">Masuk / Daftar</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<!-- End nav -->