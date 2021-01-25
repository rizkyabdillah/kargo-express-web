<?= $this->extend('admin/layouts/master'); ?>

<?= $this->section('content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h4>Form Tambah Kota</h4>
    </div>
    <form method="POST" action="<?= route_to('save_kota'); ?>" class="needs-validation" novalidate="">
        <?= csrf_field(); ?>
        <div class="card-body">

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nama">Nama Kota</label>
                    <input type="text" class="form-control <?= ($valid->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" value="<?= old('nama'); ?>" placeholder="Nama Kota">
                    <div class="invalid-feedback">
                        <?= $valid->getError('nama'); ?>
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