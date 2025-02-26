<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  </head>
  <body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <?php
    $bilangan1="";
    $bilangan2="";
    $hasil="";
    $operasi="";

    if(isset($_POST['hitung'])){
        $bilangan1 = $_POST['bill1'];
        $bilangan2 = $_POST['bill2'];
        $operasi = $_POST['operasi'];
        
        
        switch ($operasi) {
            case 'tambah':
                $hasil = $bilangan1 + $bilangan2;
                break;
            case 'kurang':
                $hasil = $bilangan1 - $bilangan2;
                break;
            case 'kali':
                $hasil = $bilangan1 * $bilangan2;
                break;
            case 'bagi':
                if ($bilangan2 == 0) {
                    $hasil = "Cannot Devide By 0";
                } else {$hasil = $bilangan1 / $bilangan2;}
                break;
        }
        
    }
    ?>
    <div class="bg-white p-8 rounded-lg shadow-lg w-96 ">
        <h2 class="text-2xl font-bold text-center mb-8  text-indigo-700">
            KALKULATOR
        </h2>
        <form action="" method="POST">
            <input type="text" name="bill1" class="w-full p-3 mb-5 border border-gray-400 rounded-md" placeholder="Masukkan Bilangan Pertama" autocomplete="off"> </input>
            <input type="text" name="bill2" class="w-full p-3 mb-5 border border-gray-400 rounded-md" placeholder="Masukkan Bilangan Kedua" autocomplete="off"> </input>
             <select name="operasi" class="w-full p-3 mb-5 border border-gray-400 rounded-md">
                <option value="tambah"> +</option>
                <option value="kurang"> -</option>
                <option value="kali"> x </option>
                <option value="bagi"> / </option>
             </select>
             <input type="submit" name="hitung" value="Hitung" class="w-full bg-indigo-700 p-3 text-white rounded-md font-semibold hover:bg-indigo-500 mb-5"></input>

             <input type="text" name="hasil" class="w-full p-3 mb-5 border border-gray-400 rounded-md" placeholder="Hasil Bilangan" readonly autocomplete-off value="<?php echo $hasil; ?>"></input>
        </form>
    </div>

  </body>
</html>
