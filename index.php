<?php
echo "<h2>Variabel</h2>";
$nama = "Nanang";
$umur = 40;
$berat = 72.5;

echo "$nama<br>";
echo "usiamu $umur tahun<br>";
echo "berat badan $berat kg<br>";

echo "<h2>Looping - For</h2>";
for($x = 1; $x <= 10; $x++){
	echo "$x<br>";
}

echo "<h2>Looping - While</h2>";
$ulangi = 0;
while ($ulangi < 10) {
    echo "Ini adalah perulangan ke-$ulangi<br>";
    $ulangi++;
}

echo "<h2>Looping - Do...While</h2>";
$x = 1;
do {
    echo "ANGKA: $x <br>";
    $x++;
} while ($x <= 6);

echo "<h2>Logika</h2>";
$teman = "andi";

if ($teman == "budi") {
    echo "Budi adalah teman saya.";
} elseif ($teman == "andi") {
    echo "Andi adalah teman saya.";
} else {
    echo "Saya tidak punya teman.";
}

echo "<h2>Array</h2>";
$buah = array("apel", "mangga", "pisang");

// menampilkan seluruh data buah
foreach ($buah as $x) {
    echo "$x <br>";
}

// menampilkan buah yang berada 
// pada urutan pertama 
echo "Buah favorit: " . $buah[0];

echo "<h2>Objek</h2>";
class Manusia {
    public $nama;
    public function sapa() {
        echo "Halo, nama saya {$this->nama}!";
    }
}

$orang = new Manusia();
$orang->nama = "Nanang";
$orang->sapa(); // Output: "Halo, nama saya Nanang!"

echo "<h2>Method</h2>";
function hitungLuasPersegi($sisi) {
    return $sisi * $sisi;
}

$luas = hitungLuasPersegi(5);
echo "Luas persegi dengan sisi 5 adalah $luas";

echo "<h2>JSON</h2>";
$data = array(
    "nama" => "Nanang",
    "umur" => 40,
    "pekerjaan" => "Programmer"
);

$json_data = json_encode($data);
echo "Data JSON: $json_data";
?>