<?php
session_start();

if (!isset($_SESSION['login'])) {

    header('location: login.php');
    die;
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMEPAGE</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="header">
        <div class="namarental">
        <h2 class="d">D'<span class="rentalinaja">RENTALIN AJA</span></h2>
        </div>
        <div class="login">
            <p><a href="">LOGIN</a></p>
        </div>
       
    </div>

       <div class="container">
          <div class="iklanmobil">
            <div class="nav-bar">
                <nav class="dropdown">
                   <ul>   
                      <li><a href="">MENU</a></li>
                      <li><a href="home.php">HOME</a></li>
                      <li><a href="datamobil.php">DATA MOBIL</a></li>
                      <li><a href="datapenyewa.php">DATA PENYEWA</a></li>
                      <li><a href="datatransaksi.php">DATA TRANSAKSI</a></li>
                   </ul>
                </nav>
                
            </div>
            
          </div>
                <div class="containbatas">
                    
                 </div>

                <div class="containnav">
                    
                 </div>

            <div class="contain">
               
                <div class="cardmobil1">

     

                    </div>
                    <div class="cardmobil2"></div>
                    <div class="cardmobil3"></div>
                    <div class="cardmobil4"></div>
                    <div class="cardmobil5"></div>
                    <div class="cardmobil6"></div>
                    <div class="cardmobil7"></div>
                    <div class="cardmobil8"></div>
            </div>
        </div>

    <div class="footer">

    </div>

    </div>
    
</body>
</html>