    <?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data_Pengeluaran.xls");
	?>
	<h3>Data Pengeluaran</h3>    
	<table border="1" cellpadding="5"> 
	<tr>    
	<th>ID Pengeluaran</th>
    <th>Tgl Pengeluaran</th>
    <th>Material</th>
    <th>Harga</th>    
    <th>Total</th>    
    <th>Catatan</th>    
	<th>ID Sumber</th> 
	<th>ID Supplier</th>
	</tr>  
	<?php  
	// Load file koneksi.php  
	include "koneksi.php";    
	// Buat query untuk menampilkan semua data siswa 
$query = mysqli_query($koneksi, "SELECT * FROM pengeluaran");
	// Untuk penomoran tabel, di awal set dengan 1 
	while($data = mysqli_fetch_array($query)){ 
	// Ambil semua data dari hasil eksekusi $sql 
	echo "<tr>";    
	echo "<td>".$data['id_pengeluaran']."</td>";   
	echo "<td>".$data['tgl_pengeluaran']."</td>";    
	echo "<td>".$data['nama_material']."</td>";    
	echo "<td>".$data['harga']."</td>";    
	echo "<td>".$data['total']."</td>";    
	echo "<td>".$data['catatan']."</td>";    
	echo "<td>".$data['id_sumber']."</td>";      
	echo "<td>".$data['id_supplier']."</td>";      
	echo "</tr>";        
	}  ?></table>