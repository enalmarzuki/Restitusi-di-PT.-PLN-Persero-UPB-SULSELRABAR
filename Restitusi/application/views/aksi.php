<?php 
	
	mysqli_connect("localhost", "root", "", "users");

	$nama = $_POST['nama'];
	
	 
	/*mysql_query("insert into user values('','$nama','$alamat','$pekerjaan')");*/
	mysqli_query("UPDATE tb_restitusi SET status='$nama' WHERE id='$id_restitusi' ");
?>