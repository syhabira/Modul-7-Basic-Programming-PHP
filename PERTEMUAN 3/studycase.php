<?php

$daftar = [
    [
        "nama" =>"Keyza", "nilai" =>85, "keterangan" =>"Lulus"
    ],
    [
        "nama" =>"Yunita", "nilai" =>82, "keterangan" =>"Lulus"
    ],
    [
        "nama" =>"Sabria", "nilai" =>80, "keterangan" =>"Lulus"
    ],
    [
        "nama" =>"Jasmine", "nilai" =>70, "keterangan" =>"Tidak Lulus"
    ],
];

// if("nilai">=85 && "nilai"<=100){
//     echo "Lulus";
// }
// elseif ("nilai" <85 && "nilai" >=75) {
//     echo "Remedial";
// }
// else

echo "<h1>Daftar Nilai Siswa</h1>";

// Data untuk tabel (misalnya, array atau variabel PHP)

echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>Nama</th><th>Nilai</th><th>Keterangan</th></tr>";  // Header tabel

// Menampilkan data
foreach ($daftar as $row) {
    echo "<tr>";
    echo "<td>" . $row["nama"] . "</td>";
    echo "<td>" . $row["nilai"] . "</td>";
    echo "<td>" . $row["keterangan"] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>