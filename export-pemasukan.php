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
	<th>ID Sumber</th>
	<th>ID Customer</th>
	</tr>  
	<?php  
	// Load file koneksi.php  
	include "koneksi.php";    
	// Buat query untuk menampilkan semua data siswa 
$query = mysqli_query($koneksi, "SELECT * FROM pemasukan");
	// Untuk penomoran tabel, di awal set dengan 1 
	while($data = mysqli_fetch_array($query)){ 
	// Ambil semua data dari hasil eksekusi $sql 
	echo "<tr>";    
	echo "<td>".$data['id_pemasukan']."</td>";   
	echo "<td>".$data['tgl_pemasukan']."</td>";    
	echo "<td>".$data['nama_material']."</td>";    
	echo "<td>".$data['sub_total']."</td>";      
	echo "<td>".$data['id_sumber']."</td>";      
	echo "<td>".$data['id_customer']."</td>";      
	echo "</tr>";        
	}  ?></table>