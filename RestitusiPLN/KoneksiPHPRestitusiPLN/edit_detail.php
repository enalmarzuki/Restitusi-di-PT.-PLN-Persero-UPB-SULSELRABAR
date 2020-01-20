<?php  

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		
		/*$nip 		= $_POST['nip'];*/
		$name 		= $_POST['name'];
		$tgl_lahir 	= $_POST['tgl_lahir'];
		$email 		= $_POST['email'];
		$alamat		= $_POST['alamat'];
		$password 	= $_POST['password'];
		$id 		= $_POST['id'];

		require_once 'connect.php';

		$sql = "UPDATE users_table SET name = '$name', tgl_lahir = '$tgl_lahir', alamat = '$alamat', email = '$email', password = '$password' WHERE id = '$id' ";

		if (mysqli_query($conn, $sql)) {
			
			$result['success'] = "1";
			$result["message"] = "success";

			echo json_encode($result);
			mysqli_close($conn);

		}
	}

	else
	{
		$result["success"] = "0";
		$result["message"] = "error";

		echo json_encode($result);
		mysqli_close($conn);
	}


?>