<?php
include_once 'Pengguna.php';

$database = new Database();
$db = $database->getConnection();

$pengguna = new Pengguna($db);
$pengguna->idpengguna = $_GET['id'];

if ($pengguna->delete()) {
    header('location: index.php'); # redirect
} else {
    echo "Gagal menghapus pengguna. <a href='index.php'>Ulangi</a>";
}
?>