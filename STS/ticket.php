<?php
session_start();

// Inisialisasi session jika belum ada
if (!isset($_SESSION['buyList'])) {
    $_SESSION['buyList'] = [];
}

// Hapus data jika tombol "Hapus Hasil" ditekan
if (isset($_POST['hapus'])) {
    $_SESSION['buyList'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['hitung'])) {
    // Pastikan semua input tersedia
    if (isset($_POST['nama']) && isset($_POST['tanggal']) && isset($_POST['kategori']) && isset($_POST['hari']) && isset($_POST['jumlah'])) {
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal'];
        $kategori = $_POST['kategori'];
        $hari = $_POST['hari'];
        $jumlah = $_POST['jumlah'];
        $harga= 0;
        if($kategori =="Domestik" && $hari == "Weekday"){
            $harga= 185000;
        }
        else if($kategori =="Domestik" && $hari == "Weekend"){
            $harga= 195000;
        }

        if($kategori =="Internasional" && $hari == "Weekday"){
            $harga= 400000;
        }
        else if($kategori =="Internasional" && $hari == "Weekend"){
            $harga= 500000;
        }

        // Hitung nilai akhir
        $total = ($harga * $jumlah);
        
        $diskon = 0;

        if ($jumlah >=10) {
            $diskon = 20;}

        else if ($jumlah >=5) {
            $diskon = 10;
        } 

        $seluruh = $total - ($total * ($diskon /100) );

        
        // Simpan data ke session
        $_SESSION['buyList'][] = [
            'nama' => $nama,
            'tanggal' => $tanggal,
            'kategori' => $kategori,
            'hari' => $hari,
            'jumlah' => $jumlah,
            'total' => $total,
            'diskon' => $diskon,
            'seluruh' => $seluruh,

        ];
    }
}
$final = 0;
if (!empty($_SESSION['buyList'])) {
    foreach ($_SESSION['buyList'] as $buyer) {
        $final += $buyer['seluruh']; // Tambahkan setiap total pembelian
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
<body class="bg-gray-100 gap-20 flex lg:flex-row md:flex-col items-center justify-evenly min-h-screen px-35">
    <div class="bg-white p-8 rounded-lg shadow-lg w-fit ">
        <h2 class="text-2xl font-bold text-emerald-500 text-center mb-8">Pencatatan Transaksi</h2>
        <form action="" method="post">
            <div class="text-gray-500 font-semibold mb-2">Nama Pembeli</div>
            <input type="text" name="nama" class="w-full p-2 mb-5 border border-gray-400 rounded-md"> 

            <div class="text-gray-500 font-semibold mb-2">Tanggal</div>
            <input type="date" name="tanggal" class="text-gray-700 w-full p-2 mb-5 border border-gray-400 rounded-md"> 

            <div class="text-gray-500 font-semibold mb-2">Kategori Tiket</div>
            <select name="kategori" class="w-full p-2 mb-5 border bordey-gray-400 rounded-md text-gray-700">
                <option value="Internasional">Internasional</option>
                <option value="Domestik">Domestik</option>
             </select>
            
             <div class="text-gray-500 font-semibold mb-2">Jenis Hari</div>
            <select name="hari" class="w-full p-2 mb-5 border bordey-gray-400 rounded-md text-gray-700">
                <option value="Weekend">Weekend</option>
                <option value="Weekday">Weekday</option>
             </select>

            <div class="text-gray-500 font-semibold mb-2">Jumlah Tiket</div>
            <input type="number" name="jumlah" class="w-full p-2 mb-5 border border-gray-400 rounded-md">
             
            <input type="submit" name="hitung" value="Hitung Nilai" class="w-full bg-emerald-500 p-2 text-white rounded-md font-semibold hover:bg-emerald-300 mb-5">
        </form>
    </div>

    <!-- Bagian hasil penilaian -->
    <div class="bg-white p-8 rounded-lg shadow-lg w-fit mt-10">
        <h2 class="text-emerald-500 text-2xl font-bold text-center mb-8">Daftar Pemesanan Tiket</h2>
        <table class="table-auto w-full text-left border-collapse border border-gray-200">
            <thead class="bg-emerald-500 text-white">
                <tr>
                    <th class="py-2 border border-gray-200 text-center p-4">Nama Pembeli</th>
                    <th class="py-2 border border-gray-200 text-center p-4">Kategori Tiket</th>
                    <th class="py-2 border border-gray-200 text-center p-4">Jenis Hari</th>
                    <th class="py-2 border border-gray-200 text-center p-4">Tanggal</th>
                    <th class="py-2 border border-gray-200 text-center p-4">Jumlah Tiket</th>
                    <th class="py-2 border border-gray-200 text-center p-4">Total Harga</th>
                    <th class="py-2 border border-gray-200 text-center p-4">Diskon</th>
                    <th class="py-2 border border-gray-200 text-center p-4">Total Harga Setelah Diskon</th>
                </tr>
            </thead>
            <tbody class="bg-white text-gray-500">
                <?php if (!empty($_SESSION['buyList'])) : ?>
                    <?php foreach ($_SESSION['buyList'] as $buyer) : ?>
                        <tr>
                           <td class="py-3 border border-gray-200 text-center p-4"><?php echo htmlspecialchars($buyer['nama']); ?></td>
                            <td class="py-3 border border-gray-200 text-center p-4"><?php echo htmlspecialchars($buyer['kategori']); ?></td>
                            <td class="py-3 border border-gray-200 text-center p-4"><?php echo htmlspecialchars($buyer['hari']); ?></td>
                            <td class="py-3 border border-gray-200 text-center p-4"><?php echo htmlspecialchars($buyer['tanggal']); ?></td>
                            <td class="py-3 border border-gray-200 text-center p-4"><?php echo htmlspecialchars($buyer['jumlah']); ?></td>
                            <td class="py-3 border border-gray-200 text-center p-4"><?php echo number_format($buyer['total'], 0, ',', '.'); ?></td>
                            <td class="py-3 border border-gray-200 text-center p-4"><?php echo htmlspecialchars($buyer['diskon']); ?> % </td>
                            <td class="py-3 border border-gray-200 text-center p-4"><?php echo number_format($buyer['seluruh'], 0, ',', '.'); ?></td>

                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8" class="py-3 border border-gray-200 text-center p-4">Belum ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <h2 class="mt-5 bg-gray-300 p-3 rounded-md font-semibold">Total Keseluruhan Setelah Diskon : Rp <?= number_format($final, 0, ',', '.'); ?> </h2>
        <form action="" method="post">
            <button type="submit" name="hapus" value="Hapus Hasil" class="w-full bg-red-600 p-2 text-white rounded-md font-semibold hover:bg-red-400 mt-10"> 
                Hapus Semua Data
            </button>
        </form>
    </div>
</body>
</html>