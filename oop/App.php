<?php
include_once('Mobil.php');
include_once('Pemilik.php');

$mobil = new Mobil("Toyota", "Merah");
$pemilik = new Pemilik("Budi", $mobil);

echo "Sdr/i ". $pemilik->getNama();
echo "<br>Memiliki: " . $pemilik->getMobil()->getMerk() ." berwarna ". $pemilik->getMobil()->getWarna();
?>