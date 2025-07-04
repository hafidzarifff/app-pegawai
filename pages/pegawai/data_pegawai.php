<?php
    include 'koneksi.php';

    $hasil = mysqli_query($koneksi, "
        SELECT p.*, d.nama_departemen 
        FROM tbl_pegawai p
        JOIN tbl_departemen d ON p.departemen_id = d.id
        ORDER BY p.nip ASC
    ");
    $no = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>App Pegawai</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pegawai</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <a href="index.php?page=pegawai/add_data_pegawai" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Data Pegawai</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">No.</th>
                                            <th class="text-center align-middle">NIP</th>
                                            <th class="text-center align-middle">Nama Pegawai</th>
                                            <th class="text-center align-middle">Departemen</th>
                                            <th class="text-center align-middle">Tipe Kontrak</th>
                                            <th class="text-center align-middle">Tanggal Awal Kontrak</th>
                                            <th class="text-center align-middle">Tanggal Akhir Kontrak</th>
                                            <th class="text-center align-middle">Email</th>
                                            <th class="text-center align-middle">No. Handphone</th>
                                            <th class="text-center align-middle">Alamat</th>
                                            <th class="text-center align-middle">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(mysqli_num_rows($hasil) > 0) {
                                            while ($row = mysqli_fetch_array
                                            ($hasil)) {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $row['nip'] ?></td>
                                            <td><?= $row['nama_pegawai'] ?></td>
                                            <td><?= $row['nama_departemen'] ?></td>
                                            <td class="text-center"><?= $row['tipe_kontrak'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($row['tanggal_kontrak_awal'])) ?></td>
                                            <td>
                                                <?= !empty($row['tanggal_kontrak_akhir']) ? date('d-m-Y', strtotime($row['tanggal_kontrak_akhir'])) : '-' ?>
                                            </td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['no_hp'] ?></td>
                                            <td><?= $row['alamat'] ?></td>
                                            <td class="text-center">
                                                <a href="index.php?page=pegawai/edit_data_pegawai&id=<?= $row['id'] ?>" class="btn btn-warning btn-icon-split mb-1">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>
                                                <a href="index.php?page=pegawai/proses_delete_data_pegawai&id=<?= $row['id'] ?>" class="btn btn-danger btn-icon-split"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus pegawai <?= $row['nama_pegawai'] ?>?')">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Hapus</span>
                                                </a>
                                            </td>
                                        </tr>
                                            <?php
                                                    }
                                                } else {
                                            ?>
                                            <tr>
                                                <td colspan="8">Tidak Ada Data Pegawai</td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>