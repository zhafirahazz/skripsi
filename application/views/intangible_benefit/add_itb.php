<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Intangible Benefit</title>
    <?php $this->load->view('user/_header'); ?>
</head>

<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Intangible Benefit</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?= site_url('user'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Benefit</li>
                        <li class="breadcrumb-item active"><a href="<?= site_url('intangible_benefit/intangible_benefit'); ?>">Intangible Benefit</a></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                        Intangible benefit atau manfaat tidak berwujud merupakan manfaat yang sulit diukur dalam bentuk uang. Manfaat tidak berwujud dapat diukur dengan menggunakan penaksiran
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tambah Data Manfaat Tidak Berwujud
                        </div>
                        <div class="card-body">
                            <?php
                            if (($this->session->flashdata('error'))) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $this->session->flashdata('error'); ?>
                                </div>
                            <?php } ?>
                            <form method="post" action="<?= site_url('intangible_benefit/isi_itb'); ?>">
                                <div class="row mb-3">
                                    <label for="inputManfaat" class="col-sm-2 col-form-label">Manfaat</label>
                                    <div class="col-sm-4">
                                        <input name="manfaat" type="text" class="form-control" id="inputManfaat">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputKuantitas" class="col-sm-2 col-form-label">Kuantitas</label>
                                    <div class="col-sm-4">
                                        <input name="kuantitas" type="number" class="form-control" id="inputKuantitas">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputSatuan" class="col-sm-2 col-form-label">Satuan</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="satuan_id" name="satuan">
                                            <option selected="0" value="">Pilih Satuan..</option>
                                            <?php foreach ($satuan as $unit) { ?>
                                                <option value="<?php echo $unit->id_satuan; ?>"> <?php echo $unit->nama_satuan; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputTarif" class="col-sm-2 col-form-label">Tarif</label>
                                    <div class="col-sm-4">
                                        <input name="tarif" type="number" class="form-control" id="inputTarif">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputKeterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-4">
                                        <textarea name="keterangan" class="form-control" id="inputKeterangan"></textarea>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 d-md-block">
                                    <div class="col-6 mx-auto">
                                        <button name="tambah" type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
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