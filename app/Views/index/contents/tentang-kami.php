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
                    <span>Tentang Kami <i class="fa fa-chevron-right"></i>
                    </span>
                </p>
                <h1 class="mb-3 bread">Tentang Kami</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-counter ftco-no-pt ftco-no-pb" id="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="about-wrap img w-100" style="background-image: url(<?= base_url(); ?>/assets_/images/slidex.jpg);">
                </div>
            </div>
            <div class="col-md-6 py-5 pl-md-5">
                <div class="row justify-content-center mb-4 pt-md-4">
                    <div class="col-md-12 heading-section ftco-animate">
                        <span class="subheading">Selamat Datang di Express.co.id</span>
                        <h2 class="mb-4">Kargo Yang Terbukti Cepat Handal dan Terpercaya</h2>
                        <p>Kami selalu mengutamakan kepuasan pelanggan, dengan slogan kami yaitu Cepat, Handal, dan Bisa Dipercaya, adalah banyak dari konsumen kita yang memberikan nilai bagus kepada kami.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="15">0</strong>
                                <span>Tahun Pengalaman</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="20">0</strong>
                                <span>Kota di 3 Provinsi</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="155">0</strong>
                                <span>Pelanggan Kami</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="25">0</strong>
                                <span>Kurir Berpengalaman</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section" id="contact-section">
    <div class="container">
        <div class="row block-9">
            <div class="col-md-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.645447228998!2d112.65840551455486!3d-7.932048581185731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6299b9e9d46df%3A0xe4b5ca3b87369e6!2sJl.%20Teluk%20Mandar%2C%20Arjosari%2C%20Kec.%20Blimbing%2C%20Kota%20Malang%2C%20Jawa%20Timur%2065126!5e0!3m2!1sen!2sid!4v1606625314438!5m2!1sen!2sid" width="730" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="col-md-4 p-4 pl-md-5 p-5">
                <div class="row">
                    <div class="dbox w-100 d-flex ftco-animate">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-map-marker"></span>
                        </div>
                        <div class="text">
                            <p><span>Alamat:</span> JL. Teluk Mandar, No.23, Arjosari, Malang</p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex ftco-animate">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-phone"></span>
                        </div>
                        <div class="text">
                            <p><span>Call Center:</span> <a href="tel://1234567920">+62 1234567920</a></p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex ftco-animate">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-paper-plane"></span>
                        </div>
                        <div class="text">
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">express@gmail.com</a></p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex ftco-animate">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-globe"></span>
                        </div>
                        <div class="text">
                            <p><span>Website</span> <a href="<?= base_url(); ?>">express.com</a></p>
                        </div>
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
<script src="<?= base_url(); ?>/assets_/js/jquery.animateNumber.min.js"></script>
<script src="<?= base_url(); ?>/assets_/js/scrollax.min.js"></script>
<script src="<?= base_url(); ?>/assets_/js/main.js "></script>
<?= $this->endSection(); ?>