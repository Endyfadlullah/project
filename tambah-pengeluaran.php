<?php
session_start();
include('koneksi.php');

$tgl_pengeluaran = $_GET['tgl_pengeluaran'];
$material = $_GET['nama_material'];
$harga = $_GET['harga'];
$jumlah = $_GET['total'];
$sumber = $_GET['sumber'];
$supplier = $_GET['supplier'];

//query update
$query = mysqli_query($koneksi, "INSERT INTO `pengeluaran` (`tgl_pengeluaran`, `nama_material`, `harga`, `total`, `id_sumber`, `id_supplier`) VALUES ('$tgl_pengeluaran', '$material', '$harga', '$jumlah', '$sumber', '$supplier')");

if ($query) {
    $_SESSION['insert-sukses'] = true;
    header("location:pengeluaran.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}

//mysql_close($host);
?>