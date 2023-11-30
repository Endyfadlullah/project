<?php
session_start();
include('koneksi.php');

$nama = $_POST['Nama_Perusahaan'];
$alamat = $_POST['Alamat'];
$kontak = $_POST['no_telp'];

//query update
$query = mysqli_query($koneksi, "INSERT INTO `supplier` (`Kode_Supplier`, `Nama_Perusahaan`, `Alamat`, `no_telp`) VALUES (null, '$nama', '$alamat', '$kontak')");
// return print(json_encode($query));
if ($query) {
    $_SESSION['insert-sukses'] = true;
    header("location:supplier.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}

//mysql_close($host);
?>