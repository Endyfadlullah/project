<?php
session_start();
include('koneksi.php');

$id = $_GET['id_karyawan'];
$nama = $_GET['nama'];
$posisi = $_GET['posisi'];
$alamat = $_GET['alamat'];
$umur = $_GET['umur'];
$kontak = $_GET['kontak'];
$admin = $_GET['admin'];

//query update
$query = mysqli_query($koneksi, "UPDATE karyawan SET nama='$nama' , posisi='$posisi', alamat='$alamat', umur='$umur', kontak='$kontak', id_admin='$admin' WHERE id_karyawan='$id' ");

if ($query) {
    $_SESSION['edit-sukses'] = true;
    header("location:karyawan.php");
} else {
    echo "ERROR, data gagal diupdate" . mysql_error();
}

//mysql_close($host);
?>