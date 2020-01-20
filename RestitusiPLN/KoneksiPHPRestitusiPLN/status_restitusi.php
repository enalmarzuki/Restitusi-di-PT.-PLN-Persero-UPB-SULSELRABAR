<?php

	if ($_SERVER['REQUEST_METHOD'] =='POST')
	{

	    $id = $_POST['id'];

	    require_once 'connect.php';

	    $sql = $conn->prepare("SELECT no_restitusi, tgl_post, status FROM tb_restitusi WHERE id_user='$id' ORDER BY id_restitusi DESC");
	
		//eksekusi query 
		$sql->execute();
		
		//menyimpan hasil dari query ke dalam variabel
		$sql->bind_result($no_restitusi, $tgl_post, $status);
		
		$hasil = array(); 
		
		//mengeluarkan hasil
		while($sql->fetch())
		{

			$temp = array();
			$temp['no_restitusi'] = $no_restitusi; 
			$temp['tgl_post'] = $tgl_post; 
			$temp['status'] = $status; 

			array_push($hasil, $temp);

		}
		
		echo json_encode($hasil);
	}
?>