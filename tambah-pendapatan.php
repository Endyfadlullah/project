<?php
//include('dbconnected.php');
include('koneksi.php');

$tgl_pemasukan = $_GET['tgl_pemasukan'];
$nama_material = $_GET['nama_material'];
$jumlah = $_GET['sub_total'];
$sumber = $_GET['sumber'];
$customer = $_GET['customer'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `pemasukan` (`tgl_pemasukan`, `nama_material`,`sub_total`, `id_sumber`, `id_customer`) VALUES ( '$tgl_pemasukan', '$nama_material', '$jumlah', '$sumber', '$customer')");

if ($query) {
 # credirect ke page index
 header("location:pendapatan.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>