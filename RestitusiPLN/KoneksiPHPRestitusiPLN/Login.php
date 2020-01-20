<?php 
	
	if ($_SERVER['REQUEST_METHOD']=='POST'){

		$email 		= $_POST['email'];
		$password 	= $_POST['password'];

		require_once 'connect.php';

		$sql = "SELECT * FROM users_table WHERE email='$email' ";

		$response = mysqli_query($conn, $sql);

		$result = array();
		$result['login'] = array();

		if (mysqli_num_rows($response) === 1) {

			$row = mysqli_fetch_assoc($response);

			if ($password && $row['password']) {

				/*$index['name'] 	= $row['name'];
				$index['email'] = $row['email'];
				$index['id'] 	= $row['id'];*/

				$index['nip']		=	$row['nip'];
				$index['name']		=	$row['name'];
				$index['tgl_lahir']	=	$row['tgl_lahir'];
				$index['email']		=	$row['email'];
				$index['alamat']	=	$row['alamat'];
				$index['password']	=	$row['password'];
				$index['image']		=	$row['photo'];
				$index['id'] 	= $row['id'];

				array_push($result['login'], $index);

				$result['success'] = "1";
				$result['messege'] = "success";
				echo json_encode($result);

				mysqli_close($conn);
			}
			else
			{
				$result['success'] = "0";
				$result['messege'] = "error";
				echo json_encode($result);

				mysqli_close($conn);
			}
		}
			
	}

?>