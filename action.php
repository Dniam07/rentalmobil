<?php 
require "koneksi.php";



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
 //aksi untuk login
 

 function cekLogin(){
    global $conn;

    if (isset($_POST['auth-login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];


        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0){    
            $row = mysqli_fetch_assoc($result);
            
            if(password_verify($password, $row['password']));

                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];
                
                $msg = "Login Berhasil";
                header("Location: berhasil_login.php?message=" . $msg);
                exit;
            } else {
                $msg = "wrong email or password";
                header("Location: login.php?message=" . $msg);
                exit;
            }
        } else {
            $msg = "Login Gagal";
            header("Location: login_gagal.php");
        }
}

    





















?>