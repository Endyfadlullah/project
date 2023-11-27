<?php
session_start();
include('koneksi.php');

$nama = $_GET['nama_customer'];
$kontak = $_GET['no_telp'];

//query update
$query = mysqli_query($koneksi, "INSERT INTO `customer` (`id_customer`,`nama_customer`, `no_telp`) VALUES (null, '$nama', '$kontak')");

if ($query) {
    $_SESSION['insert-sukses'] = true;
    header("location:customer.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}

//mysql_close($host);
?>