<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Nilai Proyek</title>
    <?php $this->load->view('user/_header'); ?>
</head>

<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Nilai Proyek</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?= site_url('user'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Nilai Proyek</li>
                    </ol>
                    <br>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Nilai Proyek
                        </div><br>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-bordered table-striped table-hover">
                                <thead bgcolor=#99ff99>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Proyek</th>
                                        <th>Biaya</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $harga = 0;
                                    $sum = 0;
                                    foreach ($proyek as $project) {
                                        $harga += $project->kuantitas * $project->harga_satuan;
                                    ?>
                                        <label type="hidden"><?php echo number_format($harga/($i-1)); ?></label>
                                        <label type="hidden"><?php echo number_format($proyek[0]->qty * ($harga / ($i - 1))); ?></label>
                                        <?php $sum += $proyek[0]->qty * ($harga / ($i - 1)); ?>
                                        <tr>
                                            <td>
                                                <?php echo $i;
                                                $i++; ?>
                                            </td>
                                            <td><?php echo $project->nama_cost_benefit ?></td>
                                            <td><?php echo number_format($sum); ?></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <a href="<?= site_url('proyek/delete_proyek/' . $this->uri->segment(3)); ?>" onclick="return confirm('Delete data?');"><button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can fa-fw"></i> Delete</button></a>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php } ?>
                                </tbody>
                                <td colspan="2" align=center><b>Total Proyek</b></td>
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