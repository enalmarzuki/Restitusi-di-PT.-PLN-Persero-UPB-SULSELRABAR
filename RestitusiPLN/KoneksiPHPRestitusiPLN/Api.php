<?php 
	
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'users');

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	//Checking if any error occured while connecting
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}

	$id = $_POST['id'];

	/*$title = "asd";*/

	//creating a query
	$stmt = $conn->prepare("SELECT no_restitusi, tgl_post, status FROM tb_restitusi WHERE id_user='$id' ORDER BY id_restitusi DESC");

	/*$stmt = $conn->prepare("SELECT no_restitusi, tgl_post, status FROM tb_restitusi ORDER BY id_restitusi DESC");*/
	
	//executing the query 
	$stmt->execute();
	
	//binding results to the query 
	$stmt->bind_result($no_restitusi, $tgl_post, $status);
	
	$hasil = array(); 
	
	//traversing through all the result 
	while($stmt->fetch()){

		$temp = array();
		$temp['no_restitusi'] = $no_restitusi; 
		$temp['tgl_post'] = $tgl_post; 
		$temp['status'] = $status; 

		array_push($hasil, $temp);

	}
	
	//displaying the result in json format 
	echo json_encode($hasil);
	
 ?>