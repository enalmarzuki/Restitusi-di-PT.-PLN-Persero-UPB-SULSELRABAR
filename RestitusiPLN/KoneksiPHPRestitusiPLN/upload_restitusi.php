<?php

	if ($_SERVER['REQUEST_METHOD'] =='POST')
	{
		$tgl_post 		= date("Y-m-d");
		/*$id_restitusi 	= $_POST['id_restitusi'];*/
		$id_user 			= $_POST['id_user'];
		$no_restitusi 		= $_POST['no_restitusi'];
		$darimana 			= $_POST['darimana'];
		$kemana 			= $_POST['kemana'];
		$tujuan 			= $darimana." - ".$kemana;
		$tempat_tujuan		= "PB Kendari";
		$agenda 			= $_POST['agenda'];
		$tgl_pergi 			= $_POST['tgl_pergi'];
		$tgl_pulang 		= $_POST['tgl_pulang'];
		$lama_sppd 			= $_POST['lama_sppd'];
		$angkutan 			= "Angkutan Umum";
		$biaya_transpor 	= $_POST['biaya_transpor'];
		$biaya_penginapan 	= $_POST['biaya_penginapan'];
		$jumlah 			= $_POST['jumlah'];
		
		$nm_formulir_sppd 		= "Foto Formulir SPPD";
		$nm_tiket_pesawat 		= "Foto Tiker Pesawat PP";
		$nm_kwitansi_tiket 		= "Foto Kwitansi Tiket";
		$nm_boarding_pass 		= "Foto Boarding Pass";
		$nm_kwitansi_penginapan = "Foto Kwitansi Penginapan";
		$nm_sppd_manual 		= "Foto SPPD Manual";


		$ft_formulir_sppd 			= $_POST['image'];
		$ft_tiket_pesawat 			= $_POST['image2'];
		$ft_kwitansi_tiket 			= $_POST['image3'];
		$ft_boarding_pass 			= $_POST['image4'];
		$ft_kwitansi_penginapan 	= $_POST['image5'];
		$ft_sppd_manual 			= $_POST['image6'];

		/*$i = 1; */

		/*$name = $_POST['name'];
		$image = $_POST['image'];

		$name2 = $_POST['name2'];
		$image2 = $_POST['image2'];		bentuk awal*/ 

		/*$sql = "INSERT INTO imageinfo(name, name2) VALUES ('$name', $name2)";*/

		$upload_path  = "uploads/$nm_formulir_sppd $no_restitusi.jpg";
		$upload_path2 = "uploads/$nm_tiket_pesawat $no_restitusi.jpg";
		$upload_path3 = "uploads/$nm_kwitansi_tiket $no_restitusi.jpg";
		$upload_path4 = "uploads/$nm_boarding_pass $no_restitusi.jpg";
		$upload_path5 = "uploads/$nm_kwitansi_penginapan $no_restitusi.jpg";
		$upload_path6 = "uploads/$nm_sppd_manual $no_restitusi.jpg";

		

		$finalPath  = "http://192.168.43.173//Android/KoneksiPHPRestitusiPLN/".$upload_path;
		$finalPath2 = "http://192.168.43.173//Android/KoneksiPHPRestitusiPLN/".$upload_path2;
		$finalPath3 = "http://192.168.43.173//Android/KoneksiPHPRestitusiPLN/".$upload_path3;
		$finalPath4 = "http://192.168.43.173//Android/KoneksiPHPRestitusiPLN/".$upload_path4;
		$finalPath5 = "http://192.168.43.173//Android/KoneksiPHPRestitusiPLN/".$upload_path5;
		$finalPath6 = "http://192.168.43.173//Android/KoneksiPHPRestitusiPLN/".$upload_path6;

		$komentar = "Sementara Di Proses";

		require_once 'connect.php';

		$sql = "INSERT INTO tb_restitusi(tgl_post, id_user, no_restitusi, foto_formulir_sppd, foto_tiket_pesawat, foto_kwitansi_tiket, foto_boarding_pass, foto_kwitansi_penginapan, foto_sppd_manual, komentar)VALUES('$tgl_post', '$id_user', '$no_restitusi', '$finalPath','$finalPath2','$finalPath3','$finalPath4','$finalPath5','$finalPath6','$komentar');";
				
		$sql .= "INSERT INTO tb_agenda (no_restitusi, tujuan, tempat_tujuan, agenda, tgl_berangkat, tgl_pulang, lama_sppd, angkutan, biaya_transportasi, biaya_penginapan, jumlah) VALUES ('$no_restitusi','$tujuan','$tempat_tujuan','$agenda','$tgl_pergi','$tgl_pulang','$lama_sppd','$angkutan','$biaya_transpor','$biaya_penginapan','$jumlah')";
 
		/*$q = mysqli_multi_query($conn, $sql);*/

		if (mysqli_multi_query($conn, $sql)) 
		{
			if (file_put_contents($upload_path, base64_decode($ft_formulir_sppd)) && file_put_contents($upload_path2, base64_decode($ft_tiket_pesawat)) && file_put_contents($upload_path3, base64_decode($ft_kwitansi_tiket)) && file_put_contents($upload_path4, base64_decode($ft_boarding_pass)) && file_put_contents($upload_path5, base64_decode($ft_kwitansi_penginapan)) && file_put_contents($upload_path6, base64_decode($ft_sppd_manual)) )
			{

				$result['success'] = "1";
				$result['message'] = "succes";

				echo json_encode($result);
				mysqli_close($conn);

				/*echo json_encode(array('response' => 'Image Upload Successfully'));*/
			}

				/*file_put_contents($upload_path,  base64_decode($ft_formulir_sppd));
				file_put_contents($upload_path2, base64_decode($ft_tiket_pesawat));
				file_put_contents($upload_path3, base64_decode($ft_kwitansi_tiket));
				file_put_contents($upload_path4, base64_decode($ft_boarding_pass));
				file_put_contents($upload_path5, base64_decode($ft_kwitansi_penginapan));
				file_put_contents($upload_path6, base64_decode($ft_sppd_manual));

				echo json_encode(array('response' => 'Image Upload Successfully'));*/

			/*if (file_put_contents($upload_path, base64_decode($ft_formulir_sppd)) && 
				file_put_contents($upload_path2, base64_decode($ft_tiket_pesawat)) && 
				file_put_contents($upload_path3, base64_decode($ft_kwitansi_tiket)) && 
				file_put_contents($upload_path4, base64_decode($ft_boarding_pass)) && 
				file_put_contents($upload_path5, base64_decode($ft_kwitansi_penginapan)) && 
				file_put_contents($upload_path6, base64_decode($ft_sppd_manual)) )  
			{

				echo json_encode(array('response' => 'Image Upload Successfully'));
			}*/
		}
		else
		{
			echo json_encode(array('response' => 'Image Upload Failed'));
		}

		/*mysqli_close($conn);	*/
	}
?>