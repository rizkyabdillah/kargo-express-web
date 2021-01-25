<?= $this->extend('index/layouts/master'); ?>

<?= $this->section('content'); ?>

<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Daftar</span>
                <h2 class="mb-4">Daftar untuk melakukan order!</h2>
            </div>
        </div>

        <div class="row block-5 col-12 col-sm-10 offset-sm-1 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
            <div class="col-md-12 mb-5">
                <form action="<?= route_to('daftar_user'); ?>" method="POST" class="p-4 p-md-5 contact-form">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>">
                            <?php if ($valid->hasError('nama')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    <strong>Gagal!</strong> <?= $valid->getError('nama'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= old('email'); ?>">
                            <?php if ($valid->hasError('email')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    <strong>Gagal!</strong> <?= $valid->getError('email'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="telp">No. Telp</label>
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= old('telp'); ?>">
                            <?php if ($valid->hasError('telp')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    <strong>Gagal!</strong> <?= $valid->getError('telp'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= old('username'); ?>">
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
                            <input type="password" class="form-control" id="password" name="password" value="<?= old('password'); ?>">
                            <?php if ($valid->hasError('password')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    <strong>Gagal!</strong> <?= $valid->getError('password'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="konfirmasi">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="konfirmasi" name="konfirmasi">
                            <?php if ($valid->hasError('konfirmasi')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    <strong>Gagal!</strong> <?= $valid->getError('konfirmasi'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right mt-2 text-center">
                            <div class="form-group">
                                <input type="submit" value="Daftar" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-muted text-center">
                        Sudah memiliki akun? <a href="<?= route_to('login_user'); ?>">Masuk</a>
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

<?= $this->endSection(); ?>