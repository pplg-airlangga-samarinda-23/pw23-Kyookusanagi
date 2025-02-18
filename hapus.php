<?php

require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];

    $sql = 'DELETE FROM database_kopi WHERE id=?';
    $row = $koneksi->execute_query($sql, [$id]);

    if ($row) {
        header("Location: produk.php");
    }
}
?>
