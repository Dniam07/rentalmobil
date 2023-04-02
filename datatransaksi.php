<?php

    require 'koneksi.php';

    $sql = "SELECT tb_transaksi.id_transaksi, tb_penyewa.nama_penyewa, tb_mobil.nama_mobil, tb_transaksi.harga_harian, tb_transaksi.harga_total, tb_transaksi.harga_total, tb_transaksi.jumlah_hari FROM tb_mobil INNER JOIN tb_transaksi ON tb_mobil.id_mobil = tb_transaksi.id_mobil INNER JOIN tb_penyewa ON tb_penyewa.id_penyewa = tb_transaksi.id_penyewa LIMIT 0,30;";
    $result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link rel="stylesheet" href="tabel.css">
</head>
<body>
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
            
    <center>
        <h1>TABEL TRANSAKSI</h1>
    </center>
    
    <center>
            <table>
        <tr>
            <th>Id Transaksi</th>
        <th>Nama Penyewa</th>
        <th>Nama Mobil</th>
        <th>Jumlah Hari</th>
        <th>Harga Harian</th>
        <th>Harga Total</th>
        </tr>
  
       <?php while ($row=mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?php echo $row['id_transaksi']?></td>
            <td><?php echo $row['nama_penyewa']?></td>
            <td><?php echo $row['nama_mobil']?></td>
            <td><?php echo $row['jumlah_hari']?></td>
            <td><?php echo $row['harga_harian']?></td>
            <td><?php echo $row['harga_total']?></td>
        
        </tr>
        <?php endwhile; ?>
    </table>
      <div class="kembali">
        <p><a href="home.php">KEMBALI</a></p>
    </div>
    </center>

    
</body>
</html>



