<?php
    require '../koneksi.php';

    // FUNCTION TAMPIL DATA //
    function tampilMobil(){
        global $conn;
        $sql = "SELECT * FROM tb_mobil";
        $result = mysqli_query($conn, $sql);
        return $result;
        

    }
    function tampilPenyewa(){
        global $conn;
        $sql = "SELECT * FROM tb_penyewa";
        $result = mysqli_query($conn, $sql);
        return $result;


    }
    function tampilTransaksi(){
       global $conn;
       $sql = "SELECT tb_transaksi.id_transaksi, tb_penyewa.nama_penyewa, tb_mobil.nama_mobil, tb_transaksi.harga_harian, tb_transaksi.harga_total, tb_transaksi.harga_total, tb_transaksi.jumlah_hari FROM tb_mobil INNER JOIN tb_transaksi ON tb_mobil.id_mobil = tb_transaksi.id_mobil INNER JOIN tb_penyewa ON tb_penyewa.id_penyewa = tb_transaksi.id_penyewa LIMIT 0,30;";
       $result = mysqli_query($conn, $sql);
       return $result;


    }
    //-------------------------------------------------//

    // FUNCTION DELETE DATA //
    function deleteMobil($id_mobil){
        global $conn;
        $query = "DELETE FROM tb_mobil WHERE id_mobil= '$id_mobil'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    function deletePenyewa($id_penyewa){
        global $conn;
        $query = "DELETE FROM tb_penyewa WHERE id_penyewa= '$id_penyewa'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    function deleteTransaksi($id_transaksi){
        global $conn;
    }
    //---------------------------------------------------//
?>