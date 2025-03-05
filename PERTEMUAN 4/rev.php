<?php
session_start();

// Inisialisasi session jika belum ada
if (!isset($_SESSION['siswaList'])) {
    $_SESSION['siswaList'] = [];
}

// Hapus data jika tombol "Hapus Hasil" ditekan
if (isset($_POST['hapus'])) {
    $_SESSION['siswaList'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['hitung'])) {
    // Pastikan semua input tersedia
    if (isset($_POST['nama']) && isset($_POST['tugas']) && isset($_POST['uts']) && isset($_POST['uas'])) {
        $nama = $_POST['nama'];
        $tugas = $_POST['tugas'];
        $uts = $_POST['uts'];
        $uas = $_POST['uas'];
        
        // Hitung nilai akhir
        $hasil = ($tugas * (30/100)) + ($uts*(30/100)) + ($uas*(40/100));
        
        // Tentukan kategori
        if ($hasil <= 60) {
            $kategori = "C";
        } elseif ($hasil <= 80) {
            $kategori = "B";
        } else {
            $kategori = "A";
        }
        
        // Simpan data ke session
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
<body class="bg-gray-100 flex flex-row items-center justify-evenly min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold text-center mb-8">Form Input Nilai Siswa</h2>
        <form action="" method="post">
            <div class="text-gray-500 font-semibold mb-2">Nama Siswa</div>
            <input type="text" name="nama" class="w-full p-2 mb-5 border border-gray-400 rounded-md"> 

            <div class="text-gray-500 font-semibold mb-2">Nilai Tugas</div>
            <input type="number" name="tugas" class="w-full p-2 mb-5 border border-gray-400 rounded-md"> 

            <div class="text-gray-500 font-semibold mb-2">Nilai UTS</div>
            <input type="number" name="uts" class="w-full p-2 mb-5 border border-gray-400 rounded-md">

            <div class="text-gray-500 font-semibold mb-2">Nilai UAS</div>
            <input type="number" name="uas" class="w-full p-2 mb-5 border border-gray-400 rounded-md"> 

            <input type="submit" name="hitung" value="Hitung Nilai" class="w-full bg-blue-700 p-2 text-white rounded-md font-semibold hover:bg-blue-400 mb-5">
        </form>
    </div>

    <!-- Bagian hasil penilaian -->
    <div class="bg-white p-8 rounded-lg shadow-lg w-150 mt-10">
        <h2 class="text-2xl font-bold text-center mb-8">Hasil Penilaian</h2>
        <table class="table-auto w-full text-left border-collapse border border-gray-200">
            <thead class="bg-black text-white">
                <tr>
                    <th class="py-2 border border-gray-200 text-center p-4">Nama</th>
                    <th class="py-2 border border-gray-200 text-center p-4">Nilai Akhir</th>
                    <th class="py-2 border border-gray-200 text-center p-4">Kategori</th>
                </tr>
            </thead>
            <tbody class="bg-white text-gray-500">
                <?php if (!empty($_SESSION['siswaList'])) : ?>
                    <?php foreach ($_SESSION['siswaList'] as $siswa) : ?>
                        <tr>
                            <td class="py-3 border border-gray-200 text-center p-4"><?php echo htmlspecialchars($siswa['nama']); ?></td>
                            <td class="py-3 border border-gray-200 text-center p-4"><?php echo htmlspecialchars($siswa['hasil']); ?></td>
                            <td class="py-3 border border-gray-200 text-center p-4"><?php echo htmlspecialchars($siswa['kategori']); ?></td>
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