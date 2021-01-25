<?= $this->extend('index/layouts/master'); ?>

<?= $this->section('content'); ?>

<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Login</span>
                <h2 class="mb-4">Masuk untuk melakukan order!</h2>
            </div>
        </div>

        <div class="row block-5 col-12 col-sm-10 offset-sm-1 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
            <div class="col-md-12 mb-5">
                <form action="<?= route_to('auth_user'); ?>" method="POST" class="p-4 p-md-5 contact-form">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control">
                            <?php if ($valid->hasError('username')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    <strong>Gagal!</strong> <?= $valid->getError('username'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                            <?php if ($valid->hasError('password')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    <strong>Gagal!</strong> <?= $valid->getError('password'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="float-right">
                            <a href="auth-forgot-password.html" class="text-small">
                                Lupa Password?
                            </a>
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-md-12 text-right mt-2 text-center">
                            <div class="form-group">
                                <input type="submit" value="Login" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        Belum memiliki akun? <a href="<?= route_to('daftar'); ?>">Daftar Disini</a>
                    </div>
                </form>
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
<script src="<?= base_url(); ?>/assets/modules/sweetalert/sweetalert.min.js"></script>
<script>
    <?php if (session()->getFlashData('pesan')) : ?>
        swal('Gagal', '<?= session()->getFlashData('pesan'); ?>', 'warning', {
            buttons: false,
            timer: 1200,
        });
    <?php endif ?>
</script>
<?= $this->endSection(); ?>