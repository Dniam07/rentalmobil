<?php
include "db.php";

error_reporting(E_ALL);
session_start();

// if (isset($_SESSION['email'])) {
//     echo "Berhasil login";
// }

if (!empty($_POST)){
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)> 0){    
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role'];
        $msg = "Login Berhasil";
        $loc = "index.php";
    } else {
        $msg = "Login Gagal";
        $loc = "form_login.php";
    }
}

?>