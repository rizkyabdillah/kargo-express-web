<?= $this->extend('admin/layouts/master'); ?>

<?= $this->section('content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h4>Form Tambah Order</h4>
    </div>
    <form method="POST" action="<?= route_to('save_orderlanjut'); ?>" class="needs-validation" novalidate="">
        <?= csrf_field(); ?>
        <div class="card-body">


            <div class="section-title mt-0">Data Pelanggan</div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="hidden" name="id_jalur" value="<?= $id_jalur ?>">
                    <label for="id_pelanggan">Pilih Pelanggan</label>
                    <?php
                    $data = array('' => 'Pilih Pelanggan');
                    foreach ($pelanggan as $i) {
                        $data[$i['id_pelanggan']] = '(' . $i['id_pelanggan'] . ') / ' . $i['nama_pelanggan'];
                    }
                    echo form_dropdown('id_pelanggan', $data, old('id_pelanggan'), 'class="form-control selectric "');
                    if ($valid->hasError('id_pelanggan')) : ?>
                        <label class="text-danger">
                            <?= $valid->getError('id_pelanggan'); ?>
                        </label>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="telp">Metode Pembayaran</label>
                    <div class="input_group"></div>
                    <?php
                    $data = array(
                        '' => 'Pilih Pembayaran',
                        'CASH' => 'CASH',
                        'TRANSFER' => 'TRANSFER',
                    );
                    echo form_dropdown('metode', $data, old('metode'), 'class="form-control selectric "');
                    if ($valid->hasError('metode')) : ?>
                        <label class="text-danger">
                            <?= $valid->getError('metode'); ?>
                        </label>
                    <?php endif ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="telp">Kargo</label>
                    <?php
                    $data = array('' => 'Pilih Kargo');
                    foreach ($datakargo as $i) {
                        $data[$i['id_kargo'] . $i['harga']] = $i['nama_kargo'];
                    }
                    echo form_dropdown('id_kargo', $data, old('id_kargo'), 'class="form-control selectric" onChange="setHarga(this.value);"');
                    if ($valid->hasError('id_kargo')) : ?>
                        <label class="text-danger">
                            <?= $valid->getError('id_kargo'); ?>
                        </label>
                    <?php endif ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="tanggal_jemput">Tanggal Penjemputan</label>
                    <div class="input_group"></div>
                    <input type="text" class="form-control datepicker <?= ($valid->hasError('tanggal_jemput')) ? 'is-invalid' : ''; ?>" name="tanggal_jemput" value="<?= old('tanggal_jemput'); ?>">
                    <div class="invalid-feedback">
                        <?= $valid->getError('tanggal_jemput'); ?>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <hr class="text-right" style="width: 30%;">
                <h4>Total : <strong id="total">IDR 0.00</strong></h4>
                <hr class="text-right" style="width: 30%;">
            </div>
            <div class="card-footer text-right">
                <button type="submit" id="sub" class="btn btn-info btn-lg btn-round">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>


<!-- Section CSS -->
<?= $this->section('page_css'); ?>
<link rel="stylesheet" href="<?= base_url() ?>/assets/modules/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
<?= $this->endSection(); ?>


<!-- Section JS Page Modules -->
<?= $this->section('page_modules'); ?>
<script src="<?= base_url() ?>/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="<?= base_url() ?>/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<?= $this->endSection(); ?>


<!-- Section JS Page Before JS -->
<?= $this->section('page_beforejs'); ?>

<?= $this->endSection(); ?>


<!-- Section JS Page After JS -->
<?= $this->section('page_afterjs'); ?>
<script>
    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 2
    })

    function setHarga(val) {
        var harga = val.substr(4);
        var berat = '<?= session()->get('data_order')['barang']['berat']; ?>';
        var total = parseInt(harga) * parseInt(berat);
        $("#total").text(formatter.format(total));
    }
</script>
<?= $this->endSection(); ?>