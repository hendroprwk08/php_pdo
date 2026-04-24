<?php
require_once "../db/Database.php";
require_once "../obj/Pengguna.php";

$database = new Database();
$db = $database->getConnection();

if (!$db) die("<tr><td colspan='3'>Koneksi database bermasalah.</td></tr>");
    
$pengguna = new Pengguna($db);
$pengguna->idpengguna = $_GET['id'];

if ($pengguna->delete()):
    header('location: index.php'); # redirect
else:
    echo "Gagal menghapus pengguna. <a href='index.php'>Ulangi</a>";
endif;
?>