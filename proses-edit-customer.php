<?php
session_start();
include('koneksi.php');

$id = $_GET['id_customer'];
$nama = $_GET['nama_customer'];
$kontak = $_GET['no_telp'];

//query update
$query = mysqli_query($koneksi, "UPDATE customer SET nama_customer='$nama' , no_telp='$kontak' WHERE id_customer='$id' ");

if ($query) {
    $_SESSION['edit-sukses'] = true;
    header("location:customer.php");
} else {
    echo "ERROR, data gagal diupdate" . mysql_error();
}

//mysql_close($host);
?>