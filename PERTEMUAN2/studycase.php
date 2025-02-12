<?php
$pokok = 10000000;
$jabatan = "Manager";
$jam = 300;
if ($pokok <=3000000) 
{  
    $pajak = 5;
}
else if ($pokok >3000000 && $pokok <=5000000) {
    $pajak = 10;
}
else if ($pokok >5000000){
    $pajak = 15;
}
if ($jam >200){ 
    $bonus = ($jam - 200) *20000;
}

$potongan = $pokok *($pajak/100);
$bersih = $pokok - $potongan + $bonus;

echo "<br>==== SLIP GAJI KARYAWAN====<br>";
echo "Jabatan          : $jabatan";
echo "<br> Gaji Pokok  :" .number_format($pokok). "<br>";
echo "Jam : $jam";
echo "<br> Bonus : " .number_format($bonus). "<br>";
echo " Pajak : " .number_format($potongan). " |" .$pajak."%<br>";
echo "Gaji Bersih : " .number_format($bersih). "<br>";


?>