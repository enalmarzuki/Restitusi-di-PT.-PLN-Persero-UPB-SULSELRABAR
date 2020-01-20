<?php  

	if ($_SERVER['REQUEST_METHOD']=='POST') {
		
		$no_restitusi = $_POST['no_restitusi']; 

		require_once 'connect.php';

		$sql = "SELECT * FROM tb_restitusi WHERE no_restitusi ='$no_restitusi' ";

		$response = mysqli_query($conn, $sql);

		$result = array();
		$result['read'] = array();

		if (mysqli_num_rows($response) === 1) 
		{
			
			if ($row = mysqli_fetch_assoc($response)) 
			{
				$h['foto_formulir_sppd']		=	$row['foto_formulir_sppd'];
				$h['foto_tiket_pesawat']		=	$row['foto_tiket_pesawat'];
				$h['foto_kwitansi_tiket']		=	$row['foto_kwitansi_tiket'];
				$h['foto_boarding_pass']		=	$row['foto_boarding_pass'];
				$h['foto_kwitansi_penginapan']	=	$row['foto_kwitansi_penginapan'];
				$h['foto_sppd_manual']			=	$row['foto_sppd_manual'];
				$h['komentar']					=	$row['komentar'];
				

				array_push($result["read"], $h);

				$result["success"] = "1";
				echo json_encode($result);
			}
		}
		
	}
	else
		{
			$result["success"] = "0";
			$result["message"] = "Error!";
			echo json_encode($result);

			mysqli_close();
		}

?>