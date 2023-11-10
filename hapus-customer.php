<?php
//include('dbconnected.php');
include('koneksi.php');

$id = $_GET['id_customer'];

//query update
$query = mysqli_query($koneksi,"DELETE FROM `customer` WHERE id_customer = '$id'");

if ($query) {
 # credirect ke page index
 header("location:customer.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>