<?php
include_once('../oop/Mobil.php');
include_once('../oop/Pemilik.php');

$mobil = new Mobil("Toyota", "Merah");
echo "Merk Mobil: {$mobil->getMerk()} <br>";
echo "Warna Mobil: {$mobil->getWarna()} <br>";

$pemilik = new Pemilik("Budi", $mobil);

echo "<h2>Object</h2>";
echo "Sdr/i ". $pemilik->getNama();
echo "<br>Memiliki: " . $pemilik->getMobil()->getMerk() ." berwarna ". $pemilik->getMobil()->getWarna();

# Contoh Inheritance
# Mobil.php sudah diinisiasikan diatas
echo "<h2>Inheritance</h2>";
include_once('../oop/MobilListrik.php');

$mobilEV = new MobilListrik("Tesla", "Hitam");
$mobilEV->kapasitasBaterai = "75 KWh";
echo $mobilEV->isiDaya()
?>