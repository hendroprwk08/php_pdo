<?php
$buah = array("apel", "mangga", "pisang");

// menampilkan seleurh data buah
foreach ($buah as $x) {
    echo "$x <br>";
}

// menmapilkan buah yang berada 
// pada urutan pertama 
echo "Buah favorit: " . $buah[0]; // Output: "Buah favorit: apel"
?>