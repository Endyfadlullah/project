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
	<th>Sumber</th> 
	<th>Supplier</th>
	</tr>  
	<?php  
	// Load file koneksi.php  
	include "koneksi.php";    
	// Buat query untuk menampilkan semua data siswa 
$query = mysqli_query($koneksi, "SELECT pengeluaran.id_pengeluaran, pengeluaran.tgl_pengeluaran, pengeluaran.nama_material, pengeluaran.harga, pengeluaran.total, sumber.nama, supplier.Nama_Perusahaan FROM pengeluaran INNER JOIN sumber ON pengeluaran.id_sumber = sumber.id_sumber INNER JOIN supplier ON pengeluaran.id_supplier = supplier.Kode_Supplier WHERE pengeluaran.id_pengeluaran ORDER BY pengeluaran.id_pengeluaran ASC");
	// Untuk penomoran tabel, di awal set dengan 1 
	while($data = mysqli_fetch_array($query)){ 
	// Ambil semua data dari hasil eksekusi $sql 
	echo "<tr>";    
	echo "<td>".$data['id_pengeluaran']."</td>";   
	echo "<td>".$data['tgl_pengeluaran']."</td>";    
	echo "<td>".$data['nama_material']."</td>";    
	echo "<td>".$data['harga']."</td>";    
	echo "<td>".$data['total']."</td>";       
	echo "<td>".$data['nama']."</td>";      
	echo "<td>".$data['Nama_Perusahaan']."</td>";      
	echo "</tr>";        
	}  ?></table>