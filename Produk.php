<!-- menampilkan data dari database ke tabel -->
<?php
require 'koneksi.php';
$sql = "SELECT * FROM produk";
$result = $koneksi->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
</head>
<body>
    <h1>Halaman produk</h1>
    <a href="produk-tambah.php">Tambah Data</a>
        <thead>
                <th>No</th>
                <th>Aksi</th>
        </thead>
        <tbody>
            <?php $no = 0; foreach ($rows as $row): ?>
                <tr>
                    <td><?= ++$no ?></td>
                        <a href="produk-edit.php?id=<?= $row['id'] ?>">Edit</a>
                        <a href="produk-hapus.php?id=<?= $row['id'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>