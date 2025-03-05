
<?php
// isset() memeriksa apakah variabel ada dan tidak bernilai null. mengembalikan true jika variabel ada dan tidak null.

// !isset() memeriksa apakah variabel tidak ada atau bernilai null. mengembalikan true jika variabel tidak ada atau null.

// session : digunakan untuk menyimpan data sementara yang dapat diakses oleh pengguna selama perode tertentu.

session_start();

 if(!isset($_SESSION['siswaList'])){ //true         
 $_SESSION['siswaList'] = []; //  jika kondisi true maka akan dibuatkan array kosong
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    // CEK APAKAH INPUTAN FORM ADA DAN TIDAK KOSONG
    if(isset($_POST['nama']) && isset($_POST['tugas']) && isset($_POST['uts']) && isset($_POST['uas']))
    {
         $nama =  $_POST['nama'];
            $tugas = $_POST['tugas'];
            $uts = $_POST['uts'];
            $uas = $_POST['uas'];
            $nilai = $_POST['hitung'];
            $hasil = ($tugas*(30/100)) + ($uts*(30/100)) + ($uas*(40/100));

        switch ($hasil) {
             case $hasil <= 60:
                $kategori = "C";
                break;
            case $hasil <= 80:
                $kategori = "B";
                break;
            case $hasil <= 100:
                $kategori = "A";
                break; 
        }
            // simpan data kedalam sesi
    $_SESSION['siswaList'][] = [
        'nama' => $nama,
        'hasil' => $hasil,
        'kategori' => $kategori
    ];
    }

}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  </head>
   <body class="bg-gray-100 flex flex-row gap-15 items-center justify-center min-h-screen">
 <div class="bg-white p-8 rounded-lg shadow-lg w-96 ">
        <h2 class="text-2xl font-bold text-center mb-8 ">
            Form Input Nilai Siswa
        </h2>
        <form action="" method="post">
            
            <div class="text-gray-500 font-semibold mb-2">Nama Siswa</div>
            <input type="text" name="nama" class="w-full p-2 mb-5 border border-gray-400 rounded-md"> 

            <div class="text-gray-500 font-semibold mb-2">Nilai Tugas</div>
            <input type="text" name="tugas" class="w-full p-2 mb-5 border border-gray-400 rounded-md"> 

            <div class="text-gray-500 font-semibold mb-2">Nilai UTS</div>
            <input type="text" name="uts" class="w-full p-2 mb-5 border border-gray-400 rounded-md">

            <div class="text-gray-500 font-semibold mb-2">Nilai UAS</div>
            <input type="text" name="uas" class="w-full p-2 mb-5 border border-gray-400 rounded-md"> 

             <input type="submit" name="hitung" value="Hitung Nilai" class="w-full bg-blue-700 p-2 text-white rounded-md font-semibold hover:bg-blue-400 mb-5">
        </form>
    </div>

    <!-- ================ -->

    <div class="bg-white p-8 rounded-lg shadow-lg w-150 mb-10 ">
        <h2 class="text-2xl font-bold text-center mb-8 ">
            Hasil Penilaian
        </h2>
        <table class="table-fixed w-full text-left">
        <thead class=" bg-[#000000] text-[#e5e7eb]" style="background-color: #000000; color: #e5e7eb;">
            <tr>
                <!--[-->
                <td class="py-2 border border-gray-200 text-center font-bold p-4" contenteditable="true">Nama</td>
                <td contenteditable="true" class="py-2 border border-gray-200 text-center font-bold p-4">Nilai Akhir</td>
                <td contenteditable="true" class="py-2 border border-gray-200 text-center font-bold p-4">Kategori</td>
                <!--]-->
            </tr>
        </thead>
        <tbody class="bg-white text-gray-500 bg-[#FFFFFF] text-[#000000]" style="background-color: #FFFFFF; color: #000000;">
            <!--[-->
            <tr class=" py-5">
                <!--[-->
                <td class="py-3 border border-gray-200 text-center  p-4" contenteditable="true" name="nama-murid"><?php echo $nama ?></td>
                <td contenteditable="true" class="py-3 border border-gray-200 text-center p-4"><?php echo $hasil ?></td>
                <td contenteditable="true" class="py-3 border border-gray-200 text-center  p-4"><?php echo $kategori ?></td>
                <!--]-->
            </tr>
            <!--]-->
        </tbody>
    </table>
       <form action="" method="post">
        <input type="submit" name="hapus" value="Hapus Hasil" class="w-full bg-red-600 p-2 text-white rounded-md font-semibold hover:bg-red-400 mt-10">
    </form>
    </div>

  </body>
</html>