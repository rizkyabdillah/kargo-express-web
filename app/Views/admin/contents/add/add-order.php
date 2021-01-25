<?= $this->extend('admin/layouts/master'); ?>

<?= $this->section('content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h4>Form Tambah Order</h4>
    </div>
    <form method="POST" action="<?= route_to('save_order'); ?>" class="needs-validation" novalidate="">
        <?= csrf_field(); ?>
        <div class="card-body">


            <div class="section-title mt-0">Data Pengirim</div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama_pengirim">Nama Pengirim</label>
                    <input type="text" class="form-control <?= ($valid->hasError('nama_pengirim')) ? 'is-invalid' : ''; ?>" name="nama_pengirim" value="<?= old('nama_pengirim'); ?>" placeholder="Nama Pengirim">
                    <div class="invalid-feedback">
                        <?= $valid->getError('nama_pengirim'); ?>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="telp">Telp Pengirim</label>
                    <div class="input_group"></div>
                    <input type="text" class="form-control <?= ($valid->hasError('telp_pengirim')) ? 'is-invalid' : ''; ?>" name="telp_pengirim" value="<?= old('telp_pengirim'); ?>" placeholder="Telp. Pengirim">
                    <div class="invalid-feedback">
                        <?= $valid->getError('telp_pengirim'); ?>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="kodep_pengirim">Kode Pos</label>
                    <div class="input_group"></div>
                    <input type="text" class="form-control <?= ($valid->hasError('kodep_pengirim')) ? 'is-invalid' : ''; ?>" name="kodep_pengirim" value="<?= old('kodep_pengirim'); ?>" placeholder="Kode Pos">
                    <div class="invalid-feedback">
                        <?= $valid->getError('kodep_pengirim'); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label>Kota Pengirim</label>
                    <?php
                    $data = array();
                    foreach ($datakota as $i) {
                        $data[$i['id_kota']] = $i['nama_kota'];
                    }
                    echo form_dropdown('kota_pengirim', $data, old('kota_pengirim'), 'class="form-control selectric "');
                    ?>
                    <div class="invalid-feedback">
                        <?= $valid->getError('kota_pengirim'); ?>
                    </div>
                </div>
                <div class="form-group col-md-7">
                    <label for="password">Alamat Pengirim</label>
                    <div class="input_group"></div>
                    <input type="text" class="form-control <?= ($valid->hasError('alamat_pengirim')) ? 'is-invalid' : ''; ?>" name="alamat_pengirim" value="<?= old('alamat_pengirim'); ?>" placeholder="Alamat Pengirim">
                    <div class="invalid-feedback">
                        <?= $valid->getError('alamat_pengirim'); ?>
                    </div>
                </div>
            </div>





            <div class="section-title mt-0">Data Penerima</div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama_penerima">Nama Penerima</label>
                    <input type="text" class="form-control <?= ($valid->hasError('nama_penerima')) ? 'is-invalid' : ''; ?>" name="nama_penerima" value="<?= old('nama_penerima'); ?>" placeholder="Nama Penerima">
                    <div class="invalid-feedback">
                        <?= $valid->getError('nama_penerima'); ?>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="telp_penerima">Telp Penerima</label>
                    <div class="input_group"></div>
                    <input type="text" class="form-control <?= ($valid->hasError('telp_penerima')) ? 'is-invalid' : ''; ?>" name="telp_penerima" value="<?= old('telp_penerima'); ?>" placeholder="Telp. Penerima">
                    <div class="invalid-feedback">
                        <?= $valid->getError('telp_penerima'); ?>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="kodep_penerima">Kode Pos</label>
                    <div class="input_group"></div>
                    <input type="text" class="form-control <?= ($valid->hasError('kodep_penerima')) ? 'is-invalid' : ''; ?>" name="kodep_penerima" value="<?= old('kodep_penerima'); ?>" placeholder="Kode Pos">
                    <div class="invalid-feedback">
                        <?= $valid->getError('kodep_penerima'); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label>Kota Penerima</label>
                    <?php
                    $data = array();
                    foreach ($datakota as $i) {
                        $data[$i['id_kota']] = $i['nama_kota'];
                    }
                    echo form_dropdown('kota_penerima', $data, old('kota_penerima'), 'class="form-control selectric "');
                    ?>
                    <div class="invalid-feedback">
                        <?= $valid->getError('kota_penerima'); ?>
                    </div>
                </div>
                <div class="form-group col-md-7">
                    <label for="alamat_penerima">Alamat Pengirim</label>
                    <div class="input_group"></div>
                    <input type="text" class="form-control <?= ($valid->hasError('alamat_penerima')) ? 'is-invalid' : ''; ?>" name="alamat_penerima" value="<?= old('alamat_penerima'); ?>" placeholder="Alamat Penerima">
                    <div class="invalid-feedback">
                        <?= $valid->getError('alamat_penerima'); ?>
                    </div>
                </div>
            </div>





            <div class="section-title mt-0">Data Barang</div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control <?= ($valid->hasError('nama_barang')) ? 'is-invalid' : ''; ?>" name="nama_barang" value="<?= old('nama_barang'); ?>" placeholder="Nama Barang">
                    <div class="invalid-feedback">
                        <?= $valid->getError('nama_barang'); ?>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label>Jenis Barang</label>
                    <?php
                    $data = array('' => 'Pilih Jenis Barang');
                    foreach ($datajenis as $i) {
                        $data[$i['id_jenis']] = $i['jenis_barang'];
                    }

                    echo form_dropdown('jenis_barang', $data, old('jenis_barang'), 'class="form-control selectric"');
                    if ($valid->hasError('jenis_barang')) :
                    ?>
                        <label class="text-danger">
                            <?= $valid->getError('jenis_barang'); ?>
                        </label>
                    <?php endif ?>
                </div>
                <div class="form-group col-md-2">
                    <label for="berat">Berat</label>
                    <div class="input_group"></div>
                    <input type="text" class="form-control <?= ($valid->hasError('berat')) ? 'is-invalid' : ''; ?>" name="berat" value="<?= old('berat'); ?>" placeholder="Berat (KG)">
                    <div class="invalid-feedback">
                        <?= $valid->getError('berat'); ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="keterangan">Ketarangan Barang</label>
                    <div class="input_group"></div>
                    <input type="text" class="form-control <?= ($valid->hasError('keterangan')) ? 'is-invalid' : ''; ?>" name="keterangan" value="<?= old('keterangan'); ?>" placeholder="Keterangan Barang">
                    <div class="invalid-feedback">
                        <?= $valid->getError('keterangan'); ?>
                    </div>
                </div>
            </div>



            <div class="card-footer text-right">
                <button type="submit" id="sub" class="btn btn-info btn-lg btn-round">
                    <i class="fas fa-arrow-right"></i> Lanjut
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

<?= $this->endSection(); ?>