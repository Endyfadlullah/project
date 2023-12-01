<?php
include('koneksi.php');
session_start();

$nama = $_GET['nama'];
$posisi = $_GET['posisi'];
$alamat = $_GET['alamat'];
$umur = $_GET['umur'];
$kontak = $_GET['kontak'];
$admin = $_GET['admin'];

//query insert data karyawan
$query = mysqli_query($koneksi, "INSERT INTO `karyawan` (`id_karyawan`, `nama`, `posisi`, `alamat`, `umur`, `kontak`, `id_admin`) VALUES (null, '$nama', '$posisi', '$alamat', '$umur', '$kontak', '$admin')");

if ($query) {
    $_SESSION['insert-sukses'] = true;
    header("location:karyawan.php?admin=$admin"); // Mengarahkan kembali ke halaman daftar karyawan dengan filter admin yang dipilih
} else {
    echo "ERROR, data gagal ditambahkan" . mysqli_error($koneksi);
}
?>
