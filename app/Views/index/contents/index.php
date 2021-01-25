<?= $this->extend('index/layouts/master'); ?>

<?= $this->section('content'); ?>

<!-- Caroussel -->
<section id="carouselIndicators" class="carousel slide js-fullheight" data-interval="3000" data-ride="carousel" data-stellar-background-ratio="0.5 ">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="hero-wrap "">
					<img src=" <?= base_url(); ?>/assets_/images/z1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5><strong>Percayakan Selalu</br>Paket Anda Bersama Kami</strong></h5>
                    <p>Kami selalu mengutamakan kepuasan pelanggan, dengan slogan kami yaitu Cepat, Handal, dan Bisa Dipercaya
                        </br>adalah banyak dari konsumen kita yang memberikan nilai bagus kepada kami</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="hero-wrap "">
					<img src=" <?= base_url(); ?>/assets_/images/z2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5><strong>POTONGAN 20K BAGI PELANGGAN BARU</strong></h5>
                    <p>Daftarkan Diri Anda Sekarang Juga!!!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Caroussel -->


<!-- Cek Biaya Kirim -->
<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2 bg-primary ">
    <div class="container ">
        <div class="row d-flex ">
            <div class="col-md-7 py-5 ">
                <div class="py-lg-5 ">
                    <div class="row justify-content-center pb-5 ">
                        <div class="col-md-12 heading-section ftco-animate ">
                            <h2 class="mb-3 ">Mengapa Harus Memilih Kami?</h2>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate ">
                            <div class="media block-6 services d-flex ">
                                <div class="icon justify-content-center align-items-center d-flex "><span class="flaticon-customer-service "></span></div>
                                <div class="media-body pl-4 ">
                                    <h3 class="heading mb-3 ">24/7 Customer Service</h3>
                                    <p>Kami akan selalu siaga selama 34 jam untuk membantu anda.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate ">
                            <div class="media block-6 services d-flex ">
                                <div class="icon justify-content-center align-items-center d-flex "><span class="flaticon-road-roller "></span></div>
                                <div class="media-body pl-4 ">
                                    <h3 class="heading mb-3 ">Pengiriman Yang Cepat</h3>
                                    <p>Demi menjaga dan memastikan kepuasan para pelanggan kami.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate ">
                            <div class="media block-6 services d-flex ">
                                <div class="icon justify-content-center align-items-center d-flex "><span class="flaticon-road-roller "></span></div>
                                <div class="media-body pl-4 ">
                                    <h3 class="heading mb-3 ">Peralatan Yang Handal</h3>
                                    <p>Kami akan selalu melakukan cek kondisi pada peralatan yang kami pakai.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate ">
                            <div class="media block-6 services d-flex ">
                                <div class="icon justify-content-center align-items-center d-flex "><span class="flaticon-road-roller "></span></div>
                                <div class="media-body pl-4 ">
                                    <h3 class="heading mb-3 ">Kurir Yang Berpengalaman</h3>
                                    <p>Kurir yang kami miliki semuanya memiliki sertifikat lulus uji berkendara.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cek Biaya Kirim -->
            <div class="col-md-5 d-flex ">
                <div class="appointment-wrap p-4 p-lg-5 d-flex align-items-center ">
                    <div class="overlay "></div>
                    <form action="#" class="appointment-form ftco-animate ">
                        <h3>Cek Biaya Kirim</h3>
                        <div class=" ">
                            <div class=" ">
                                <div class="form-group ">
                                    <div class="form-field ">
                                        <div class="select-wrap ">
                                            <div class="icon "><span class="fa fa-chevron-down "></span></div>
                                            <select id="kota_awal1" class="form-control ">
                                                <option value="">Kota Awal</option>
                                                <?php
                                                foreach ($datakota as $i) {
                                                ?>
                                                    <option value="<?= $i['id_kota']; ?>"><?= $i['nama_kota']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" ">
                                <div class="form-group ">
                                    <div class="form-field ">
                                        <div class="select-wrap ">
                                            <div class="icon "><span class="fa fa-chevron-down "></span></div>
                                            <select id="kota_tujuan1" class="form-control ">
                                                <option value="">Kota Tujuan</option>
                                                <?php
                                                foreach ($datakota as $i) {
                                                ?>
                                                    <option value="<?= $i['id_kota']; ?>"><?= $i['nama_kota']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" ">
                                <div class="form-group ">
                                    <div class="form-field ">
                                        <div class="select-wrap ">
                                            <div class="icon "><span class="fa fa-chevron-down "></span></div>
                                            <select id="kargo" class="form-control ">
                                                <option value="">Pilih Kargo</option>
                                                <?php
                                                foreach ($datakargo as $i) {
                                                ?>
                                                    <option value="<?= $i['id_kargo']; ?>"><?= $i['nama_kargo']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <input type="text " id="berat" class="form-control " placeholder="Berat (KG)">
                            </div>
                        </div>
                        <div class=" ">
                            <div class="form-group ">
                                <input type="button" id="cekBiaya" value="Cek Biaya " class="btn btn-primary py-3 px-4 " />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Cek Biaya Kirim -->


<!-- Layanan Kami -->
<section class="ftco-section ">
    <div class="container-fluid px-md-4 ">
        <div class="row justify-content-center mb-5 pb-2 ">
            <div class="col-md-8 text-center heading-section ftco-animate ">
                <h2 class="mb-4 ">Layanan Kami</h2>
            </div>
        </div>
        <div class="row justify-content-center col-md-12">

            <div class="col-md-3 ">
                <div class="services-wrap ">
                    <div class="img " style="background-image: url(<?= base_url(); ?>/assets_/images/s1.jpg); "></div>
                    <div class="text ">
                        <h2>Kargo Laut</h2>
                        <p>Untuk pengiriman antar pulang yang membutuhkan angkutan alat berat dapat menggunakan kargo jalur laut</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ">
                <div class="services-wrap ">
                    <div class="img " style="background-image: url(<?= base_url(); ?>/assets_/images/s2.jpg); "></div>
                    <div class="text ">
                        <h2>Kargo Darat</h2>
                        <p>Untuk pengiriman antar kota atau provinsi dalam satu pulau, dapat menggunakan cargo darat dengan syarat berat tidak lebih dari standard pengiriman</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ">
                <div class="services-wrap ">
                    <div class="img " style="background-image: url(<?= base_url(); ?>/assets_/images/s3.jpg); "></div>
                    <div class="text ">
                        <h2>Kargo Udara</h2>
                        <p>Untuk pengiriman antar pulau dan antar negara, dapat menggunakan cargo udara untuk pengiriman cepat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Layanan Kami -->


<!-- Mitra Kami -->
<section class="ftco-section testimony-section img " style="background-image: url(<?= base_url(); ?>/assets_/images/bg_1.jpg); ">
    <div class="overlay "></div>
    <div class="container ">
        <div class="row justify-content-center mb-5 pb-3 ">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate ">
                <span class="subheading ">Perusahaan</span>
                <h2 class="mb-4 ">Mitra Kami</h2>
            </div>
        </div>
        <div class="row justify-content-center col-md-12">
            <div class="col-md-3 ">
                <div class="services-wrap ">
                    <div class="img " style="background-image: url(<?= base_url(); ?>/assets_/images/bl.png); "></div>
                    <div class="text ">
                        <h2 class="text-white">Bukalapak</h2>
                        <p>E - commerce Unicorn</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ">
                <div class="services-wrap ">
                    <div class="img " style="background-image: url(<?= base_url(); ?>/assets_/images/laz.png); "></div>
                    <div class="text ">
                        <h2 class="text-white">Lazada</h2>
                        <p>E - commerce Unicorn</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ">
                <div class="services-wrap ">
                    <div class="img " style="background-image: url(<?= base_url(); ?>/assets_/images/jdid.png); "></div>
                    <div class="text ">
                        <h2 class="text-white">JD.ID</h2>
                        <p>E - commerce Unicorn</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ">
                <div class="services-wrap ">
                    <div class="img " style="background-image: url(<?= base_url(); ?>/assets_/images/shopee.png); "></div>
                    <div class="text ">
                        <h2 class="text-white">Shopee</h2>
                        <p>E - commerce Unicorn</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Mitra Kami -->


<!-- Modal Cek Harga -->
<div class="modal fade in" id="hargaModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card card-info">
                        <div class="card-header ">
                            <label>BIAYA KIRIM</label>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1><strong id="biaya">Biaya : Rp. 90.000,00</strong></h1>
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
<link rel="stylesheet" href="<?= base_url(); ?>/assets_/css/carousel.css">
<?= $this->endSection(); ?>


<!-- Section JS -->
<?= $this->section('page_js'); ?>
<script src="<?= base_url(); ?>/assets/modules/sweetalert/sweetalert.min.js"></script>
<script>
    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 2
    })

    $(document).ready(function() {
        $('.cekResi').on('click', function() {
            var isi = $('#resi1').val();
            $("td").remove();
            if (isi == '') {
                alert('Mohon isi nomor resinya terlebih dahulu!');
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


        $('#cekBiaya').on('click', function() {
            var kota_awal = $('#kota_awal1').val();
            var kota_tujuan = $('#kota_tujuan1').val();
            var kargo = $('#kargo').val();
            var berat = $('#berat').val();

            if (kota_awal == '') {
                alert('Kota awal belum dipilih!');
            } else if (kota_tujuan == '') {
                alert('Kota tujuan belum dipilih!');
            } else if (kargo == '') {
                alert('Kargo belum dipilih!');
            } else if (berat == '') {
                alert('Mohon isi data berat barang!');
            } else if (kota_awal == kota_tujuan) {
                alert('Mohon Maaf!, Kargo kami tidak melayani pengiriman di kota yang sama!');
            } else {
                $.ajax({
                    url: "<?= base_url(); ?><?= route_to('cekharga'); ?>",
                    method: "POST",
                    data: {
                        kota_awal: kota_awal,
                        kota_tujuan: kota_tujuan,
                        kargo: kargo,
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data == '') {
                            swal('Gagal', 'Pengiriman antar kota menggunakan kargo yang dipilih tidak tersedia', 'info');
                        } else {
                            var total = data[0].harga * berat;
                            $('#biaya').text(formatter.format(total));
                            $('#hargaModal').modal('show');
                        }
                    }
                });
            }
        });
    });
</script>
<?= $this->endSection(); ?>