<?= $this->extend('admin/layouts/master'); ?>

<?= $this->section('content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h4>Form Tambah Detail Jalur</h4>
    </div>
    <form method="POST" action="<?= route_to('save_detail'); ?>" class="needs-validation" novalidate="">
        <?= csrf_field(); ?>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Kargo</label>
                    <?php
                    $data = array();
                    foreach ($kargo as $i) {
                        $data[$i['id_kargo']] = $i['nama_kargo'];
                    }
                    echo form_dropdown('id_kargo', $data, old('id_kargo'), 'class="form-control selectric "');
                    ?>
                </div>

                <div class="form-group col-md-4">
                    <label for="nama">Harga</label>
                    <input type="text" class="form-control <?= ($valid->hasError('harga')) ? 'is-invalid' : ''; ?>" name="harga" value="<?= old('harga'); ?>" placeholder="Harga (Rp.)">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="invalid-feedback">
                        <?= $valid->getError('harga'); ?>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label>Status</label>
                    <?php
                    $data = array(
                        'A' => 'A',
                        'T' => 'T'
                    );
                    echo form_dropdown('status', $data, old('status'), 'class="form-control selectric "');
                    ?>
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
<link rel="stylesheet" href="<?= base_url() ?>/assets/modules/jquery-selectric/selectric.css">
<?= $this->endSection(); ?>


<!-- Section JS Page Modules -->
<?= $this->section('page_modules'); ?>
<script src="<?= base_url() ?>/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
<?= $this->endSection(); ?>


<!-- Section JS Page Before JS -->
<?= $this->section('page_beforejs'); ?>

<?= $this->endSection(); ?>


<!-- Section JS Page After JS -->
<?= $this->section('page_afterjs'); ?>
<script>
    <?php if (session()->getFlashData('pesan')) : ?>
        swal('Gagal', '<?= session()->getFlashData('pesan'); ?>', 'warning', {
            buttons: false,
            timer: 1200,
        });
    <?php endif ?>
</script>
<?= $this->endSection(); ?>