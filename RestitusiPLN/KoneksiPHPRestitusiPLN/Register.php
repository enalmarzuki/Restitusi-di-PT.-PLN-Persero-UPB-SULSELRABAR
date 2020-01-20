<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $nip = $_POST['nip'];
    $name = $_POST['name'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $photo = "";

    $path = "profile_image/kosong.jpg";
    $finalPath = "http://192.168.43.173//Android/KoneksiPHPRestitusiPLN/".$path;

    /*$password = password_hash($password, PASSWORD_DEFAULT);*/

    require_once 'connect.php';

    $sql = "INSERT INTO users_table (nip, name, tgl_lahir, alamat, email, password,photo) VALUES ('$nip','$name','$tgl_lahir','$alamat', '$email', '$password','$finalPath')";

    if ( mysqli_query($conn, $sql) ) {
        $result["success"] = "1";
        $result["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);

    } else {

        $result["success"] = "0";
        $result["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
    }
}

?>