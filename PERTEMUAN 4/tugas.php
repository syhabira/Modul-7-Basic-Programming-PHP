<?php
session_start();

// Inisialisasi session jika belum ada
if (!isset($_SESSION['gajiList'])) {
    $_SESSION['gajiList'] = [];
}

// Hapus data jika tombol "Hapus Hasil" ditekan
if (isset($_POST['hapus'])) {
    $_SESSION['gajiList'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['hitung'])) {
    // Pastikan semua input tersedia
    if (isset($_POST['jabatan']) && isset($_POST['jam']) ) {
        $jabatan = $_POST['jabatan'];
        $jam = $_POST['jam']; // Pastikan jam kerja berupa angka
        $bonus = 0;
   if ($jabatan == "Manager") {
            $pokok = 10000000;
            $pajak = 15;
        } elseif ($jabatan == "Staff") {
            $pokok = 3000000;
            $pajak = 5;
        } elseif ($jabatan == "Supervisor") {
            $pokok = 5000000;
            $pajak = 10;
        } 

if ($jam >200){ 
    $bonus = ($jam - 200) *20000;
}

        // Hitung nilai akhir
        $potongan = $pokok *($pajak/100);
        $bersih = $pokok - $potongan + $bonus;  
        
        
        // Simpan data ke session
        $_SESSION['gajiList'][] = [
            'pokok' => $pokok,
            'bersih' => $bersih
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
<body class="bg-gray-100 flex flex-row items-center justify-evenly min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold text-center mb-8">Form Gaji</h2>
        <form action="" method="post">
            <div class="text-gray-500 font-semibold mb-2">Jabatan</div>
            <input type="text" name="jabatan" class="w-full p-2 mb-5 border border-gray-400 rounded-md"> 

            <div class="text-gray-500 font-semibold mb-2">Jam Kerja</div>
            <input type="number" name="jam" class="w-full p-2 mb-5 border border-gray-400 rounded-md"> 

            <input type="submit" name="hitung" value="Hitung Nilai" class="w-full bg-blue-700 p-2 text-white rounded-md font-semibold hover:bg-blue-400 mb-5">
        </form>
    </div>

    <!-- Bagian hasil penilaian -->
    <div class="bg-white p-8 rounded-lg shadow-lg w-150 mt-10">
        <h2 class="text-2xl font-bold text-center mb-8">Hasil Gaji</h2>
        <table class="table-auto w-full text-left border-collapse border border-gray-200">
            <thead class="bg-black text-white">
                <tr>
                    <th class="py-2 border border-gray-200 text-center p-4">Gaji Pokok</th>
                    <th class="py-2 border border-gray-200 text-center p-4">Gaji Bersih</th>
                </tr>
            </thead>
            <tbody class="bg-white text-gray-500">
                <?php if (!empty($_SESSION['gajiList'])) : ?>
                    <?php foreach ($_SESSION['gajiList'] as $hasil) : ?>
                        <tr>
                            <td class="py-3 border border-gray-200 text-center p-4"><?php echo ($hasil['pokok']); ?></td>
                            <td class="py-3 border border-gray-200 text-center p-4"><?php echo ($hasil['bersih']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3" class="py-3 border border-gray-200 text-center p-4">Belum ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <form action="" method="post">
            <button type="submit" name="hapus" value="Hapus Hasil" class="w-full bg-red-600 p-2 text-white rounded-md font-semibold hover:bg-red-400 mt-10"> 
                Hapus Semua Data
            </button>
        </form>
    </div>
</body>
</html>