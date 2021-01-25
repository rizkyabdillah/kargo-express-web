<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>

    <?= $this->include('admin/layouts/css-default'); ?>

    <?= $this->include('admin/layouts/g-tags'); ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <?= $this->include('admin/layouts/header'); ?>

            <?= $this->include('admin/layouts/sidebar'); ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <?php if (empty($back) ?  false : true) { ?>
                            <div class="section-header-back">
                                <a href="<?= $link_back; ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                            </div>
                        <?php } ?>
                        <h1><?= $header_title; ?></h1>
                        <?= $this->renderSection('header_button'); ?>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item"><a href="#"><?= $crumb1; ?></a></div>
                            <div class="breadcrumb-item"><?= $crumb2; ?></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <?= $this->renderSection('content'); ?>
                    </div>
                </section>
                <?= $this->renderSection('modal'); ?>
            </div>
            <?= $this->include('admin/layouts/footer'); ?>
        </div>
    </div>

    <?= $this->include('admin/layouts/js-default'); ?>

</body>

</html>