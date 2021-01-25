<?= $this->extend('admin/layouts/master'); ?>

<?= $this->section('header_button'); ?>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="col-12 col-md-12 col-lg-12">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Pelanggan</h4>
                    </div>
                    <div class="card-body">
                        <?= $cnt_pelanggan['count']; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-road"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Jalur</h4>
                    </div>
                    <div class="card-body">
                        <?= $cnt_jalur['count']; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Order</h4>
                    </div>
                    <div class="card-body">
                        <?= $cnt_transaksi['count']; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-id-card"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Pegawai</h4>
                    </div>
                    <div class="card-body">
                        <?= $cnt_pegawai['count']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h4>Calendar</h4>
                </div>
                <div class="card-body">
                    <div class="fc-overflow">
                        <div id="myEvent"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card col 4">
            <div class="card-header">
                <h4 class="d-inline">Transaksi</h4>
                <div class="card-header-action">
                    <a href="<?= route_to('view_order'); ?>" class="btn btn-primary">View All</a>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
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

                    foreach ($transaksi as $i) :
                        $data_arr = array_values($i);
                    ?>
                        <li class="media">
                            <img class="mr-3 rounded-circle" width="50" src="<?= base_url(); ?>/assets/img/avatar/avatar-4.png" alt="avatar">
                            <div class="media-body">
                                <div class="badge badge-pill badge-<?= badge($data_arr[2]); ?> mb-1 float-right"><?= $data_arr[2]; ?></div>
                                <h6 class="media-title"><?= $data_arr[0]; ?></h6>
                                <div class="text-small text-muted">Order Pada
                                    <div class="bullet"></div>(<?= date_format(date_create($data_arr[1]), "d M Y"); ?>)
                                </div>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>


<!-- Section CSS -->
<?= $this->section('page_css'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/fullcalendar/fullcalendar.min.css">
<?= $this->endSection(); ?>


<!-- Section JS Page Modules -->
<?= $this->section('page_modules'); ?>
<script src="<?= base_url(); ?>/assets/modules/fullcalendar/fullcalendar.min.js"></script>
<?= $this->endSection(); ?>


<!-- Section JS Page Before JS -->
<?= $this->section('page_beforejs'); ?>
<script src="<?= base_url(); ?>/assets/js/page/modules-calendar.js"></script>
<?= $this->endSection(); ?>


<!-- Section JS Page After JS -->
<?= $this->section('page_afterjs'); ?>

<?= $this->endSection(); ?>