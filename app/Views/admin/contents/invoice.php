<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Cetak Invoice</title>
    <?= $this->include('admin/layouts/css-default'); ?>
</head>

<body>
    <div class="section-body px-5 py-5">
        <div class="invoice">
            <div class="invoice-print" id="print">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="invoice-title">
                            <h2>Invoice</h2>
                            <div class="invoice-number"><?= $dataset['transaksi']['no_resi']; ?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Data Pengirim :</strong><br>
                                    <?= $dataset['pengirim']['nama_pengirim']; ?><br>
                                    <?= $dataset['pengirim']['kode_pos']; ?><br>
                                    <?= $dataset['jalur']['kota_awal']; ?><br>
                                    <?= $dataset['pengirim']['alamat']; ?>
                                </address>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <address>
                                    <strong>Data Penerima :</strong><br>
                                    <?= $dataset['penerima']['nama_penerima']; ?><br>
                                    <?= $dataset['penerima']['kode_pos']; ?><br>
                                    <?= $dataset['jalur']['kota_tujuan']; ?><br>
                                    <?= $dataset['penerima']['alamat']; ?>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Metode Pembayaran :</strong><br>
                                    <?php if ($dataset['transaksi']['metode_pembayaran'] === "TRANSFER") { ?>
                                        BRI (8788-283-83727127)<br>
                                        AN. Rizky Abdillah
                                    <?php } else { ?>
                                        CASH<br>
                                        Pembayaran dilakukan saat pengambilan barang
                                    <?php } ?>
                                </address>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <address>
                                    <strong>Order Date:</strong><br>
                                    <?= date('F d, Y', strtotime($dataset['transaksi']['tanggal_transaksi'])); ?><br><br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="section-title">Ringkasan Order</div>
                        <p class="section-lead">Semua item disini tidak dapat dihapus.</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-md">
                                <tr>
                                    <th data-width="40">#</th>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Pembayaran</th>
                                    <th class="text-center">Tujuan</th>
                                    <th class="text-center">Berat</th>
                                    <th class="text-right">Total</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td class="text-center"><?= $dataset['barang']['nama_barang']; ?></td>
                                    <td class="text-center"><?= $dataset['transaksi']['metode_pembayaran']; ?></td>
                                    <td class="text-center"><?= $dataset['jalur']['kota_tujuan']; ?></td>
                                    <td class="text-center"><?= $dataset['barang']['berat']; ?> KG</td>
                                    <td class="text-right">Rp. <?= number_format($dataset['detail']['total_diskon'], 2, ',', '.'); ?></td>
                                </tr>
                            </table>
                        </div>
                        <h2 class="text-center">
                            <strong>
                                <?= ($dataset['transaksi']['status'] === 'NOT PAID') ? 'BELUM BAYAR' : 'SUDAH BAYAR'; ?>
                            </strong>
                        </h2>
                        <div class="row mt-4">
                            <div class="col-lg-8">
                                <div class="section-title">Metode Pembayaran!</div>
                                <p class="section-lead">Semua metode pembayaran tranfer dapat menggunakan layanan : </p>
                                <div class="images">
                                    <img src="<?= base_url() ?>/assets/img/visa.png" alt="visa">
                                    <img src="<?= base_url() ?>/assets/img/jcb.png" alt="jcb">
                                    <img src="<?= base_url() ?>/assets/img/mastercard.png" alt="mastercard">
                                    <img src="<?= base_url() ?>/assets/img/paypal.png" alt="paypal">
                                </div>
                            </div>
                            <div class="col-lg-4 text-right">
                                <hr class="mt-2 mb-2">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Total</div>
                                    <div class="invoice-detail-value invoice-detail-value-lg">Rp. <?= number_format($dataset['detail']['total_diskon'], 2, ',', '.'); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-md-right">
                <button onclick="printDiv('print')" class="btn btn-warning btn-icon icon-left">
                    <i class="fas fa-print"></i> Print
                </button>
            </div>
            <hr>
        </div>
    </div>
    <?= $this->include('admin/layouts/js-default'); ?>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</body>

</html>