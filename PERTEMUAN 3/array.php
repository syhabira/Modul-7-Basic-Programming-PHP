<?php 
// $produk = ["Laptop", "Mouse", "Keyboard"];
// echo $produk [0] . "<br>";
// echo $produk [1] . "<br>";
// echo $produk [2] . "<br>";

// $buah = [
//     "Nama" => "Melon",
//     "Warna" => "Hijau",
//     "Rasa" => "Manis"
// ];
// echo "Nama buah : " .$buah['Nama']. "<br>";
// echo "Warna buah : " .$buah['Warna']. "<br>";
// echo "Rasa buah : " .$buah['Rasa']. "<br>";

$produk = [
     [ "nama" =>"Mouse", "harga" => 7000000, "stok" =>10],
     [ "nama" =>"Laptop", "harga" => 15000000, "stok" =>17],
     [ "nama" =>"Monitor", "harga" => 10000000, "stok" =>20]
];
foreach($produk as $p) {
    echo "Nama Produk " . $p['nama'] . 

    ", Harga : Rp." . number_format ($p['harga'], 0, ",",".").  
    ", Stock " . $p['stok'] . "<br> <hr>";
}
?>