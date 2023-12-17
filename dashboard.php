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
    <iframe title="GlobalTech" width="100%" height="100%" src="https://app.powerbi.com/view?r=eyJrIjoiNWU4NDQ5YzItMWZhNy00YjUyLThmMDUtNGFhNDM3ODhjMDNlIiwidCI6IjUyNjNjYzgxLTU5MTItNDJjNC1hYmMxLWQwZjFiNjY4YjUzMCIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe>
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