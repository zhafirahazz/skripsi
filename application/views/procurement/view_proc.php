<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Procurement Cost</title>
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
                        <li class="breadcrumb-item active"><a href="<?= site_url('procurement/procurement'); ?>">Procurement Cost</a></li>
                        <li class="breadcrumb-item active">View Data</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            Procurement cost atau biaya pengadaan merupakan biaya yang dikeluarkan berhubungan dengan pengadaan hardware/ perangkat keras. Biaya ini pada umumnya dikeluarkan pada tahun pertama sebelum suatu investasi dioperasikan.
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel View Data Biaya Pengadaan
                        </div><br>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= site_url('procurement/add_view_proc/' . $this->uri->segment(3)); ?>"><button class="btn btn-primary me-md-2 btn-sm">Tambah data</button></a>
                        </div>
                        <?php
                        if (($this->session->flashdata('error'))) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                        <?php
                        if (($this->session->flashdata('success'))) { ?>
                            <div class="alert alert-success" role="alert">
                                <?= $this->session->flashdata('success'); ?>
                            </div>
                        <?php } ?>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-bordered table-striped table-hover">
                                <thead bgcolor=#99ff99>
                                    <tr>
                                        <th>No.</th>
                                        <th>Deskripsi</th>
                                        <th>Kuantitas</th>
                                        <th>Satuan</th>
                                        <th>Harga Satuan</th>
                                        <th>Total</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $harga = 0;
                                    foreach ($view_procurement as $view_pengadaan) {
                                        $harga += $view_pengadaan->kuantitas * $view_pengadaan->harga_satuan;
                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo $i;
                                                $i++; ?>
                                            </td>
                                            <td><?= $view_pengadaan->deskripsi; ?></td>
                                            <td><?= number_format($view_pengadaan->kuantitas); ?></td>
                                            <td><?= $view_pengadaan->satuan; ?></td>
                                            <td><?= number_format($view_pengadaan->harga_satuan); ?></td>
                                            <td><?= number_format($view_pengadaan->kuantitas * $view_pengadaan->harga_satuan); ?></td>
                                            <td><?= $view_pengadaan->keterangan; ?></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <a href="<?= site_url('procurement/edit_view_proc/' . $view_pengadaan->id_data . '/' . $this->uri->segment(3)); ?>"><button class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square fa-fw"></i> Edit</button></a>
                                                        <a href="<?= site_url('procurement/delete_view_proc/' . $view_pengadaan->id_data . '/' . $this->uri->segment(3)); ?>" onclick="return confirm('Delete data?');"><button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can fa-fw"></i> Delete</button></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table><br>
                            <label for="harga">Harga Satuan = <b><?php echo number_format($harga/($i-1)); ?></b></label><br>
                            <label for="total">Total = <b><?php echo number_format($view_procurement[0]->qty * ($harga/($i-1))) ?></b></label>
                            <br>
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