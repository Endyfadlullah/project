<?php

session_start();

include('koneksi.php');

define('LOG', 'log.txt');
function write_log($log)
{
    $time = @date('[Y-d-m:H:i:s]');
    $op = $time . ' ' . $log . "\n" . PHP_EOL;
    $fp = @fopen(LOG, 'a');
    $write = @fwrite($fp, $op);
    @fclose($fp);
}

$id = (int) $_GET['id_pemasukan'];
$tgl = $_GET['tgl_pemasukan'];
$material = $_GET['nama_material'];
$subtotal = str_replace(',', '', $_GET['sub_total']);
$sumber = $_GET['id_sumber'];
$customer = $_GET['id_customer'];

$query = mysqli_query($koneksi, "UPDATE pemasukan SET tgl_pemasukan='$tgl' , nama_material='$material', sub_total='$subtotal', id_sumber='$sumber', id_customer='$customer' WHERE id_pemasukan='$id' ");

$namaadmin = $_SESSION['nama'];
if ($query) {
    write_log("Nama Admin : " . $namaadmin . " => Edit Pemasukan => " . $id . " => Sukses Edit");
    $_SESSION['edit-sukses'] = true;
    header("location:pendapatan.php");
} else {
    write_log("Nama Admin : " . $namaadmin . " => Edit Pemasukan => " . $id . " => Gagal Edit");
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}

//mysql_close($host);
?>