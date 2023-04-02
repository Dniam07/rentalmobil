<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "db_rental_mobil";

$conn = mysqli_connect($servername, $username, $password, $databasename);


if(!$conn) {
    die ("koneksi gagal :" .mysqli_connect_error());
}
    
?>