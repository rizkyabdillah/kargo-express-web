<?= $this->extend('index/layouts/master'); ?>

<?= $this->section('content'); ?>

<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">DASHBOARD</span>
                <h2 class="mb-1">Akun Saya</h2>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-lg-12 mb-5">
            <div class="row">
                <div class="col-12 col-sm-2 col-md-2">
                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#diproses" role="tab" aria-controls="diproses" aria-selected="true">Diproses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#selesai" role="tab" aria-controls="selesai" aria-selected="false">Selesai</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profil</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-sm-10 col-md-10 contact-form px-5 py-5">
                    <div class="tab-content no-padding" id="myTab2Content">
                        <div class="tab-pane fade show active" id="diproses" role="tabpanel" aria-labelledby="diproses-tab4">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No. Resi</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Tanggal Penjemputan</th>
                                            <th>Tujuan</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($dataset)) {
                                        ?>
                                            <tr>
                                                <td class="text-center" colspan="7">Kosong</td>
                                            </tr>
                                        <?php
                                        }
                                        foreach ($dataset as $i) :
                                            $arr = array_values($i);
                                        ?>
                                            <tr>
                                                <?php for ($j = 1; $j < count($arr); $j++) : ?>
                                                    <td><?= $arr[$j]; ?></td>
                                                <?php endfor ?>
                                                <td>
                                                    <a onclick="invoice('<?= $arr[1]; ?>');" class="btn btn-warning btn-action" data-toggle="tooltip" data-original-title="Print Invoice">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    <a onclick="detailA('<?= $arr[1]; ?>');" class="btn btn-primary btn-action" data-toggle="tooltip" data-original-title="Detail">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="selesai-tab4">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No. Resi</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Tanggal Penjemputan</th>
                                            <th>Tujuan</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($dataset1)) {
                                        ?>
                                            <tr>
                                                <td class="text-center" colspan="7">Kosong</td>
                                            </tr>
                                        <?php
                                        }
                                        foreach ($dataset1 as $i) :
                                            $arr = array_values($i);
                                        ?>
                                            <tr>
                                                <?php for ($j = 1; $j < count($arr); $j++) : ?>
                                                    <td><?= $arr[$j]; ?></td>
                                                <?php endfor ?>
                                                <td>
                                                    <a onclick="invoice('<?= $arr[1]; ?>');" class="btn btn-warning btn-action" data-toggle="tooltip" data-original-title="Print Invoice">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    <a href="" class="btn btn-primary btn-action" data-toggle="tooltip" data-original-title="Print Invoice">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab4">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="<?= route_to('ubah_user'); ?>" method="POST" class="p-2 p-md-5 contact-form">
                                        <p><span class="fa fa-id-badge"></span> Informasi Pelanggan</p>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="username">ID Pelanggan</label>
                                                    <input type="hidden" name="id" value="<?= $data_user['id_pelanggan']; ?>" class="form-control">
                                                    <input type="text" class="form-control" value="<?= $data_user['id_pelanggan']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username">Nama Pelanggan</label>
                                                    <input type="text" name="nama" class="form-control" value="<?= $data_user['nama_pelanggan']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="username">Email</label>
                                                    <input type="text" name="email" class="form-control" value="<?= $data_user['email']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" name="username" class="form-control" value="<?= $data_user['username']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username">No. Telp</label>
                                                    <input type="text" name="telp" class="form-control" value="<?= $data_user['no_telp']; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 text-right mt-5">
                                                <div class="form-group">
                                                    <input type="submit" value="Ubah" class="btn btn-primary py-3 px-5">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade in" id="info" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card card-info">
                        <div class="card-header ">
                            <label><strong>INFO ORDER</strong></label>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tbody>
                                    <!-- <hr> -->
                                    <tr>
                                        <td colspan="2">
                                            <h3><strong>- Data Pengirim</strong></h3>
                                        </td>
                                    </tr>
                                    <!-- <hr> -->
                                    <tr>
                                        <td style="width: 30%;">
                                            <h5>Nama Pengirim</h5>
                                        </td>
                                        <td>
                                            <h5 id="nama_pengirim">: aaaaa</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Kota Awal</h5>
                                        </td>
                                        <td>
                                            <h5 id="kota_awal">: aaaaa</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Kode Pos</h5>
                                        </td>
                                        <td>
                                            <h5 id="pos_pengirim">: aaaaa</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>No. Telp</h5>
                                        </td>
                                        <td>
                                            <h5 id="telp_pengirim">: aaaaa</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Alamat</h5>
                                        </td>
                                        <td>
                                            <h5 id="alamat_pengirim">: aaaaa</h5>
                                        </td>
                                    </tr>



                                    <tr>
                                        <td colspan="2">
                                            <h3><strong>- Data Pengirim</strong></h3>
                                        </td>
                                    </tr>
                                    <!-- <hr> -->
                                    <tr>
                                        <td style="width: 30%;">
                                            <h5>Nama Penerima</h5>
                                        </td>
                                        <td>
                                            <h5 id="nama_penerima">: aaaaa</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Kota Tujuan</h5>
                                        </td>
                                        <td>
                                            <h5 id="kota_tujuan">: aaaaa</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Kode Pos</h5>
                                        </td>
                                        <td>
                                            <h5 id="pos_penerima">: aaaaa</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>No. Telp</h5>
                                        </td>
                                        <td>
                                            <h5 id="telp_penerima">: aaaaa</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Alamat</h5>
                                        </td>
                                        <td>
                                            <h5 id="alamat_penerima">: aaaaa</h5>
                                        </td>
                                    </tr>




                                    <tr>
                                        <td colspan="2">
                                            <h3><strong>- Data Barang</strong></h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Nama Barang</h5>
                                        </td>
                                        <td>
                                            <h5 id="nama_barang">: aaaaa</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Berat</h5>
                                        </td>
                                        <td>
                                            <h5 id="berat">: aaaaa</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Keterangan</h5>
                                        </td>
                                        <td>
                                            <h5 id="keterangan">: aaaaa</h5>
                                        </td>
                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="text-right">
                            <button type="button" data-dismiss="modal" name="submit" class="btn btn-info btn-lg btn-round">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>


<!-- Section CSS -->
<?= $this->section('page_css'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/fontawesome/css/all.min.css">
<?= $this->endSection(); ?>


<!-- Section JS -->
<?= $this->section('page_js'); ?>
<script src="<?= base_url(); ?>/assets/modules/sweetalert/sweetalert.min.js"></script>
<script>
    <?php if (session()->getFlashData('pesan')) : ?>
        swal('Sukses', '<?= session()->getFlashData('pesan'); ?>', 'success', {
            buttons: false,
            timer: 1000,
        });
    <?php endif ?>

    <?php if (session()->getFlashData('pesan1')) :  ?>
        swal('Informasi', '<?= session()->getFlashData('pesan1'); ?>', 'success');
    <?php endif ?>

    function invoice(val) {
        window.open("<?= base_url() ?>/admin/invoice/" + val, "_blank", "width=786, height=786");
    }

    function detailA(val) {

        $('#info').modal('show');
        $.ajax({
            url: "<?= base_url(); ?><?= route_to('cekresi'); ?>",
            method: "POST",
            data: "no_resi=" + val,
            dataType: "json",
            success: function(data) {
                console.log(data);
                $('#nama_pengirim').text(': ' + data['pengirim']['nama_pengirim']);
                $('#nama_penerima').text(': ' + data['penerima']['nama_penerima']);

                $('#kota_awal').text(': ' + data['jalur']['kota_awal']);
                $('#kota_tujuan').text(': ' + data['jalur']['kota_tujuan']);

                $('#pos_pengirim').text(': ' + data['pengirim']['kode_pos']);
                $('#pos_penerima').text(': ' + data['penerima']['kode_pos']);

                $('#alamat_pengirim').text(': ' + data['pengirim']['alamat']);
                $('#alamat_penerima').text(': ' + data['penerima']['alamat']);

                $('#telp_pengirim').text(': ' + data['pengirim']['no_telp']);
                $('#telp_penerima').text(': ' + data['penerima']['no_telp']);

                $('#nama_barang').text(': ' + data['barang']['nama_barang']);
                $('#berat').text(': ' + data['barang']['berat'] + ' KG');
                $('#keterangan').text(': ' + data['barang']['keterangan']);
            }
        });
    }
</script>
<?= $this->endSection(); ?>