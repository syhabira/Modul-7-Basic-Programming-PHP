<?php 

$usia = 1000;

if ($usia == 0){
    echo "Usia Bayi";
}
else if ($usia >=1 && $usia <=12){
    echo "Kehidupan : Usia Anak Anak";
}
else if ($usia >=13 && $usia <=17){
    echo "Kehidupan : Usia Remaja";
}
else if ($usia >=18 && $usia <=50){
    echo "Kehidupan : Usia Anak Anak";
}
else if ($usia >=50 && $usia <=100){
    echo "Kehidupan : Lansia";
}
else {
    echo "Kehidupan : MATI💀`";
}

