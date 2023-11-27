<?php
session_start();
include('koneksi.php');

$id = $_GET['id_pengeluaran'];
$tgl = $_GET['tgl_pengeluaran'];
$material = $_GET['nama_material'];
$harga = $_GET['harga'];
$jumlah = $_GET['total'];
$sumber = $_GET['id_sumber'];
$supplier = $_GET['id_supplier'];

//query update
$query = mysqli_query($koneksi, "UPDATE pengeluaran SET tgl_pengeluaran='$tgl' , nama_material='$material', harga='$harga', total='$jumlah', id_sumber='$sumber', id_supplier='$supplier' WHERE id_pengeluaran='$id' ");

if ($query) {
    $_SESSION['edit-sukses'] = true;
    header("location:pengeluaran.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}

//mysql_close($host);
?>