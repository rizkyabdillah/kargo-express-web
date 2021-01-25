<?= $this->extend('admin/layouts/master'); ?>

<?= $this->section('content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h4>Form Tambah Pelanggan</h4>
    </div>
    <form method="POST" action="<?= route_to('save_pelanggan'); ?>" class="needs-validation" novalidate="" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="card-body">

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="nama">Nama Pelanggan</label>
                    <input type="text" class="form-control <?= ($valid->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" value="<?= old('nama'); ?>" placeholder="Nama Pelanggan">
                    <div class="invalid-feedback">
                        <?= $valid->getError('nama'); ?>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="nama">Email</label>
                    <input type="text" class="form-control <?= ($valid->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" value="<?= old('email'); ?>" placeholder="Alamat Email">
                    <div class="invalid-feedback">
                        <?= $valid->getError('email'); ?>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="telp">No. Telp</label>
                    <div class="input_group"></div>
                    <input type="text" class="form-control <?= ($valid->hasError('telp')) ? 'is-invalid' : ''; ?>" name="telp" value="<?= old('telp'); ?>" placeholder="No. Telp">
                    <div class="invalid-feedback">
                        <?= $valid->getError('telp'); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="username">Username</label>
                    <input type="text" class="form-control <?= ($valid->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" value="<?= old('username'); ?>" placeholder="Username">
                    <div class="invalid-feedback">
                        <?= $valid->getError('username'); ?>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="password">Password</label>
                    <div class="input_group"></div>
                    <input type="password" class="form-control <?= ($valid->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" value="<?= old('password'); ?>" placeholder="Password">
                    <div class="invalid-feedback">
                        <?= $valid->getError('password'); ?>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="password">Ulangi Password</label>
                    <div class="input_group"></div>
                    <input type="password" class="form-control <?= ($valid->hasError('password1')) ? 'is-invalid' : ''; ?>" name="password1" value="<?= old('password1'); ?>" placeholder="Ulangi password">
                    <div class="invalid-feedback">
                        <?= $valid->getError('password1'); ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <label for="password">Foto Profil</label>
                <div class="form-group col-md-12">
                    <input type="file" name="gambar" class="form-control <?= ($valid->hasError('gambar')) ? 'is-invalid' : ''; ?>" placeholder="Upload Image">
                    <div class="invalid-feedback">
                        <?= $valid->getError('gambar'); ?>
                    </div>
                </div>
            </div>


            <div class="card-footer text-right">
                <button type="submit" class="btn btn-info btn-lg btn-round">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
    </form>
</div>
<?= $this->endSection(); ?>


<!-- Section CSS -->
<?= $this->section('page_css'); ?>

<?= $this->endSection(); ?>


<!-- Section JS Page Modules -->
<?= $this->section('page_modules'); ?>

<?= $this->endSection(); ?>


<!-- Section JS Page Before JS -->
<?= $this->section('page_beforejs'); ?>

<?= $this->endSection(); ?>


<!-- Section JS Page After JS -->
<?= $this->section('page_afterjs'); ?>

<?= $this->endSection(); ?>