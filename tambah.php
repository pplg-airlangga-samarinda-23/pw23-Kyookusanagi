<?php
require 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $nama_kopi = $_POST['nama kopi'];
    $jenis_kopi = $_POST['jenis kopi'];
    $asal_negara = $_POST['Asal Negara'];
    $kondisi = $_POST['Kondisi'];
    $harga_kopi = $_POST['harga kopi'];
    $expired = $_POST['Tanggal expired'];
    $berat_kopi = $_POST['Berat kopi'];
    $sql = "INSERT INTO [produk] ($id,$nama_kopi,$jenis_kopi,$asal_negara,$kondisi,$harga_kopi,$expired,$berat_kopi) VALUES (?,?,?,?,?,?,?,?)
    ";
    $row = $koneksi->execute_query($sql,[$id,$nama_kopi,$jenis_kopi,$asal_negara,$kondisi,$harga_kopi,$expired,$berat_kopi]);

    if($row){
        header("location:produk.php");
    }
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data</title>
</head>
<body>
    <h1>Tambah data</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for=""></label>
            <input type="text" name="" id="">
    </div>
    <button type="submit"></button>
    </form>
</body>
</html>