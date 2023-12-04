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
  <title>Data Karyawan</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- link alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body id="page-top">
  <?php require 'koneksi.php'; ?>
  <?php require 'sidebar.php'; ?>
  <!-- Main Content -->
  <div id="content">

    <?php require 'navbar.php'; ?>
  
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <button type="button"
        style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin:5px;"
        class="btn btn-success" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"></i> Tambah
        Karyawan</button><br>


      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Karyawan</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Posisi</th>
                  <th>Alamat</th>
                  <th>Umur</th>
                  <th>Kontak</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM karyawan");
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                  ?>
                  <tr>
                    <td>
                      <?= $data['id_karyawan'] ?>
                    </td>
                    <td>
                      <?= $data['nama'] ?>
                    </td>
                    <td>
                      <?= $data['posisi'] ?>
                    </td>
                    <td>
                      <?= $data['alamat'] ?>
                    </td>
                    <td>
                      <?= $data['umur'] ?>
                    </td>
                    <td>
                      <?= $data['kontak'] ?>
                    </td>
                    <td>
                      <!-- Button untuk modal -->
                      <a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal"
                        data-target="#myModal<?php echo $data['id_karyawan']; ?>"></a>
                    </td>
                  </tr>
                  <!-- Modal Edit Mahasiswa-->
                  <div class="modal fade" id="myModal<?php echo $data['id_karyawan']; ?>" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Ubah Data Karyawan</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form role="form" action="proses-edit-karyawan.php" method="get">

                            <?php
                            $id = $data['id_karyawan'];
                            $query_edit = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id_karyawan='$id'");
                            //$result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($query_edit)) {
                              ?>


                              <input type="hidden" name="id_karyawan" value="<?php echo $row['id_karyawan']; ?>">

                              <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">
                              </div>

                              <div class="form-group">
                                <label>Posisi</label>
                                <input type="text" name="posisi" class="form-control" value="<?php echo $row['posisi']; ?>">
                              </div>

                              <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>">
                              </div>

                              <div class="form-group">
                                <label>Umur</label>
                                <input type="text" name="umur" class="form-control" value="<?php echo $row['umur']; ?>">
                              </div>

                              <div class="form-group">
                                <label>Kontak</label>
                                <input type="text" name="kontak" class="form-control" value="<?php echo $row['kontak']; ?>">
                              </div>

                              <div class="form-group">
                                <label>Cari Admin</label>
                                <select class="form-control" id="searchAdmin" name="admin" onchange="searchAdmin()">
                                  <option value="">Pilih Admin</option>
                                  <?php
                                  $queryAdmin = mysqli_query($koneksi, "SELECT * FROM admin");
                                  while ($admin = mysqli_fetch_assoc($queryAdmin)) {
                                    ?>
                                    <option <?php echo $row['id_admin'] == $admin["id_admin"] ? 'selected' : '' ?>
                                      value="<?php echo $admin["id_admin"] ?>">
                                      <?php echo $admin["nama"] ?>
                                    </option>
                                    <?php
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" id="ubahtombol" class="btn btn-success">Ubah</button>
                                <button type="button" id="hapus-btn" class="btn btn-danger"
                                  onclick="deleteConfirm(<?= $row['id_karyawan']; ?>)">Hapus</button>
                                <a id="delete-link-<?= $row['id_karyawan']; ?>"
                                  href="hapus-karyawan.php?id_karyawan=<?= $row['id_karyawan']; ?>"></a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                              </div>
                              <?php
                            }
                            //mysql_close($host);
                            ?>

                          </form>
                        </div>
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

  
  <!-- Modal -->
  <div id="myModalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Karyawan</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
        <form action="tambah-karyawan.php" method="get">
          <div class="modal-body">
            Nama :
            <input type="text" class="form-control" name="nama">
            Posisi :
            <input type="text" class="form-control" name="posisi">
            Alamat :
            <input type="text" class="form-control" name="alamat">
            Umur :
            <input type="number" class="form-control" name="umur">
            Kontak :
            <input type="text" class="form-control" name="kontak">
            <div class="form-group">
              <label>Admin :</label>
              <select class="form-control" id="searchAdmin" name="admin" onchange="searchAdmin()">
                <option value="">Pilih Admin</option>
                <?php
                $queryAdmin = mysqli_query($koneksi, "SELECT * FROM admin");
                while ($admin = mysqli_fetch_assoc($queryAdmin)) {
                  echo '<option value="' . $admin["id_admin"] . '">' . $admin["nama"] . '</option>';
                }
                ?>
              </select>
            </div>

          </div>
          <!-- footer modal -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" onclick="return validateFormTambah()">Tambah</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
      </div>
    </div>

  </div>
  

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
        text: 'Data karyawan telah berhasil ditambahkan.',
        icon: 'success',
        confirmButtonText: 'OK',
      }).then((result) => {
        if (result.isConfirmed) {
          // Redirect atau lakukan tindakan lain jika perlu setelah OK diklik
          window.location.href = 'karyawan.php';
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
        text: 'Data karyawan telah berhasil diubah.',
        icon: 'success',
        confirmButtonText: 'OK',
      }).then((result) => {
        if (result.isConfirmed) {
          // Redirect atau lakukan tindakan lain jika perlu setelah OK diklik
          window.location.href = 'karyawan.php';
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
    function searchAdmin() {
      var selectedAdmin = document.getElementById("searchAdmin").value;

      // Redirect atau lakukan tindakan pencarian yang diperlukan
      // Misalnya, jika Anda ingin mengarahkan ke halaman dengan filter admin tertentu:
      if (selectedAdmin !== "") {
        window.location.href = 'karyawan.php?admin=' + selectedAdmin;
      } else {
        // Jika admin tidak dipilih, kembalikan ke halaman daftar karyawan normal
        window.location.href = 'karyawan.php';
      }
    }
  </script>

  <!-- js apabila tidak ada field data yg di isi dan menjalankan button tambah -->
  <script>
    function validateFormTambah() {
      var nama = document.querySelector('#myModalTambah input[name="nama"]').value;
      var posisi = document.querySelector('#myModalTambah input[name="posisi"]').value;
      var alamat = document.querySelector('#myModalTambah input[name="alamat"]').value;
      var umur = document.querySelector('#myModalTambah input[name="umur"]').value;
      var kontak = document.querySelector('#myModalTambah input[name="kontak"]').value;
      // var admin = document.querySelector('#myModalTambah input[name="admin"]').value;

      if (nama === '' || posisi === '' || alamat === '' || umur === '' || kontak === '') {
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

</body>

</html>