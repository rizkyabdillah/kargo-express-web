<?= $this->extend('index/layouts/master'); ?>

<?= $this->section('content'); ?>

<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Cek Resi</span>
                <h2 class="mb-4">Ingin Mendapatkan Info Paket?</h2>
                <p>Silahkan lakukan cek resi dengan cara menginputkan nomor resi pada kolom dibawah ini!</p>
            </div>
        </div>

        <div class="row block-5 col-12 col-sm-10 offset-sm-1 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
            <div class="col-md-12 mb-5">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama">Masukkan No. Resi Anda</label>
                        <input type="text" class="form-control" id="resi1">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mt-2 text-center">
                        <div class="form-group">
                            <input type="submit" value="Cek Resi" class="btn btn-primary py-3 px-5 cekResi">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Cek Resi -->
<div class="modal fade in" id="cekModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card card-info">
                        <div class="card-header ">
                            <label>DETAIL RESI</label>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No. Resi</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Tanggal Penjemputan</th>
                                            <th>Tujuan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                    </tbody>
                                </table>
                                <div class="tab-content no-padding" id="myTab2Content">
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab4">
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>Data Pengirim :</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Data Penerima :</h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 id="nama_pengirim"></h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 id="nama_penerima"></h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 id="kota_awal"></h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 id="kota_tujuan"></h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 id="pos_awal"></h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 id="pos_tujuan"></h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 id="alamat_pengirim"></h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 id="alamat_penerima"></h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h2>
                                                    <strong id="status"></strong>
                                                </h2>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
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

<?= $this->endSection(); ?>


<!-- Section JS -->
<?= $this->section('page_js'); ?>
<script src="<?= base_url(); ?>/assets/modules/sweetalert/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('.cekResi').on('click', function() {
            var isi = $('#resi1').val();
            $("td").remove();
            if (isi == '') {
                swal('Gagal', 'Mohon isi nomor resi terlebih dahulu', 'info');
            } else {
                $.ajax({
                    url: "<?= base_url(); ?><?= route_to('cekresi'); ?>",
                    method: "POST",
                    data: "no_resi=" + isi,
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data == '') {
                            swal('Gagal', 'No resi anda tidak ditemukan', 'info');
                        } else {
                            var in_tbody =
                                '<tr>' +
                                '<td>' + data['transaksi']['no_resi'] + '</td>' +
                                '<td>' + data['transaksi']['tanggal_transaksi'] + '</td>' +
                                '<td>' + data['transaksi']['tanggal_penjemputan'] + '</td>' +
                                '<td>' + data['transaksi']['kota_tujuan'] + '</td>' +
                                '<td>' + data['transaksi']['status'] + '</td>' +
                                '<td>' +
                                '<a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Detail</a>' +
                                '</a>' +
                                '</td>' +
                                '</tr>';

                            $("#tbody").append(in_tbody);

                            $('#nama_pengirim').text(data['pengirim']['nama_pengirim']);
                            $('#nama_penerima').text(data['penerima']['nama_penerima']);

                            $('#kota_awal').text(data['jalur']['kota_awal']);
                            $('#kota_tujuan').text(data['jalur']['kota_tujuan']);

                            $('#pos_awal').text(data['pengirim']['kode_pos']);
                            $('#pos_tujuan').text(data['penerima']['kode_pos']);

                            $('#alamat_pengirim').text(data['pengirim']['alamat']);
                            $('#alamat_penerima').text(data['penerima']['alamat']);

                            var status = data['transaksi']['status'];
                            if (data['transaksi']['status'] == "NOT PAID") {
                                status = "BELUM BAYAR"
                            }

                            $('#status').text(status);

                            $('#cekModal').modal('show');
                        }
                    }
                })
            }
        });
    });
</script>
<?= $this->endSection(); ?>