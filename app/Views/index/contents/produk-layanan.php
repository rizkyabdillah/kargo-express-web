<?= $this->extend('index/layouts/master'); ?>

<?= $this->section('content'); ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url(); ?>/assets_/images/slide7.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="<?= base_url(); ?>">Home
                            <i class="fa fa-chevron-right"></i>
                        </a></span>
                    <span>Produk & Layanan <i class="fa fa-chevron-right"></i>
                    </span>
                </p>
                <h1 class="mb-3 bread">Produk Dan Layanan Kami</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <span class="subheading">Services</span>
                <h2 class="mb-4">PRODUK DAN LAYANAN</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="services-wrap ftco-animate">
                    <div class="img" style="background-image: url(<?= base_url(); ?>/assets_/images/COD2.png);"></div>
                    <div class="text">
                        <h2>Express COD Retail</h2>
                        <p>COD (Cash On Delivery) Retail adalah fitur pembayaran bagi online seller yang melakukan pengiriman barang dengan menggunakan layanan Express.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="services-wrap ftco-animate">
                    <div class="img" style="background-image: url(<?= base_url(); ?>/assets_/images/ss2.png);"></div>
                    <div class="text">
                        <h2>Express Super Speed</h2>
                        <p>SUPER SPEED (SS) adalah layanan pengiriman dengan mengutamakan kecepatan dan penyampaiannya sesuai dengan waktu yang telah ditentukan/disepakati.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="services-wrap ftco-animate">
                    <div class="img" style="background-image: url(<?= base_url(); ?>/assets_/images/EX2.png);"></div>
                    <div class="text">
                        <h2>Express Regular</h2>
                        <p>REGULER adalah layanan pengiriman ke seluruh wilayah Indonesia, dengan perkiraan waktu penyampaian kiriman 1-7 hari kerja, tergantung pada zona daerah yang menjadi tujuan pengiriman.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="services-wrap ftco-animate">
                    <div class="img" style="background-image: url(<?= base_url(); ?>/assets_/images/PUP.png);"></div>
                    <div class="text">
                        <h2>Express PUP (PickUp Point)</h2>
                        <p>Express Pick-Up Point adalah layanan alternatif pelanggan dalam proses penerimaan kiriman.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="services-wrap ftco-animate">
                    <div class="img" style="background-image: url(<?= base_url(); ?>/assets_/images/Int_services.png);"></div>
                    <div class="text">
                        <h2>Express International Service</h2>
                        <p>Express Internasional adalah layanan pengiriman dengan tujuan ke luar negeri.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="services-wrap ftco-animate">
                    <div class="img" style="background-image: url(<?= base_url(); ?>/assets_/images/PopBox.png);"></div>
                    <div class="text">
                        <h2>Express Pop Box</h2>
                        <p>PopBox menawarkan kemudahan untuk Anda tanpa harus berada di rumah atau kantor ketika barang kiriman anda tiba, karena anda bisa mengambilnya langsung di lokasi loker terdekat. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>


<!-- Section CSS -->
<?= $this->section('page_css'); ?>

<?= $this->endSection(); ?>


<!-- Section JS -->
<?= $this->section('page_js'); ?>

<?= $this->endSection(); ?>