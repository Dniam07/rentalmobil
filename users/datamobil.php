<?php

require 'functionUser.php';
$result = tampilMobil();

if (isset($_POST['submit-mobil'])) {

    global $conn;
    $jenisMobil = htmlspecialchars($_POST['jenis_mobil']);
    $namaMobil = htmlspecialchars($_POST['nama_mobil']);
    $hargaHarian = $_POST['harga_harian'];


    $sql = "INSERT INTO tb_mobil VALUES ('','$jenisMobil', '$namaMobil','$hargaHarian')";
    $tambahMobil = mysqli_query($conn, $sql);
}

if (isset($_GET['id_mobil'])) {
    $id_mobil = $_GET['id_mobil'];
    $result = deleteMobil($id_mobil);
    if ($result) {
        header("location: datamobil.php");
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">
    <title>Data Mobil</title>
    <link rel="stylesheet" href="crud.css">
</head>

<body>
    <header class='header'>
        <div class="header_container">
            <div class="h1-header">
                <h1 class="judul-header"> CRUD <span class="span-menu">MENU</span></h1>
            </div>

            <div class="nav-bar">
                <nav class="nav_container">

                    <ul class="nav_wrapper">
                        <li><a href="datamobil.php">data mobil</a></li>
                        <li><a href="datapenyewa.php">data penyewa</a></li>
                        <li><a href="datatransaksi.php">data transaksi</a></li>
                        <li><a href="datatransaksi.php">konfirmasi pesanan</a></li>
                        <li><a href="home.php" class="nav-home">logout</a></li>
                    </ul>
                    </ul>
                </nav>
            </div>
        </div>
    </header>


    <br><br><br><br><br><br><br><br>

    <div class="container">
        <section class="form-wrapper">

            <div class="form-title">
                <h1 class="h1-form-title">TAMBAH DATA MOBIL</h1>
            </div>
            <div class="form-insert">
                <form action="" method="post">
                    <input type="hidden" name="id" id="id_buku">
                    <ul class="form-mobil">

                        <li>
                            <label for="jenis_mobil">Jenis Mobil :</label><br>
                            <input type="text" name="jenis_mobil" id="jenis_mobil" autocomplete="off" placeholder="Masukkan Jenis Mobil">
                        </li>

                        <li>
                            <label for="nama_mobil">Nama Mobil :</label><br>
                            <input type="text" name="nama_mobil" id="nama_mobil" autocomplete="off" placeholder="Masukkan Nama Mobil">
                        </li>

                        <li>
                            <label for="harga_harian">Harga Harian :</label><br>
                            <input type="text" name="harga_harian" id="harga_harian" autocomplete="off" placeholder="Masukkan Harga Harian">
                        </li>


                    </ul>
                    <button type="submit" name="submit-mobil" class="submit-form" >Tambah Data</button>

                </form>

            </div>
        </section>
        <section class="car-table">

            <div class="table-title">
                <h1>TABEL MOBIL</h1>
            </div>


            <table class="table-data">
                <tr>
                    <th>No.</th>
                    <th>Jenis Mobil</th>
                    <th>Nama Mobil</th>
                    <th>Harga Harian</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $i = 1;
                ?>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td>
                            <?php echo $i++; ?>
                        </td>
                        <td>
                            <?php echo $row['jenis_mobil'] ?>
                        </td>
                        <td>
                            <?php echo $row['nama_mobil'] ?>
                        </td>
                        <td>
                            <?php echo $row['harga_harian'] ?>
                        </td>

                        <td>
                            <a href="edit.php?id=<?php echo $row['id_mobil'] ?>">Edit</a>
                            <a href="?id_mobil=<?php echo $row['id_mobil'] ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile ?>
            </table>

            <div class="kembali">
                <p><a href="home.php">KEMBALI</a></p>
            </div>
        </section>

    </div>







</body>

</html>