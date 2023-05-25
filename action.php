<?php 
require "koneksi.php";
session_start();



function register(){
    $error_input = 0;
    $error_msg ="<script></script>";
    global $conn;
    
    $full_name = $_POST['fname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $password_repeat = password_hash($_POST['cpassword'], PASSWORD_DEFAULT);
    // $password_repeat = password_hash($_POST['password-repeat'], PASSWORD_BCRYPT);
    $password_repeat = password_hash($_POST['cpassword'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    
    
    $sql = "SELECT * FROM users where email = '$email'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $error_input++;
        $error_msg.="<script>alert('Email sudah terdaftar')</script>"; 
        header("location: register.php?message= . $error_msg");   
    }
        else if ($_POST['password'] != $_POST['cpassword']) {
        $error_input++;
        $error_msg.="<script>alert('Password Tidak Sama')</script>";
        header("location: register.php?message= . $error_msg");
    } 
        else if ($error_input > 0) {
        $error_msg.="Password Tidak Sama";
        header("location:register.php?error_msg=$error_msg");
    } else if ($error_input == 0) {
        $sql = "INSERT INTO users VALUES ('', '$email', '$password', '$full_name', '$role')";
        $run_sql = mysqli_query($conn, $sql);
        if ($run_sql == true) {
            echo "<script>alert('Registrasi Berhasil')</script>"; 
            header ("location: login.php");
        }
        else {
            echo "<script>alert('Registrasi Gagal')</script>";
        }  
    
    };
}

//function unutk query
function getDataUsers($email){
    global $conn;
    $fullname = $_POST['fullname'];
    $query = "SELECT * FROM users WHERE fullname = '$fullname' and email = '$email'";
    $result = mysqli_query($conn, $query);
    return $result;
}

// function cek login
function cekLogin(){
    if(isset($_POST['auth-login'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $result = getDataUsers($email);
        if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
    
            if(password_verify($password, $row['password'])){
                $_SESSION['email'] = $email;
                $_SESSION['login'] = true;
                header('Location: home.php');
    
            } else {
                header("Location: login.php?message=gabisa masuk woi");
            }
        }
    }

}
























?>