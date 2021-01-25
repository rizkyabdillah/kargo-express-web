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
                    <span>Order <i class="fa fa-chevron-right"></i>
                    </span>
                </p>
                <h1 class="mb-3 bread">Order Jasa Kargo</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Order</span>
                <h2 class="mb-4">Anda Membutuhkan Jasa Kargo?</h2>
                <p>Jangan Khawatir!, Sekarang Anda Bisa Order Melalui Form Dibawah Ini</p>
            </div>
        </div>

        <div class="row block-9">
            <div class="col-md-12 mb-5">
                <form action="<?= route_to('cek_pertama'); ?>" method="POST" class="p-4 p-md-5 contact-form">
                    <p><span class="fa fa-paper-plane"></span><strong> Informasi Pengirim -</strong></p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Pengirim</label>
                                <input type="text" name="nama_pengirim" class="form-control">
                                <?php if ($valid->hasError('nama_pengirim')) : ?>
                                    <label class="text-danger">
                                        <?= $valid->getError('nama_pengirim'); ?>
                                    </label>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nomor Telpon</label>
                                <input type="text" name="telp_pengirim" class="form-control">
                                <?php if ($valid->hasError('telp_pengirim')) : ?>
                                    <label class="text-danger">
                                        <?= $valid->getError('telp_pengirim'); ?>
                                    </label>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Kode POS</label>
                                <input type="text" name="kodep_pengirim" class="form-control">
                                <?php if ($valid->hasError('kodep_pengirim')) : ?>
                                    <label class="text-danger">
                                        <?= $valid->getError('kodep_pengirim'); ?>
                                    </label>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Kota Pengirim</label>
                                <?php
                                $data = array('' => 'Pilih Kota Pengirim');
                                foreach ($datakota as $i) {
                                    $data[$i['id_kota']] = $i['nama_kota'];
                                }

                                echo form_dropdown('kota_pengirim', $data, old('kota_pengirim'), 'class="form-control selectric"');
                                if ($valid->hasError('kota_pengirim')) : ?>
                                    <label class="text-danger">
                                        <?= $valid->getError('kota_pengirim'); ?>
                                    </label>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat Lengkap</label>
                                <input type="text" name="alamat_pengirim" class="form-control">
                                <?php if ($valid->hasError('alamat_pengirim')) : ?>
                                    <label class="text-danger">
                                        <?= $valid->getError('alamat_pengirim'); ?>
                                    </label>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>






                    </br>
                    <p><span class="fa fa-truck mt-3"></span><strong> Informasi Penerima -</strong></p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Penerima</label>
                                <input type="text" name="nama_penerima" class="form-control">
                                <?php if ($valid->hasError('nama_penerima')) : ?>
                                    <label class="text-danger">
                                        <?= $valid->getError('nama_penerima'); ?>
                                    </label>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>No. Telp</label>
                                <input type="number" name="telp_penerima" class="form-control">
                                <?php if ($valid->hasError('telp_penerima')) : ?>
                                    <label class="text-danger">
                                        <?= $valid->getError('telp_penerima'); ?>
                                    </label>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Kode POS</label>
                                <input type="number" name="kodep_penerima" class="form-control">
                                <?php if ($valid->hasError('kodep_penerima')) : ?>
                                    <label class="text-danger">
                                        <?= $valid->getError('kodep_penerima'); ?>
                                    </label>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-field ">
                                <label>Kota Penerima</label>
                                <?php
                                $data = array('' => 'Pilih Kota Penerima');
                                foreach ($datakota as $i) {
                                    $data[$i['id_kota']] = $i['nama_kota'];
                                }

                                echo form_dropdown('kota_penerima', $data, old('kota_penerima'), 'class="form-control selectric"');
                                if ($valid->hasError('kota_penerima')) :
                                ?>
                                    <label class="text-danger">
                                        <?= $valid->getError('kota_penerima'); ?>
                                    </label>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat Lengkap</label>
                                <input type="text" name="alamat_penerima" class="form-control">
                                <?php if ($valid->hasError('alamat_penerima')) : ?>
                                    <label class="text-danger">
                                        <?= $valid->getError('alamat_penerima'); ?>
                                    </label>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>







                    </br>
                    <p><span class="fa fa-archive mt-3"></span><strong> Informasi Barang</strong></p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control">
                                <?php if ($valid->hasError('nama_barang')) : ?>
                                    <label class="text-danger">
                                        <?= $valid->getError('nama_barang'); ?>
                                    </label>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-field ">
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
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Berat (KG)</label>
                                <input type="text" name="berat" class="form-control">
                                <?php if ($valid->hasError('berat')) : ?>
                                    <label class="text-danger">
                                        <?= $valid->getError('berat'); ?>
                                    </label>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Keterangan Barang</label>
                                <input type="text" name="keterangan" class="form-control">
                                <?php if ($valid->hasError('keterangan')) : ?>
                                    <label class="text-danger">
                                        <?= $valid->getError('keterangan'); ?>
                                    </label>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-12 text-right mt-5">
                            <div class="form-group">
                                <input type="submit" value="Lanjut" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
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