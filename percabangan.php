<?php

$total_belanja = 500;

echo "Total Belanja Anda $total_belanja <br>";

if ($total_belanja >= 1000) {
    echo "Selamat anda mendapatkan diskon Rp. 500 ";
} else {
    echo "Anda tidak mendapat diskon <br>";
}

$hari = "sabtu";
if ($hari == "selasa") {
    echo "Menggunakan Seragam Putih Abu";
} else if ($hari == "selasa"){
    echo "Menggunakan Seragam Pramuka";
}
 else if ($hari == "rabu"){
    echo "Menggunakan Seragam Produktif";
}
 else if ($hari == "kamis"){
    echo "Menggunakan Seragam Batik";
}
 else if ($hari == "jumat"){
    echo "Menggunakan Seragam Gamis";
}
 else {
    echo "Hari Libur";
}