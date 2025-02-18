<?php  
require 'koneksi.php';  

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {     
    $id = $_GET['id'];  

    $sql = "SELECT * FROM database_kopi WHERE id=?";  
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {    
    $id = $_GET['id'];

    // Pastikan semua data dikirim dengan benar
    $ID = $_POST['ID'];
    $nama_kopi = $_POST['nama kopi'];
    $jenis_kopi = $_POST['Jenis kopi'];
    $asal_negara = $_POST['Asal negara'];
    $expired = $_POST['Tanggal Expired'];
    $harga_kopi = $_POST['Harga kopi'];
    $berat_kopi = $_POST['berat kopi'];

    $sql = "UPDATE database_kopi SET nama_kopi=?, jenis_kopi=?, asal_negara=?, expired=?, harga_kopi=?, berat_kopi=? WHERE id=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("siisssi", $nama_kopi, $jenis_kopi, $asal_negara, $expired, $harga_kopi, $berat_kopi, $id);
    $success = $stmt->execute();

    if ($success) {
        header("Location: produk.php");
        exit;
    } else {
        echo "Gagal memperbarui data.";
    }
}  
?>  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <title>Edit Data</title>  
</head>  
<body>  
    <h1>Edit Data</h1>  
    <form action="" method="post">  
    <div class="form-item">  
            <label for="id">nomor:</label>  
            <input type="text" name="id" id="id" value="<?= htmlspecialchars($row['nomor'] ?? '') ?>">  
        </div>  
        <div class="form-item">  
            <label for="nama_kopi">Nama kopi:</label>  
            <input type="text" name="nama_game" id="nama_kopi" value="<?= htmlspecialchars($row['nama_kopi'] ?? '') ?>">  
        </div>  

        <div class="form-item">  
            <label for="jenis_kopi">Jenis kopi:</label>  
            <input type="text" name="jenis_kopi" id="jenis_kopi" value="<?= htmlspecialchars($row['jenis kopi'] ?? '') ?>">  
        </div>  

        <div class="form-item">  
            <label for="asal_negara">Asal negara:</label>  
            <input type="text" name="asal_negara" id="asal_negara" value="<?= htmlspecialchars($row['asal_negara'] ?? '') ?>">  
        </div>  

        <div class="form-item">  
            <label for="kondisi">kondisi kopi:</label>  
            <input type="text" name="kondisi" id="kondisi" value="<?= htmlspecialchars($row['kondisi_kopi'] ?? '') ?>">  
        </div>  

        <div class="form-item">  
            <label for="expired">Tanggal Rilis:</label>  
            <input type="text" name="expired" id="expired" value="<?= htmlspecialchars($row['expried'] ?? '') ?>">  
        </div>  

        <div class="form-item">  
            <label for="berat_kopi">Berat kopi:</label>  
            <input type="text" name="berat_kopi" id="berat_kopi" value="<?= htmlspecialchars($row['berat_kopi'] ?? '') ?>">  
        </div>  
        <button type="submit">Simpan</button>  
    </form>  
</body>  
</html>
