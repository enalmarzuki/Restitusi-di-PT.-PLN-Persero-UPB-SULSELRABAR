<?php  

	if ($_SERVER['REQUEST_METHOD']=='POST') {
		
		$id = $_POST['id']; 

		require_once 'connect.php';

		$sql = "SELECT * FROM users_table WHERE id ='$id' ";

		$response = mysqli_query($conn, $sql);

		$result = array();
		$result['read'] = array();

		if (mysqli_num_rows($response) === 1) 
		{
			
			if ($row = mysqli_fetch_assoc($response)) 
			{
				$h['nip']		=	$row['nip'];
				$h['name']		=	$row['name'];
				$h['tgl_lahir']	=	$row['tgl_lahir'];
				$h['email']		=	$row['email'];
				$h['alamat']	=	$row['alamat'];
				$h['password']	=	$row['password'];
				$h['image']		=	$row['photo'];

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