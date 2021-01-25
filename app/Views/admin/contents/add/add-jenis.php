<?= $this->extend('admin/layouts/master'); ?>

<?= $this->section('content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h4>Form Tambah Jenis Barang</h4>
    </div>
    <form method="POST" action="<?= route_to('save_jenis'); ?>" class="needs-validation" novalidate="">
        <?= csrf_field(); ?>
        <div class="card-body">

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nama">Jenis Barang</label>
                    <input type="text" class="form-control <?= ($valid->hasError('jenis')) ? 'is-invalid' : ''; ?>" name="jenis" value="<?= old('jenis'); ?>" placeholder="Jenis Barang">
                    <div class="invalid-feedback">
                        <?= $valid->getError('jenis'); ?>
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