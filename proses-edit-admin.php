<?php
session_start();
include('koneksi.php');

$id = $_GET['id_admin'];
$nama = $_GET['nama'];
$email = $_GET['email'];
$pass = $_GET['pass'];

//query update
$query = mysqli_query($koneksi, "UPDATE admin SET nama='$nama' , email='$email', pass='$pass' WHERE id_admin='$id' ");

if ($query) {
    $_SESSION['edit-sukses'] = true;
    header("location:profile.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($Koneksi);
}

//mysql_close($host);
?>