<?php

// $gaji = 8000000;
// $status = "tetap";


$gaji = 12000000;
$status = "Tetap";


$pajak = 0;
if ($gaji < 5000000) {
    $pajak = 5;
}
else if ($gaji >=5000000 && $gaji <= 10000000) {
    $pajak = 10;
}
else if ($gaji >=10000000 && $gaji <= 15000000) {
    $pajak = 15;
}
else if  ( $gaji >=15000000) {
    $pajak = 20;
}

if ($status == "Tetap") {
    $pajak += 5;
}
$potongan = $gaji * ($pajak/100);
$bersih = $gaji - $potongan;

// echo "<br>=====Rincian Pajak=====<br>";
// echo "Gaji bulanan : " .number_format($gaji). "<br>";
// echo "Status : $status<br>";
// echo "Potongan Gaji : " .number_format($potongan). " : "  .$pajak.  "%<br>";
// echo "Gaji Bersih : " .number_format($bersih);


echo "<br>=====Rincian Pajak=====<br>";
echo "Gaji Bulanan :  " .number_format($gaji). "<br>" ;
echo "Status Pegawai : $status. Pajak : $pajak.% <br>";
echo "Potongan Pajak : " .number_format($potongan). "<br>";
echo "Gaji Bersih : " .number_format($bersih). "<br>";

?>

