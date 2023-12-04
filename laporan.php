<?php
require 'cek-sesi.php';

// Tangkap nilai tanggal dari formulir jika disubmit
$tanggal_awal = isset($_POST['tanggal_awal']) ? $_POST['tanggal_awal'] : date('Y-m-d', strtotime('-7 days'));
$tanggal_akhir = isset($_POST['tanggal_akhir']) ? $_POST['tanggal_akhir'] : date('Y-m-d');

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
  <title>Laporan Keuangan</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php
  require 'koneksi.php';
  require 'sidebar.php'; ?>

  <!-- Main Content -->
  <div id="content">

    <?php require 'navbar.php'; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data Laporan Keuangan</h6>
          <a id="downloadButton3" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right  text-white">
            <i class="fas fa-download fa-sm text-white"></i> Download Laporan
          </a>
        </div>

        <div class="card-body">
          <!-- Formulir Filter Tanggal -->
          <form method="post" class="mb-4 form-inline">
            <div class="form-group mr-2">
              <label for="tanggal_awal">Tanggal Awal</label>
              <input type="date" id="tanggal_awal" name="tanggal_awal" class="form-control ml-2"
                value="<?= $tanggal_awal ?>">
            </div>
            <div class="form-group mr-2">
              <label for="tanggal_akhir">Tanggal Akhir</label>
              <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control ml-2"
                value="<?= $tanggal_akhir ?>">
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
          </form>

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Jumlah Transaksi </th>
                  <th>Jumlah Total Uang</th>
                  <th>Download</th>
                </tr>
              </thead>
              <tfoot>
              </tfoot>
              <tbody>
                <?php
                // Filter pemasukan berdasarkan tanggal
                $pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE tgl_pemasukan BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
                while ($masuk = mysqli_fetch_array($pemasukan)) {
                  $arraymasuk[] = $masuk['sub_total'];
                }
                $jumlahmasuk = (!empty($arraymasuk)) ? array_sum($arraymasuk) : 0;

                // Filter pengeluaran berdasarkan tanggal
                $pengeluaran = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE tgl_pengeluaran BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
                while ($keluar = mysqli_fetch_array($pengeluaran)) {
                  $arraykeluar[] = $keluar['total'];
                }
                $jumlahkeluar = (!empty($arraykeluar)) ? array_sum($arraykeluar) : 0;

                $query1 = mysqli_query($koneksi, "SELECT id_pemasukan FROM pemasukan WHERE tgl_pemasukan BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
                $query1 = mysqli_num_rows($query1);

                $query2 = mysqli_query($koneksi, "SELECT id_pengeluaran FROM pengeluaran WHERE tgl_pengeluaran BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
                $query2 = mysqli_num_rows($query2);
                $no = 1;
                ?>
                <tr>
                  <td>Pemasukan</td>
                  <td>
                    <?= $query1 ?>
                  </td>
                  <td>Rp.
                    <?= number_format($jumlahmasuk, 2, ',', '.'); ?>
                  </td>
                  <td><a id="downloadButton" type="button" class="btn btn-primary btn-md"><i
                        class="fa fa-download text-white"></i></a></td>
                </tr>

                <tr>
                  <td>Pengeluaran</td>
                  <td>
                    <?= $query2 ?>
                  </td>
                  <td>Rp.
                    <?= number_format($jumlahkeluar, 2, ',', '.'); ?>
                  </td>
                  <td><a id="downloadButton2" type="button" class="btn btn-primary btn-md"><i
                        class="fa fa-download text-white"></i></a></td>
                </tr>
              </tbody>
            </table>
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

  <!-- Logout Modal-->
  <?php require 'logout-modal.php'; ?>

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

  <!-- Tambahkan script ini di bagian head atau sebelum </body> -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Temukan tombol download
      var downloadButton = document.querySelector("#downloadButton");

      // Tambahkan event listener untuk peristiwa klik
      downloadButton.addEventListener("click", function () {
        // Dapatkan nilai dari input tanggal
        var tanggalAwal = document.getElementById("tanggal_awal").value;
        var tanggalAkhir = document.getElementById("tanggal_akhir").value;

        // Bentuk URL dengan parameter tanggal_awal dan tanggal_akhir
        var url = "export-pemasukan.php?tanggal_awal=" + tanggalAwal + "&tanggal_akhir=" + tanggalAkhir;

        // Buka halaman export-pemasukan.php dengan parameter tanggal
        window.location.href = url;
      });
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Temukan tombol download
      var downloadButton = document.querySelector("#downloadButton2");

      // Tambahkan event listener untuk peristiwa klik
      downloadButton.addEventListener("click", function () {
        // Dapatkan nilai dari input tanggal
        var tanggalAwal = document.getElementById("tanggal_awal").value;
        var tanggalAkhir = document.getElementById("tanggal_akhir").value;

        // Bentuk URL dengan parameter tanggal_awal dan tanggal_akhir
        var url = "export-pengeluaran.php?tanggal_awal=" + tanggalAwal + "&tanggal_akhir=" + tanggalAkhir;

        // Buka halaman export-pemasukan.php dengan parameter tanggal
        window.location.href = url;
      });
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Temukan tombol download
      var downloadButton = document.querySelector("#downloadButton3");

      // Tambahkan event listener untuk peristiwa klik
      downloadButton.addEventListener("click", function () {
        // Dapatkan nilai dari input tanggal
        var tanggalAwal = document.getElementById("tanggal_awal").value;
        var tanggalAkhir = document.getElementById("tanggal_akhir").value;

        // Bentuk URL dengan parameter tanggal_awal dan tanggal_akhir
        var url = "export-semua.php?tanggal_awal=" + tanggalAwal + "&tanggal_akhir=" + tanggalAkhir;

        // Buka halaman export-pemasukan.php dengan parameter tanggal
        window.location.href = url;
      });
    });
  </script>

</body>

</html>