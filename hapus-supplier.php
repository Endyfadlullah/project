<?php
//include('dbconnected.php');
include('koneksi.php');

$id = $_GET['Kode_Supplier'];

//query update
$query = mysqli_query($koneksi,"DELETE FROM `supplier` WHERE Kode_Supplier = '$id'");

if ($query) {
 # credirect ke page index
 header("location:supplier.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>