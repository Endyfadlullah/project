<?php
//include('dbconnected.php');
include('koneksi.php');

$nama = $_POST['Nama_Perusahaan'];
$material = $_POST['Material'];
$alamat = $_POST['Alamat'];
$kontak = $_POST['no_telp'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `supplier` (`Kode_Supplier`, `Nama_Perusahaan`, `Material`, `Alamat`, `no_telp`) VALUES (null, '$nama', '$material', '$alamat', '$kontak')");
return print(json_encode($query));
if ($query) {
 # credirect ke page index
 header("location:supplier.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>