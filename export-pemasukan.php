<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Pemasukan.xls");
?>
<h3>Data Pemasukan</h3>
<table border="1" cellpadding="5">
	<tr>
		<th>ID Pemasukan</th>
		<th>Tgl Pemasukan</th>
		<th>Material</th>
		<th>Jumlah</th>
		<th>Sumber</th>
		<th>Customer</th>
	</tr>
	<?php
	// Load file koneksi.php  
	include "koneksi.php";
	// Buat query untuk menampilkan semua data siswa 
	$query = mysqli_query($koneksi, "SELECT pemasukan.id_pemasukan, pemasukan.tgl_pemasukan, pemasukan.nama_material, pemasukan.sub_total, sumber.nama, customer.nama_customer FROM pemasukan INNER JOIN sumber ON pemasukan.id_sumber = sumber.id_sumber INNER JOIN customer ON pemasukan.id_customer = customer.id_customer WHERE pemasukan.id_pemasukan ORDER BY pemasukan.id_pemasukan ASC");
	// Untuk penomoran tabel, di awal set dengan 1 
	while ($data = mysqli_fetch_array($query)) {
		// Ambil semua data dari hasil eksekusi $sql 
		echo "<tr>";
		echo "<td>" . $data['id_pemasukan'] . "</td>";
		echo "<td>" . $data['tgl_pemasukan'] . "</td>";
		echo "<td>" . $data['nama_material'] . "</td>";
		echo "<td>" . $data['sub_total'] . "</td>";
		echo "<td>" . $data['nama'] . "</td>";
		echo "<td>" . $data['nama_customer'] . "</td>";
		echo "</tr>";
	} ?>
</table>