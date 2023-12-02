	<!-- cek apakah sudah login -->
	<?php 
	session_start();
	require 'koneksi.php';
	// if($_SESSION['status']!="login"){
	// 	header("location:login.php?pesan=belum_login");
	// 	// header("<location:login.html?pesan=belum_login");
	// }
	if (!isset($_SESSION['status']) || $_SESSION['status'] !== "login") {
		// Jika tidak, alihkan pengguna ke halaman login
		header("Location: index.php");
		exit;}
	
	?>