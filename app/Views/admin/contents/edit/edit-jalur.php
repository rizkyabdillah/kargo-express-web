<?= $this->extend('admin/layouts/master'); ?>

<?= $this->section('content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h4>Form Ubah Jalur</h4>
    </div>
    <form method="POST" action="<?= route_to('update_jalur'); ?>" class="needs-validation" novalidate="">
        <?= csrf_field(); ?>
        <div class="card-body">

            <div class="form-row">

                <div class="form-group col-md-6">
                    <input type="hidden" name="id" value="<?= $dataset['id_jalur'] ?>">
                    <label>Kota Awal</label>
                    <?php
                    $data = array();
                    foreach ($datakota as $i) {
                        $data[$i['id_kota']] = $i['nama_kota'];
                    }
                    echo form_dropdown('kota_awal', $data, (old('kota_awal')) ? old('kota_awal') : $dataset['id_kota_awal'], 'class="form-control selectric "');
                    ?>
                    <div class="invalid-feedback">
                        <?= $valid->getError('kota_awal'); ?>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label>Kota Tujuan</label>
                    <?php
                    $data = array();
                    foreach ($datakota as $i) {
                        $data[$i['id_kota']] = $i['nama_kota'];
                    }

                    echo form_dropdown('kota_tujuan', $data, (old('kota_tujuan')) ? old('kota_tujuan') : $dataset['id_kota_tujuan'], 'class="form-control selectric"');
                    if ($valid->hasError('kota_tujuan')) :
                    ?>
                        <label class="text-danger">
                            <?= $valid->getError('kota_tujuan'); ?>
                        </label>
                    <?php endif ?>
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