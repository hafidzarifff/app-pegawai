<?php
    include 'koneksi.php';

    // Jumlah Pegawai Aktif
    $queryAktif = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tbl_pegawai WHERE tanggal_kontrak_akhir IS NULL OR tanggal_kontrak_akhir >= CURDATE()");
    $dataAktif = mysqli_fetch_assoc($queryAktif);

    // Jumlah Departemen
    $queryDept = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tbl_departemen");
    $dataDept = mysqli_fetch_assoc($queryDept);

    // Kontrak Akan Berakhir (dalam 30 hari ke depan)
    $queryAkanBerakhir = mysqli_query($koneksi, "
        SELECT COUNT(*) as total FROM tbl_pegawai 
        WHERE tanggal_kontrak_akhir IS NOT NULL 
        AND tanggal_kontrak_akhir BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY)
    ");
    $dataAkanBerakhir = mysqli_fetch_assoc($queryAkanBerakhir);

    // Kontrak Sudah Berakhir
    $queryBerakhir = mysqli_query($koneksi, "
        SELECT COUNT(*) as total FROM tbl_pegawai 
        WHERE tanggal_kontrak_akhir IS NOT NULL 
        AND tanggal_kontrak_akhir < CURDATE()
    ");
    $dataBerakhir = mysqli_fetch_assoc($queryBerakhir);

    // Query untuk mendapatkan jumlah peningkatan karyawan per tahun
    $queryPeningkatan = "SELECT YEAR(tanggal_kontrak_awal) AS tahun, COUNT(*) AS jumlah 
          FROM tbl_pegawai 
          GROUP BY YEAR(tanggal_kontrak_awal) 
          ORDER BY tahun ASC";

    $hasilPeningkatan = mysqli_query($koneksi, $queryPeningkatan);

    $tahuPeningkatann = [];
    $jumlahPeningkatan = [];

    while ($row = mysqli_fetch_assoc($hasilPeningkatan)) {
        $tahunPeningkatan[] = $row['tahun'];
        $jumlahPeningkatan[] = $row['jumlah'];
    }

    // Query untuk mendapatkan jumlah pegawai per departemen
    $queryDeptPegawai = "SELECT d.nama_departemen, COUNT(p.id) AS jumlah 
            FROM tbl_pegawai p 
            JOIN tbl_departemen d ON p.departemen_id = d.id 
            GROUP BY d.nama_departemen";

    $hasilDeptPegawai = mysqli_query($koneksi, $queryDeptPegawai);

    $departemenDeptPegawai = [];
    $jumlahDeptPegawai = [];

    while ($row = mysqli_fetch_assoc($hasilDeptPegawai)) {
        $departemenDeptPegawai[] = $row['nama_departemen'];
        $jumlahDeptPegawai[] = $row['jumlah'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>App Pegawai - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-grey-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Pegawai Aktif
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dataAktif['total'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Departemen</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dataDept['total'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-building fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Kontrak Pegawai Akan Berakhir
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $dataAkanBerakhir['total'] ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-clock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Kontrak Pegawai Berakhir
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dataBerakhir['total'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-times fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row mb-5">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4 h-100">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Penigkatan Jumlah Pegawai</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="myAreaChart">
                                    </canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4 h-100">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pegawai Tiap Departemen</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="myPieChart">
                                    </canvas>
                                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- JS Peningkatan Jumlah Karyawan -->
    <script>
        // Ambil data dari PHP ke JavaScript
        const tahun = <?= json_encode($tahunPeningkatan); ?>;
        const jumlah = <?= json_encode($jumlahPeningkatan); ?>;

        const ctx = document.getElementById('myAreaChart').getContext('2d');
        const myAreaChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: tahun,
                datasets: [{
                    label: 'Jumlah Pegawai',
                    data: jumlah,
                    backgroundColor: 'rgba(78, 114, 223, 0.1)',
                    borderColor: 'rgba(78, 115, 223, 1)',
                    borderWidth: 3,
                    pointRadius: 3,
                    pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                    pointBorderColor: 'rgba(78, 115, 223, 1)',
                    fill: true,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Pegawai'
                        },
                        ticks: {
                            precision: 0
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tahun'
                        }
                    }
                }
            }
        });
    </script>

    <!-- JS Jumlah Karyawan Tiap Departemen -->
    <script>
        const departemen = <?= json_encode($departemenDeptPegawai); ?>;
        const jumlahDepartemen = <?= json_encode($jumlahDeptPegawai); ?>;

        const ctxPie = document.getElementById('myPieChart').getContext('2d');
        const myPieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: departemen,
                datasets: [{
                    data: jumlahDepartemen,
                    backgroundColor: [
                        'rgba(78, 115, 223, 0.5)',
                        'rgba(28, 200, 138, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(255, 205, 86, 0.5)',
                        'rgba(54, 162, 235, 0.5)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    </script>

</body>

</html>