<?php
session_start();
include('koneksi.php');

$id = $_GET['Kode_Supplier'];
$nama = $_GET['Nama_Perusahaan'];
$alamat = $_GET['Alamat'];
$kontak = $_GET['no_telp'];

//query update
$query = mysqli_query($koneksi, "UPDATE supplier SET Nama_Perusahaan='$nama' , Alamat='$alamat', no_telp='$kontak' WHERE Kode_Supplier='$id' ");

if ($query) {
    $_SESSION['edit-sukses'] = true;
    header("location:supplier.php");
} else {
    echo "ERROR, data gagal diupdate" . mysql_error();
}

//mysql_close($host);
?>