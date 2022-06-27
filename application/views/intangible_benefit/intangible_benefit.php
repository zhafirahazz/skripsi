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
                        <li class="breadcrumb-item active">Intangible Benefit</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                        Intangible benefit atau manfaat tidak berwujud merupakan manfaat yang sulit diukur dalam bentuk uang. Manfaat tidak berwujud dapat diukur dengan menggunakan penaksiran
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Data Manfaat Berwujud
                        </div><br>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= site_url('intangible_benefit/add_itb'); ?>"><button class="btn btn-primary me-md-2 btn-sm">Tambah data</button></a>
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
                                        <th>Manfaat</th>
                                        <th>Kuantitas</th>
                                        <th>Satuan</th>
                                        <th>Tarif</th>
                                        <th>Total</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($intangible_benefit as $itb) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo $i;
                                                $i++; ?>
                                            </td>
                                            <td><?= $itb->manfaat; ?></td>
                                            <td><?= number_format($itb->kuantitas); ?></td>
                                            <td><?= $itb->satuan; ?></td>
                                            <td><?= number_format($itb->tarif); ?></td>
                                            <td><?= number_format($itb->kuantitas * $itb->tarif); ?></td>
                                            <td><?= $itb->keterangan; ?></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <a href="<?= site_url('intangible_benefit/edit_itb/' . $itb->id); ?>"><button class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square fa-fw"></i> Edit</button></a>
                                                        <a href="<?= site_url('intangible_benefit/delete_itb/' . $itb->id); ?>" onclick="return confirm('Delete data?');"><button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can fa-fw"></i> Delete</button></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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