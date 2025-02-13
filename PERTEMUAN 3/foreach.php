<?php

$daftar = [
    [
        "nama" =>"Keyza", "nilai" =>85
    ],
    [
        "nama" =>"Yunita", "nilai" =>15
    ],
    [
        "nama" =>"Sabria", "nilai" =>80
    ],
    [
        "nama" =>"Jasmine", "nilai" =>70
    ],
];





echo "<h1>Daftar Nilai Siswa</h1>";

// Data untuk tabel (misalnya, array atau variabel PHP)

echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>Nama</th><th>Nilai</th><th>Keterangan</th></tr>";  // Header tabel

// Menampilkan data
foreach ($daftar as $d) {
    echo "<tr style='text-align: center;'>";
    echo "<td>" . $d["nama"] . "</td>";
    echo "<td>" . $d["nilai"] . "</td>";
    
    
if($d["nilai"]>=85 && $d["nilai"]<=100){
        echo "<td style='color: green;'> Lulus </td>";
}
elseif ($d["nilai"] <85 && $d["nilai"] >=75) {
        echo "<td style='color: blue;'> Remedial </td>";
}
else {
    echo "<td style='color: red;'> Tidak Lulus </td>";
}
    
    
    echo "</tr>";
}

echo "</table>";
?>