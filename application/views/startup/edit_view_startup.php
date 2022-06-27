<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Start Up Cost</title>
    <?php $this->load->view('user/_header'); ?>
</head>

<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Procurement Cost</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?= site_url('user'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Cost</li>
                        <li class="breadcrumb-item active"><a href="<?= site_url('startup/startup'); ?>">Start Up Cost</a></li>
                        <li class="breadcrumb-item active"><a href="<?= site_url('startup/view_startup/' . $this->uri->segment(4)); ?>">View Data</a></li>
                        <li class="breadcrumb-item active">Edit View Data</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                        Start up cost atau biaya persiapan operasional merupakan biaya yang dikeluarkan untuk pembuatan sistem yang akan dioperasikan. Biaya ini sama halnya dengan biaya pengadaan, umumnya dikeluarkan pada tahun pertama.
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Edit View Data Biaya Persiapan Operasional
                        </div>
                        <div class="card-body">
                            <?php
                            if (($this->session->flashdata('error'))) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $this->session->flashdata('error'); ?>
                                </div>
                            <?php } ?>
                            <form method="post" action="<?= site_url('startup/sunting_view_startup'); ?>">
                                <input type="hidden" name="ambil_data" value="<?= $this->uri->segment(3); ?>">
                                <div class="row mb-3">
                                    <label for="inputDeskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-4">
                                        <input name="deskripsi" type="text" class="form-control" id="inputDeskripsi" value="<?= $view_persiapan->deskripsi; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputKuantitas" class="col-sm-2 col-form-label">Kuantitas</label>
                                    <div class="col-sm-4">
                                        <input name="kuantitas" type="number" class="form-control" id="inputKuantitas" value="<?= $view_persiapan->kuantitas; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputSatuan" class="col-sm-2 col-form-label">Satuan</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="satuan_id" name="satuan">
                                            <option selected="0" value="">Pilih Satuan..</option>
                                            <?php foreach ($satuan as $unit) { ?>
                                                <option value="<?php echo $unit->id_satuan; ?>" <?= $unit->id_satuan == $view_persiapan->satuan ? "selected" : ""; ?>> <?php echo $unit->nama_satuan; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputHargaSatuan" class="col-sm-2 col-form-label">Harga Satuan</label>
                                    <div class="col-sm-4">
                                        <input name="harga_satuan" type="number" class="form-control" id="inputHargaSatuan" value="<?= $view_persiapan->harga_satuan; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputKeterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-4">
                                        <textarea name="keterangan" class="form-control" id="inputKeterangan"><?= $view_persiapan->keterangan; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-6 mx-auto">
                                    <button name="sunting_view_data" type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; SMA IT ABU BAKAR KULON PROGO</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
<?php $this->load->view('user/_footer'); ?>