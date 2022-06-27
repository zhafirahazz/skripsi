<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Users</title>
    <?php $this->load->view('user/_header'); ?>
</head>

<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">User Page</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?= site_url('user'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            Data yang telah registrasi
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Users Data
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-bordered table-striped table-hover">
                                <thead bgcolor=#99ff99>
                                    <tr>
                                        <th>No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Job Role</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <?php
                                        if ($this->session->userdata('role') == 9) { ?>
                                            <th>Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($users as $user) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo $i;
                                                $i++ ?>
                                            </td>
                                            <td><?= $user->first_name; ?></td>
                                            <td><?= $user->last_name; ?></td>
                                            <td><?= $user->role; ?></td>
                                            <td><?= $user->email; ?></td>
                                            <td>
                                                <?php
                                                if ($user->approved == 1) {
                                                    echo "Approved";
                                                } else {
                                                    echo "Rejected";
                                                }
                                                ?></td>
                                            <td>
                                                <?php
                                                if ($this->session->userdata('role') == 9) { ?>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <a href="<?= site_url('user/accept/' . $user->id); ?>" onclick="return confirm('Accept account?');"><button class="btn btn-warning btn-sm"><i class="fas fa-check fa-fw"></i> Accept</button></a>
                                                            <a href="<?= site_url('user/delete/' . $user->id); ?>" onclick="return confirm('Delete data?');"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-can fa-fw"></i> Delete</button></a>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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