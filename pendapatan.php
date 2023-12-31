<?php
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
  <title>Pendapatan</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- link alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body id="page-top">

  <?php
  require 'koneksi.php';
  require('sidebar.php'); ?>
  <!-- Main Content -->
  <div id="content">

    <?php require('navbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Content Row -->
      <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

          <!-- Project Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Sumber Pendapatan</h6>
            </div>
            <div class="card-body">
              <?php
              $namasumber1 = mysqli_query($koneksi, "SELECT * FROM `sumber` where id_sumber= 1 ");
              $sumbern1 = mysqli_fetch_assoc($namasumber1);

              $namasumber2 = mysqli_query($koneksi, "SELECT * FROM `sumber` where id_sumber= 2 ");
              $sumbern2 = mysqli_fetch_assoc($namasumber2);

              $namasumber3 = mysqli_query($koneksi, "SELECT * FROM `sumber` where id_sumber= 3 ");
              $sumbern3 = mysqli_fetch_assoc($namasumber3);

              $hasil1 = mysqli_query($koneksi, "SELECT * FROM pemasukan where id_sumber = 1");
              while ($jumlah1 = mysqli_fetch_array($hasil1)) {
                $arrayhasil1[] = $jumlah1['sub_total'];
              }
              $jumlahhasil1 = array_sum($arrayhasil1);

              $hasil2 = mysqli_query($koneksi, "SELECT * FROM pemasukan where id_sumber = 2");
              while ($jumlah2 = mysqli_fetch_array($hasil2)) {
                $arrayhasil2[] = $jumlah2['sub_total'];
              }
              $jumlahhasil2 = array_sum($arrayhasil2);

              $hasil3 = mysqli_query($koneksi, "SELECT * FROM pemasukan where id_sumber = 3");
              while ($jumlah3 = mysqli_fetch_array($hasil3)) {
                $arrayhasil3[] = $jumlah3['sub_total'];
              }

              $jumlahhasil3 = array_sum($arrayhasil3);

              $sumber1 = mysqli_query($koneksi, "SELECT id_sumber FROM pemasukan where id_sumber ='1'");
              $sumber1text = mysqli_num_rows($sumber1);
              $sumber1 = mysqli_num_rows($sumber1);
              $sumber1 = $sumber1 * 10;

              $sumber2 = mysqli_query($koneksi, "SELECT id_sumber FROM pemasukan where id_sumber ='2'");
              $sumber2text = mysqli_num_rows($sumber2);
              $sumber2 = mysqli_num_rows($sumber2);
              $sumber2 = $sumber2 * 10;

              $sumber3 = mysqli_query($koneksi, "SELECT id_sumber FROM pemasukan where id_sumber ='3'");
              $sumber3text = mysqli_num_rows($sumber3);
              $sumber3 = mysqli_num_rows($sumber3);
              $sumber3 = $sumber3 * 10;

              $no = 1;
              echo '
                <h4 class="small font-weight-bold">' . $sumbern1['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil1, 2, ',', '.') . '</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width:' . $sumber1 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber1text . ' Kali</div>
                  </div>
				        <h4 class="small font-weight-bold">' . $sumbern2['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil2, 2, ',', '.') . '</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width:' . $sumber2 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber2text . ' Kali</div>
                  </div>
				        <h4 class="small font-weight-bold">' . $sumbern3['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil3, 2, ',', '.') . '</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width:' . $sumber3 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber3text . ' Kali</div>
                  </div>';
              ?>
            </div>
          </div>
        </div>

        <div class="col-xl-12 col-lg-7">
          <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal"
            data-target="#myModalTambah"><i class="fa fa-plus"> Pemasukan</i></button><br>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Transaksi Masuk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Material</th>
                      <th>Jumlah</th>
                      <th>Sumber</th>
                      <th>Customer</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <!-- query tampil -->
                    <?php
                    $query = mysqli_query($koneksi, "SELECT pemasukan.id_pemasukan, pemasukan.tgl_pemasukan, pemasukan.nama_material, pemasukan.sub_total, sumber.nama, customer.nama_customer FROM pemasukan INNER JOIN customer ON pemasukan.id_customer = customer.id_customer INNER JOIN sumber ON pemasukan.id_sumber = sumber.id_sumber");
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                        <td>
                          <?= $data['id_pemasukan'] ?>
                        </td>
                        <td>
                          <?= $data['tgl_pemasukan'] ?>
                        </td>
                        <td>
                          <?= $data['nama_material'] ?>
                        </td>
                        <td>Rp.
                          <?= number_format($data['sub_total'], 2, ',', '.'); ?>
                        </td>
                        <td>
                          <?= $data['nama'] ?>
                        </td>
                        <td>
                          <?= $data['nama_customer'] ?>
                        </td>

                        <!-- Button edit modal -->
                        <td>
                          <a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal"
                            data-target="#myModal<?php echo $data['id_pemasukan']; ?>"></a>
                        </td>
                      </tr>
                      <!-- Modal Edit Mahasiswa-->
                      <div class="modal fade" id="myModal<?php echo $data['id_pemasukan']; ?>" role="dialog">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Ubah Data Pemasukan</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">

                              <form role="form" action="proses-edit-pemasukan.php" method="get">
                                <?php
                                $id = $data['id_pemasukan'];
                                $query_edit = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE id_pemasukan='$id'");
                                //$result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($query_edit)) {
                                  ?>

                                  <input type="hidden" name="id_pemasukan" value="<?php echo $row['id_pemasukan']; ?>">

                                  <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" name="tgl_pemasukan" class="form-control"
                                      value="<?php echo $row['tgl_pemasukan']; ?>">
                                  </div>

                                  <div class="form-group">
                                    <label>Material</label>
                                    <input type="text" name="nama_material" class="form-control"
                                      value="<?php echo $row['nama_material']; ?>">
                                  </div>

                                  <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="text" name="sub_total" class="form-control"
                                      value="<?= number_format($row['sub_total']); ?>">
                                  </div>

                                  <div class="form-group">
                                    <label>Sumber</label>
                                    <select class="form-control" id="searchSumber" name="id_sumber"
                                      onchange="searchSumber()">
                                      <option value="">Pilih Sumber</option>
                                      <?php
                                      $querySumber = mysqli_query($koneksi, "SELECT * FROM sumber");
                                      while ($sumber = mysqli_fetch_assoc($querySumber)) {
                                        ?>
                                        <option <?php echo $row['id_sumber'] == $sumber["id_sumber"] ? 'selected' : '' ?>
                                          value="<?php echo $sumber["id_sumber"] ?>">
                                          <?php echo $sumber["nama"] ?>
                                        </option>
                                        <?php
                                      }
                                      ?>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label>Customer</label>
                                    <select class="form-control" id="searchSumber" name="id_customer"
                                      onchange="searchSumber()">
                                      <option value="">Pilih Customer</option>
                                      <?php
                                      $queryCustomer = mysqli_query($koneksi, "SELECT * FROM customer");
                                      while ($customer = mysqli_fetch_assoc($queryCustomer)) {
                                        ?>
                                        <option <?php echo $row['id_customer'] == $customer["id_customer"] ? 'selected' : '' ?>
                                          value="<?php echo $customer["id_customer"] ?>">
                                          <?php echo $customer["nama_customer"] ?>
                                        </option>
                                        <?php
                                      }
                                      ?>
                                    </select>
                                  </div>

                                  <div class="modal-footer">
                                    <button type="submit" id="ubahtombol" class="btn btn-success">Ubah</button>
                                    <button type="button" id="hapus-btn" class="btn btn-danger"
                                      onclick="deleteConfirm(<?= $row['id_pemasukan']; ?>)">Hapus</button>
                                    <a id="delete-link-<?= $row['id_pemasukan']; ?>"
                                      href="hapus-pemasukan.php?id_pemasukan=<?= $row['id_pemasukan']; ?>"></a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                  </div>
                                  <?php
                                }
                                //mysql_close($host); id_pemasukan
                                ?>

                              </form>
                            </div>
                          </div>

                        </div>
                      </div>



                      <!-- Modal tambah -->
                      <div id="myModalTambah" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                          <!-- konten modal-->
                          <div class="modal-content">
                            <!-- heading modal -->
                            <div class="modal-header">
                              <h4 class="modal-title">Tambah Pendapatan</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- body modal -->
                            <form id="formTambahKaryawan" action="tambah-pendapatan.php" method="get">
                              <div class="modal-body">
                                Tanggal :
                                <input type="date" class="form-control" name="tgl_pemasukan">
                                Material :
                                <input type="text" class="form-control" name="nama_material">
                                Jumlah :
                                <input type="number" class="form-control" name="sub_total">
                                <div class="form-group">
                                  <label>Sumber :</label>
                                  <select class="form-control" id="searchSumber" name="sumber" onchange="searchSumber()">
                                    <option value="">Pilih Sumber</option>
                                    <?php
                                    $querySumber = mysqli_query($koneksi, "SELECT * FROM sumber");
                                    while ($sumber = mysqli_fetch_assoc($querySumber)) {
                                      echo '<option value="' . $sumber["id_sumber"] . '">' . $sumber["nama"] . '</option>';
                                    }
                                    ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Customer :</label>
                                  <select class="form-control" id="searchSumber" name="customer"
                                    onchange="searchSumber()">
                                    <option value="">Pilih Customer</option>
                                    <?php
                                    $querySupplier = mysqli_query($koneksi, "SELECT * FROM customer");
                                    while ($supplier = mysqli_fetch_assoc($querySupplier)) {
                                      echo '<option value="' . $supplier["id_customer"] . '">' . $supplier["nama_customer"] . '</option>';
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <!-- footer modal -->
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-success"
                                  onclick="return validateFormTambah()">Tambah</button>
                            </form>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                          </div>
                        </div>

                      </div>
                </div>


                <?php
                    }
                    ?>
              </tbody>
              </table>
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

  <!-- alert insert sukses -->
  <?php
  if (isset($_SESSION['insert-sukses']) && $_SESSION['insert-sukses'] == true) {
    ?>
    <script>
      // Sisipkan skrip JavaScript untuk menangani klik tombol Tambah
      Swal.fire({
        title: 'Sukses',
        text: 'Data pemasukan telah berhasil ditambahkan.',
        icon: 'success',
        confirmButtonText: 'OK',
      }).then((result) => {
        if (result.isConfirmed) {
          // Redirect atau lakukan tindakan lain jika perlu setelah OK diklik
          window.location.href = 'pendapatan.php';
        }
      });
    </script>
    <?php
    $_SESSION['insert-sukses'] = false;
  }
  ?>

  <!-- alert edit sukses -->
  <?php
  if (isset($_SESSION['edit-sukses']) && $_SESSION['edit-sukses'] == true) {
    ?>
    <script>
      // Sisipkan skrip JavaScript untuk menangani klik tombol Tambah
      Swal.fire({
        title: 'Sukses',
        text: 'Data pemasukan telah berhasil diubah.',
        icon: 'success',
        confirmButtonText: 'OK',
      }).then((result) => {
        if (result.isConfirmed) {
          // Redirect atau lakukan tindakan lain jika perlu setelah OK diklik
          window.location.href = 'pendapatan.php';
        }
      });
    </script>
    <?php
    $_SESSION['edit-sukses'] = false;
  }
  ?>
  <!-- alert hapus -->
  <script>
    // Sisipkan skrip JavaScript untuk menangani klik tombol Tambah
    function deleteConfirm(linkn) {

      Swal.fire({
        title: "Apakah anda yakin ingin menghapus?",
        text: "Anda tidak akan dapat mengembalikan ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Hapus"
      }).then((result) => {
        if (result.isConfirmed) {
          localStorage.setItem('swal', true);
          document.querySelector(`#delete-link-${linkn}`).click();
        }
      });
    }
    document.addEventListener("DOMContentLoaded", function () {
      // Code yang ingin dijalankan setelah seluruh HTML telah dimuat
      if (localStorage.getItem('swal') && localStorage.getItem('swal') == 'true') {
        Swal.fire({
          title: "Deleted!",
          text: "Sukses menghapus data.",
          icon: "success"
        })
        localStorage.setItem('swal', false)
      }
    });
  </script>

  <script>
    function validateFormTambah() {
      var tglPemasukan = document.querySelector('#myModalTambah input[name="tgl_pemasukan"]').value;
      var namaMaterial = document.querySelector('#myModalTambah input[name="nama_material"]').value;
      var subTotal = document.querySelector('#myModalTambah input[name="sub_total"]').value;
      var sumber = document.querySelector('#myModalTambah select[name="sumber"]').value;
      var customer = document.querySelector('#myModalTambah select[name="customer"]').value;

      if (tglPemasukan === '' || namaMaterial === '' || subTotal === '' || sumber === '' || customer === '') {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Harap isi semua field terlebih dahulu.',
        });
        return false; // Mencegah pengiriman formulir jika ada field yang kosong
      }
      return true; // Lanjutkan pengiriman formulir jika semua field terisi
    }
  </script>


  <style>
    #dataTable_filter {
      display: flex;
      justify-content: end;
    }
  </style>

</body>

</html>