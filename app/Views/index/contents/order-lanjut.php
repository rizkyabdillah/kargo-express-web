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

        <div class="row block-9" id="a">
            <div class="col-md-12 mb-5">
                <form action="<?= route_to('order_fix'); ?>" method="POST" class="p-4 p-md-5 contact-form">

                    <p><span class="fa fa-credit-card"></span><strong> Informasi Pembayaran -</strong></p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Kargo</label>
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
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Metode Pembayaran</label>
                                <div class="form-field ">
                                    <div class="select-wrap ">
                                        <select name="metode" id="" class="form-control">
                                            <option value="CASH">CASH</option>
                                            <option value="TRANSFER">TRANSFER</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Tanggal Penjemputan</label>
                                <input type="text" name="tanggal_jemput" value="<?= date('m/d/Y'); ?>" class="form-control datepicker">
                                <input type="hidden" name="id_jalur" value="<?= $id_jalur ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right mt-5">
                            <h2>Total : Rp. <strong id="harga">0</strong></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right mt-5">
                            <div class="form-group">
                                <input type="submit" value="Order" class="btn btn-primary py-3 px-5">
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
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?= $this->endSection(); ?>


<!-- Section JS -->
<?= $this->section('page_js'); ?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(function() {
        $(".datepicker").datepicker({
            altFormat: "yy-mm-dd"
        });
    });

    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 2
    })

    function setHarga(val) {
        var harga = val.substr(4);
        var berat = '<?= session()->get('data_order')['barang']['berat']; ?>';
        var total = parseInt(harga) * parseInt(berat);
        $("#harga").text(formatter.format(total));
    }
</script>
<?= $this->endSection(); ?>