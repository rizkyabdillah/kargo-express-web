<?= $this->extend('admin/layouts/master'); ?>

<?= $this->section('header_button'); ?>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="col-12 col-md-12 col-lg-12">
    <div class="card card-primary">
        <div class="card-header">
            <h4>Master Data</h4>
            <div class="card-header-action float-right">
                <a href="<?= route_to('view_add_order'); ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Tambah Data
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-desc">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 15%;">
                                No Resi
                            </th>
                            <th class="text-center" style="width: 20%;">Aksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Tanggal Penjemputan</th>
                            <th>Kota Tujuan</th>
                            <th>Status</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        function badge($status)
                        {
                            switch ($status) {
                                case 'NOT PAID':
                                    return 'warning';
                                    break;
                                case 'SHIPPED':
                                    return 'secondary';
                                    break;
                                case 'DEPARTURE':
                                    return 'info';
                                    break;
                                case 'PROCESS':
                                    return 'primary';
                                    break;
                                case 'ARRIVED':
                                    return 'success';
                                    break;
                                case 'CANCEL':
                                    return 'danger';
                                    break;
                            }
                        }

                        foreach ($dataset as $i) :
                            $arr = array_values($i);
                        ?>
                            <tr>
                                <td class="text-center"><?= $arr[1]; ?></td>
                                <td class="text-center">
                                    <a href="#" onclick="invoice('<?= $arr[1]; ?>');" class="btn btn-warning btn-action" data-toggle="tooltip" data-original-title="Print Invoice">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <a data-id="<?= $arr[1]; ?>" class="btn btn-danger btn-action ml-1 swal_confirm" data-toggle="tooltip" data-original-title="Hapus">
                                        <form action="<?= route_to('delete_order', $arr[1]); ?>" method="POST" id="hapus<?= $arr[1]; ?>" class="">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE" />
                                        </form>
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="#" onclick="detailA('<?= $arr[1]; ?>');" class="btn btn-info ml-1 btn-action" data-toggle="tooltip" data-original-title="Detail Order">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="#" data-resi="<?= $arr[1]; ?>" data-status="<?= $arr[5]; ?>" class="btn btn-secondary ml-1 btn-action ubahStatus" data-toggle="tooltip" data-original-title="Ubah Status">
                                        <i class="fas fa-toggle-on"></i>
                                    </a>
                                </td>
                                <?php
                                for ($j = 2; $j < count($arr); $j++) :
                                    if ($j == 5) {
                                ?>
                                        <td>
                                            <div class="badge badge-pill badge-<?= badge($arr[5]); ?>"><?= $arr[5]; ?></div>
                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td><?= $arr[$j]; ?></td>
                                <?php
                                    }
                                endfor
                                ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>


<!-- Section Modals -->
<?= $this->section('modal'); ?>
<div class="modal fade in" id="info" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card card-info">
                        <div class="card-header ">
                            <h4>INFO ORDER KARGO</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></a>
                            </div>
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

<form method="POST" action="<?= route_to('update_status'); ?>">
    <div class="modal fade in" id="status_dialog" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card card-info">
                            <div class="card-header ">
                                <h4>UBAH STATUS</h4>
                                <div class="card-header-action">
                                    <a href="#" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>STATUS</label>
                                        <input type="hidden" id="resi" name="no_resi" value="<?= old('berat'); ?>">
                                        <select name="status" id="status" class="form-control selectric">
                                            <option value="NOT PAID">NOT PAID</option>
                                            <option value="SHIPPED">SHIPPED</option>
                                            <option value="DEPARTURE">DEPARTURE</option>
                                            <option value="PROCESS">PROCESS</option>
                                            <option value="ARRIVED">ARRIVED</option>
                                            <option value="CANCEL">CANCEL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="text-right">
                                <button type="submit" class="btn btn-info btn-lg btn-round">
                                    <i class="fas fa-edit"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>


<!-- Section CSS -->
<?= $this->section('page_css'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/modules/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
<?= $this->endSection(); ?>


<!-- Section JS Page Modules -->
<?= $this->section('page_modules'); ?>
<script src="<?= base_url(); ?>/assets/modules/datatables/datatables.min.js"></script>
<script src="<?= base_url(); ?>/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="<?= base_url(); ?>/assets/modules/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url(); ?>/assets/modules/sweetalert/sweetalert.min.js"></script>
<?= $this->endSection(); ?>


<!-- Section JS Page Before JS -->
<?= $this->section('page_beforejs'); ?>
<script src="<?= base_url(); ?>/assets/js/page/modules-datatables.js"></script>
<?= $this->endSection(); ?>


<!-- Section JS Page After JS -->
<?= $this->section('page_afterjs'); ?>
<script>
    $(document).on("click", ".swal_confirm", function(e) {
        var id = $(this).data('id');
        swal({
                title: 'Apakah kamu yakin?',
                text: 'Disaat kamu menghapus, data yang terhapus tidak dapat dikembalikan lagi!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $('#hapus'.concat(id)).submit();
                }
            });
    });

    <?php if (session()->getFlashData('pesan')) : ?>
        swal('Sukses', '<?= session()->getFlashData('pesan'); ?>', 'success', {
            buttons: false,
            timer: 1200,
        });
    <?php endif ?>

    <?php if (session()->getFlashData('pesan1')) : ?>
        swal('Informasi', '<?= session()->getFlashData('pesan1'); ?>', 'success');
    <?php endif ?>

    function invoice(val) {
        window.open("<?= base_url() ?>/admin/invoice/" + val, "_blank", "width=786, height=786");
    }

    $(document).on("click", ".ubahStatus", function(e) {
        var no_resi = $(this).data('resi');
        var status = $(this).data('status');

        // alert(no_resi + ' ' + status);
        $('#resi').val(no_resi);
        $('#status').val(status).trigger('change');
        $('#status_dialog').modal('show');
    });

    function detailA(val) {

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
                $('#info').modal('show');
            }
        });
    }
</script>
<?= $this->endSection(); ?>