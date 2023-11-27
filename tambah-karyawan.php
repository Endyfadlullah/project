<?php
include('koneksi.php');
session_start();

$nama = $_GET['nama'];
$posisi = $_GET['posisi'];
$alamat = $_GET['alamat'];
$umur = $_GET['umur'];
$kontak = $_GET['kontak'];
$admin = $_GET['admin'];

//query update
$query = mysqli_query($koneksi, "INSERT INTO `karyawan` (`id_karyawan`, `nama`, `posisi`, `alamat`, `umur`, `kontak`, `id_admin`) VALUES (null, '$nama', '$posisi', '$alamat', '$umur', '$kontak', '$admin')");

if ($query) {
    $_SESSION['insert-sukses'] = true;
    header("location:karyawan.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}

//mysql_close($host);
?>