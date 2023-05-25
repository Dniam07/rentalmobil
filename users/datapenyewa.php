<?php

     require 'functionUser.php';
     $result = tampilPenyewa();

     if (isset($_POST['submit-penyewa'])) {
        
        global $conn;
        $namaPenyewa = htmlspecialchars($_POST['nama_penyewa']);
        $alamatPenyewa = htmlspecialchars($_POST['alamat_penyewa']);
        $noTelp = $_POST['no_telp'];
        

        $sql = "INSERT INTO tb_penyewa VALUES ('','$namaPenyewa', '$alamatPenyewa','$noTelp')";
        $tambahPenyewa = mysqli_query($conn, $sql);
    }

      if(isset($_GET['id_penyewa'])) {
        $id_penyewa = $_GET['id_penyewa'];
        $result = deletePenyewa($id_penyewa);
        if($result){
            echo "<script>alert('Data berhasil dihapus');</script>";
            header("location: datapenyewa.php");
        }
        

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penyewa</title>
    <link rel="stylesheet" href="tabel.css">
</head>
<body>
     <div class="nav-bar">
                <nav class="dropdown">
                   <ul>   
                      <li><a href="">MENU</a></li>
                      <li><a href="../home.php">HOME</a></li>
                      <li><a href="datamobil.php">DATA MOBIL</a></li>
                      <li><a href="datapenyewa.php">DATA PENYEWA</a></li>
                      <li><a href="datatransaksi.php">DATA TRANSAKSI</a></li>
                   </ul>
                </nav>
                
            </div>

              <div class="form-tambah">
        <form action="" method="post">
          <input type="hidden" name="id" id="id_buku">
        <ul>

            <li>
                <label for="nama_penyewa">Nama Penyewa :</label>
                <input type="text" name="nama_penyewa" id="nama_penyewa" autocomplete="off" placeholder="Masukkan Nama Penyewa ">
            </li>
       
            <li>
                <label for="alamat_penyewa">Alamat Penyewa :</label>
                <input type="text" name="alamat_penyewa" id="alamat_penyewa" autocomplete="off" placeholder="Masukkan Alamat Penyewa">
            </li>
       
            <li>
                <label for="no_telp">No Telepon :</label>
                <input type="text" name="no_telp" id="no_telp" autocomplete="off" placeholder="Masukkan No Telepon">
            </li>
            
       
            
        </ul>
            <button type="submit" name="submit-penyewa">kirim</button>

    </form>

            </div>
            
    <center>
        <h1>TABEL PENYEWA</h1>
    </center>
    <center>
          <table >
        
        <tr>
        <th>No</th>
        <th>Nama Penyewa</th>
        <th>Alamat Penyewa</th>
        <th>No Telepon</th>
        <th>Aksi</th>
    
        </tr>
  
<?php
$i = 1;
?>

       <?php while ($row=mysqli_fetch_assoc($result)) : ?>
        <tr>
             <td><?php echo $i++ ;?></td>
             <td><?php echo $row['nama_penyewa']?></td>
             <td><?php echo $row['alamat_penyewa']?></td>
             <td><?php echo $row['no_telepon']?></td>
             <td>
                  
                <a href="edit.php?id=<?php echo $row['id_mobil']?>">Edit</a>
                    <div>/</div>
                 <a href="?id_penyewa=<?php echo $row['id_penyewa']?>">Hapus</a>
            
             </td>
        </tr>
        <?php endwhile ;?>
       
    </table>
      <div class="kembali">
        <p><a href="home.php">KEMBALI</a></p>
    </div>
    </center>
  
    
</body>
</html>


