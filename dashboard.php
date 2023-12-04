<?php
// session_start();
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/icon.png">
  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body id="page-top">

  <!-- alert login berhasil -->
  <script>
    // Periksa jika variabel sesi 'alert_shown' telah diatur
    var alertShown = '<?php echo isset($_SESSION['alert_shown']) ? $_SESSION['alert_shown'] : '' ?>';

    // Tampilkan Sweet Alert jika belum pernah ditampilkan sebelumnya
    if (!alertShown) {
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "success",
        title: "Anda telah berhasil login"
      });

      // Setel variabel sesi 'alert_shown' ke true
      <?php $_SESSION['alert_shown'] = true; ?>
    }
  </script>

  <?php
  require('koneksi.php');
  require('sidebar.php');

  $karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan");
  $karyawan = mysqli_num_rows($karyawan);

  $pengeluaran_hari_ini = mysqli_query($koneksi, "SELECT SUM(total) FROM pengeluaran where tgl_pengeluaran = CURDATE()");
  $pengeluaran_hari_ini = mysqli_fetch_array($pengeluaran_hari_ini);

  $pemasukan_hari_ini = mysqli_query($koneksi, "SELECT SUM(sub_total) FROM pemasukan where tgl_pemasukan = CURDATE()");
  $pemasukan_hari_ini = mysqli_fetch_array($pemasukan_hari_ini);


  //grafik perbandingan//
  $pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan");
  while ($masuk = mysqli_fetch_array($pemasukan)) {
    $arraymasuk[] = $masuk['sub_total'];
  }
  $jumlahmasuk = array_sum($arraymasuk);


  $pengeluaran = mysqli_query($koneksi, "SELECT * FROM pengeluaran");
  while ($keluar = mysqli_fetch_array($pengeluaran)) {
    $arraykeluar[] = $keluar['total'];
  }
  $jumlahkeluar = array_sum($arraykeluar);

  //pendapatan bersih//
  if (isset($_GET['tanggal'])) {
    // Ambil tanggal yang dipilih dari form
    $tanggal_dipilih = $_GET['tanggal'];

    // Perhitungan pendapatan bersih berdasarkan tanggal yang dipilih
    $pemasukan_hari_ini = mysqli_query($koneksi, "SELECT SUM(sub_total) FROM pemasukan WHERE tgl_pemasukan = '$tanggal_dipilih'");
    $pemasukan_hari_ini = mysqli_fetch_array($pemasukan_hari_ini);

    $pengeluaran_hari_ini = mysqli_query($koneksi, "SELECT SUM(total) FROM pengeluaran WHERE tgl_pengeluaran = '$tanggal_dipilih'");
    $pengeluaran_hari_ini = mysqli_fetch_array($pengeluaran_hari_ini);

    // Hitung pendapatan bersih berdasarkan tanggal yang dipilih
    // $uang = $pemasukan_hari_ini['0'] - $pengeluaran_hari_ini['0'];
    if (isset($pemasukan_hari_ini['0']) && isset($pengeluaran_hari_ini['0'])) {
      $uang = $pemasukan_hari_ini['0'] - $pengeluaran_hari_ini['0'];
    } else {
      $uang = 0;
    }
  }
  $pendapatan_bersih = $jumlahmasuk - $jumlahkeluar;
  // $pendapatan_bersih = $pemasukan_hari_ini['0'] - $pengeluaran_hari_ini['0'];
  
  //grafik perbulan//
  if (isset($_GET['tanggal'])) {
    // Ambil tanggal yang dipilih dari form
    $tanggal_dipilih = $_GET['tanggal'];

    // Ganti query untuk mengambil data pendapatan per bulan berdasarkan filter tanggal yang dipilih
    $pemasukan_bulan_ini = mysqli_query($koneksi, "SELECT MONTH(tgl_pemasukan) as bulan, SUM(sub_total) as total FROM pemasukan WHERE YEAR(tgl_pemasukan) = YEAR('$tanggal_dipilih') AND MONTH(tgl_pemasukan) = MONTH('$tanggal_dipilih') GROUP BY MONTH(tgl_pemasukan)");
    $data_pendapatan_bulan = array_fill(0, 12, 0); // Inisialisasi array untuk menyimpan pendapatan per bulan
  
    while ($row = mysqli_fetch_assoc($pemasukan_bulan_ini)) {
      $bulan = intval($row['bulan']) - 1; // Mengonversi bulan ke indeks array
      $data_pendapatan_bulan[$bulan] = $row['total'];
    }

    $pengeluaran_bulan_ini = mysqli_query($koneksi, "SELECT MONTH(tgl_pengeluaran) as bulan, SUM(total) as total FROM pengeluaran WHERE YEAR(tgl_pengeluaran) = YEAR('$tanggal_dipilih') AND MONTH(tgl_pengeluaran) = MONTH('$tanggal_dipilih') GROUP BY MONTH(tgl_pengeluaran)");
    $data_pengeluaran_bulan = array_fill(0, 12, 0); // Inisialisasi array untuk menyimpan pengeluaran per bulan
  
    while ($row = mysqli_fetch_assoc($pengeluaran_bulan_ini)) {
      $bulan = intval($row['bulan']) - 1; // Mengonversi bulan ke indeks array
      $data_pengeluaran_bulan[$bulan] = $row['total'];
    }

    // Atur label bulan untuk sumbu x
    $labels_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
  } else {
    // Jika tidak ada permintaan filter, tampilkan data default (misalnya, bulan ini)
    // ...
  }

  ?>
  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Search -->
      <h1> Selamat Datang,
        <?= $_SESSION['nama'] ?>
      </h1>

      <?php require 'user.php'; ?>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      </div>

      <!-- form untuk filter tanggal -->
      <form class="form-filter d-inline" method="GET" action="" onsubmit="return validateForm()">
        <label for="tanggal">Pilih Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal">
        <button type="submit">Filter</button>
      </form>

      <!-- js untuk apakah input tanggal telah diisi sebelum mengirimkan formulir  -->
      <script>
        function validateForm() {
          var tanggal = document.getElementById('tanggal').value;
          if (tanggal === '') {
            // Menampilkan Sweet Alert jika tanggal tidak dipilih
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Harap pilih tanggal terlebih dahulu.',
              timer: 2000, // Durasi toast 3 detik
              timerProgressBar: true,
              toast: true,
              position: 'top',
              showConfirmButton: false,
              showCloseButton: true,
              didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
              }
            });
            return false; // Menghentikan pengiriman formulir jika tanggal tidak dipilih
          }
          return true; // Lanjutkan pengiriman formulir jika tanggal sudah dipilih
        }
      </script>

      <style>
        /* Style untuk form */
        form {
          position: absolute;
          top: 90px;
          right: 20px;
          /* display: flex; */
          /* flex-direction: column; */
          max-width: 300px;
        }

        label {
          margin-bottom: 5px;
          font-weight: bold;
        }

        input[type="date"] {
          padding: 8px;
          margin-bottom: 15px;
          border-radius: 5px;
          border: 1px solid #ccc;
          font-size: 14px;
        }

        button[type="submit"] {
          padding: 10px;
          border: none;
          border-radius: 5px;
          background-color: #4e73df;
          color: #fff;
          font-size: 14px;
          cursor: pointer;
          transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
          background-color: #2e59d9;
        }
      </style>


      <?php
      // Periksa apakah ada permintaan filter tanggal
      if (isset($_GET['tanggal'])) {
        // Ambil tanggal yang dipilih dari form
        $tanggal_dipilih = $_GET['tanggal'];

        // Gunakan tanggal yang dipilih untuk mengambil data dari database
        $pemasukan_hari_ini = mysqli_query($koneksi, "SELECT SUM(sub_total) FROM pemasukan WHERE DATE(tgl_pemasukan) = '$tanggal_dipilih'");
        $pemasukan_hari_ini = mysqli_fetch_array($pemasukan_hari_ini);

        $pengeluaran_hari_ini = mysqli_query($koneksi, "SELECT SUM(total) FROM pengeluaran WHERE DATE(tgl_pengeluaran) = '$tanggal_dipilih'");
        $pengeluaran_hari_ini = mysqli_fetch_array($pengeluaran_hari_ini);

        // ... (Lakukan hal serupa untuk bagian lain yang memerlukan filter tanggal)
      
      } else {
        $tanggal_dipilih = date('Y-m-d');
        // Jika tidak ada permintaan filter, tampilkan data default (misalnya, hari ini)
        $pemasukan_hari_ini = mysqli_query($koneksi, "SELECT SUM(sub_total) FROM pemasukan WHERE tgl_pemasukan = CURDATE()");
        $pemasukan_hari_ini = mysqli_fetch_array($pemasukan_hari_ini);

        $pengeluaran_hari_ini = mysqli_query($koneksi, "SELECT SUM(total) FROM pengeluaran WHERE tgl_pengeluaran = CURDATE()");
        $pengeluaran_hari_ini = mysqli_fetch_array($pengeluaran_hari_ini);

        // ... (Lakukan hal serupa untuk bagian lain jika diperlukan)
      
      }
      ?>


      <!-- Content Row -->
      <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan (Hari Ini)</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                    <?= $pemasukan_hari_ini['0'] == null ? 0 : number_format($pemasukan_hari_ini['0'], 2, ',', '.') ?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div> &nbsp Total : Rp.
            <?php
            echo number_format($jumlahmasuk, 2, ',', '.');
            ?>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengeluaran (Hari Ini)</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                    <?= $pengeluaran_hari_ini['0'] == null ? 0 : number_format($pengeluaran_hari_ini['0'], 2, ',', '.') ?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
              </div>
            </div> &nbsp Total : Rp.
            <?php
            echo number_format($jumlahkeluar, 2, ',', '.');
            ?>
          </div>
        </div>

        <!-- pendapatan bersih -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pendapatan bersih</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp.
                        <?php echo number_format(isset($uang) ? $uang : 0, 2, ',', '.'); ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div> &nbsp Total : Rp.
            <?php
            echo number_format($pendapatan_bersih, 2, ',', '.');
            ?>
          </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Karyawan</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?= $karyawan ?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Content Row -->

      <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Pendapatan Per Bulan</h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                  aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Dropdown Header:</div>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Perbandingan</h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                  aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Dropdown Header:</div>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>

            <!-- Card Body -->
            <div class="card-body">
              <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"></canvas>
              </div>
              <div class="mt-4 text-center small">
                <span class="mr-2">
                  <i class="fas fa-circle text-primary"></i> Pendapatan
                </span>
                <span class="mr-2">
                  <i class="fas fa-circle text-danger"></i> Pengeluaran
                </span>
                <span class="mr-2">
                  <i class="fas fa-circle text-info"></i> Sisa
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Area Chart Pengeluaran Per Bulan -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Pengeluaran Per Bulan</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="myAreaChartPengeluaranBulan"></canvas>
            </div>
          </div>
        </div>
      </div>



    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <?php require 'footer.php' ?>

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php require 'logout-modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
      // *     example: number_format(1234.56, 2, ',', ' ');
      // *     return: '1 234,56'
      number = (number + '').replace(',', '').replace(' ', '');
      var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
          var k = Math.pow(10, prec);
          return '' + Math.round(n * k) / k;
        };
      // Fix for IE parseFloat(0.55).toFixed(0) = 0;
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      return s.join(dec);
    }

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: <?= json_encode($labels_bulan); ?>, // Menggunakan label bulan
        datasets: [{
          label: "Pendapatan per Bulan",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: <?= json_encode($data_pendapatan_bulan); ?>, // Data pendapatan dari PHP
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function (value, index, values) {
                return 'Rp.' + number_format(value);
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function (tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
            }
          }
        }
      }
    });
  </script>

  <script type="text/javascript">
    // Area Chart Pengeluaran Per Bulan
    var ctx = document.getElementById("myAreaChartPengeluaranBulan");
    var myLineChartPengeluaranBulan = new Chart(ctx, {
      type: 'line',
      data: {
        labels: <?= json_encode($labels_bulan); ?>, // Label bulan
        datasets: [{
          label: "Pengeluaran per Bulan",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: <?= json_encode($data_pengeluaran_bulan); ?>, // Data pengeluaran per bulan
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function (value, index, values) {
                return 'Rp.' + number_format(value);
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function (tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
            }
          }
        }
      }
    });
  </script>

  <script type="text/javascript">

    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';
    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Pendapatan", "Pengeluaran", "Sisa"],
        datasets: [{
          data: [<?php echo $jumlahmasuk / 1000000 ?>, <?php echo $jumlahkeluar / 1000000 ?>, <?php echo $pendapatan_bersih / 1000000 ?>],
          backgroundColor: ['#4e73df', '#e74a3b', '#36b9cc'],
          hoverBackgroundColor: ['#2e59d9', '#e74a3b', '#2c9faf'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
  </script>

</body>

</html>