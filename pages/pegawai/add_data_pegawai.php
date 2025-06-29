<?php
    include 'koneksi.php';
    $hasil_departemen = mysqli_query($koneksi, "SELECT * FROM tbl_departemen ORDER BY nama_departemen ASC");
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
                            <form class="form-row" method="POST" action="index.php?page=pegawai/proses_add_data_pegawai">
                                <div class="mb-4 col-12">
                                    <label for="nip" class="form-label">NIP</label>
                                    <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP">
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                                    <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Masukkan Nama Pegawai">
                                </div>

                                <div class="col-md-6">
                                    <label for="departemen_id">Departemen</label>
                                    <select class="form-control" id="departemen_id" name="departemen_id">
                                        <option>-- Pilih Departemen --</option>
                                        <?php
                                        if(mysqli_num_rows($hasil_departemen) > 0) {
                                                while ($row = mysqli_fetch_array
                                                ($hasil_departemen)) {
                                        ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['nama_departemen'] ?></option>
                                        <?php
                                            }
                                            } else {
                                        ?>
                                        <option>-- Tidak Ada Data Departemen --</option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="tipe_kontrak">Tipe Kontrak</label>
                                    <select class="form-control" id="tipe_kontrak" name="tipe_kontrak">
                                        <option>-- Pilih Tipe Kontrak --</option>
                                        <option>Tetap</option>
                                        <option>Kontrak</option>
                                    </select>
                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="tanggal_kontrak_awal" class="form-label">Tanggal Kontrak Awal</label>
                                    <input type="date" class="form-control" name="tanggal_kontrak_awal" id="tanggal_kontrak_awal" placeholder="Masukkan Tanggal Kontrak Awal">
                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="tanggal_kontrak_akhir" class="form-label">Tanggal Kontrak Akhir</label>
                                    <input type="date" class="form-control" name="tanggal_kontrak_akhir" id="tanggal_kontrak_akhir" placeholder="Masukkan Tanggal Kontrak Akhir">
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control"  name="email" id="email" placeholder="Masukkan Email">
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="no_hp" class="form-label">No. Handphone</label>
                                    <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan No. Handphone">
                                </div>

                                <div class="mb-4 col-12">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" cols="100" rows="5" placeholder="Masukkan Alamat"></textarea>
                                </div>
                                
                                <div class="col-12">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Simpan Data">

                                    <a class="btn btn-danger ml-1" href="index.php?page=pegawai/data_pegawai">Batal</a>
                                </div>
                            </form>
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