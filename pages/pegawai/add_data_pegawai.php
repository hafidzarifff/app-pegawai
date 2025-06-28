<?php
include 'koneksi.php';

$hasil = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai ORDER BY nama_pegawai ASC");
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
                    <h1 class="h3 mb-2 text-gray-800">Tambah Data Pegawai</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" action="index.php?page=pegawai/proses_add_data_pegawai">
                                    <div class="mb-3">
                                        <label for="nip" class="form-label">NIP</label>
                                        <input type="text" class="form-control" id="nip" name="nip" id="nip" placeholder="Masukkan NIP">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" id="nama_pegawai" placeholder="Masukkan Nama Pegawai">
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" id="email" placeholder="Masukkan Email">
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">No. Handphone</label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" id="no_hp" placeholder="Masukkan No. Handphone">
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamat" cols="100" rows="5" placeholder="Masukkan Alamat"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_kontrak_awal" class="form-label">Tanggal Kontrak Awal</label>
                                        <input type="date" class="form-control" id="tanggal_kontrak_awal" name="tanggal_kontrak_awal" id="tanggal_kontrak_awal" placeholder="Masukkan Tanggal Kontrak Awal">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_kontrak_akhir" class="form-label">Tanggal Kontrak Akhir</label>
                                        <input type="date" class="form-control" id="tanggal_kontrak_akhir" name="tanggal_kontrak_akhir" id="tanggal_kontrak_akhir" placeholder="Masukkan Tanggal Kontrak Akhir">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_kontrak_akhir" class="form-label">Tanggal Kontrak Akhir</label>
                                        <input type="date" class="form-control" id="tanggal_kontrak_akhir" name="tanggal_kontrak_akhir" id="tanggal_kontrak_akhir" placeholder="Masukkan Tanggal Kontrak Akhir">
                                    </div>

                                    
                                    <!-- <div class="mb-3">
                                        <label class="form-label">Status Pegawai</label>
                                        <div class="dropdown">
                                            <button class="btn btn-info dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                Pilih Status
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                                                <li><a class="dropdown-item" href="#" onclick="selectStatus('Tetap')">Tetap</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="selectStatus('Kontrak')">Kontrak</a></li>
                                            </ul>
                                            <input type="hidden" id="status" name="status">
                                        </div>
                                    </div> -->

                                    <input class="btn btn-primary" type="submit" name="submit" value="Simpan Data">

                                    <a class="btn btn-danger ml-1" href="index.php?page=data_mahasiswa">Batal</a>
                                </form>
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