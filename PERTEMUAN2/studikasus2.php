<?php

$member = "Non-member";
$belanja = 1200000;


$diskon = 0;
if ($member == "Non-member") {
    if ($belanja >=1500000) {
    $diskon = 5;}

else if ($belanja >=1000000 && $belanja <=1499999) {
    $diskon = 3;
} 

else if ($belanja <1000000) {
    $diskon = 0;
}}

if ($member == "Silver") {
    if ($belanja >=1500000) {
    $diskon = 15;}

else if ($belanja >=1000000 && $belanja <=1499999) {
    $diskon = 10;
} 

else if ($belanja <1000000) {
    $diskon = 5;
}}


if ($member == "Gold") {
    if ($belanja >=1500000) {
    $diskon = 20;}

else if ($belanja >=1000000 && $belanja <=1499999) {
    $diskon = 15;
} 

else if ($belanja <1000000) {
    $diskon = 10;
}}

$potongan = $belanja * ($diskon/100);
$total = $belanja - $potongan; 

echo "<br>=====Rincian Pembayaran=====<br>";
echo "Jenis Member : $member <br>";
echo "Total Belanja : " .number_format($belanja). "<br>";
echo "Diskon : $diskon % <br>";
echo "Potongan : Rp " .number_format($potongan);
echo "<br> Total Bayar : Rp " .number_format($total);
?>