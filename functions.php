<?php
/**
 * Processing Layer: Repositori Fungsi Logika Bisnis & Helper
 * Sesuai prinsip Slide 9: Single Responsibility Principle (SRP)
 * dan Slide 7 & 17: Logika Percabangan & Kalkulasi Nilai Aset Gudang
 */

/**
 * Menghitung akumulasi total nilai aset gudang berdasarkan (harga * stok)
 * 
 * @param array $produk Data katalog produk
 * @return int Total nominal nilai aset
 */
function hitungTotalNilaiStok(array $produk): int {
    $totalNilai = 0;
    foreach ($produk as $item) {
        $totalNilai += ($item["harga"] * $item["stok"]);
    }
    return $totalNilai;
}

/**
 * Format angka numerik ke representasi mata uang Rupiah
 * 
 * @param int|float $angka Nilai angka
 * @return string Teks terformat (contoh: Rp 1.500.000)
 */
function formatRupiah(int|float $angka): string {
    $simbol = defined("MATA_UANG") ? MATA_UANG : "Rp";
    return $simbol . " " . number_format($angka, 0, ',', '.');
}

/**
 * Evaluasi status stok produk dan penentuan kelas visual baris tabel
 * Menerapkan logika kondisional bersyarat sesuai Slide 7 & 17
 * 
 * @param int $stok Jumlah stok produk saat ini
 * @return array Asosiasi status label, badge css, baris css, dan flag kritis
 */
function getStatusStok(int $stok): array {
    $batasKritis = defined("BATAS_STOK_KRITIS") ? BATAS_STOK_KRITIS : 3;

    if ($stok === 0) {
        return [
            "label" => "Habis",
            "keterangan" => "Stok Kosong",
            "badge_class" => "badge-danger",
            "row_class" => "row-stock-out",
            "is_kritis" => true
        ];
    } elseif ($stok < $batasKritis) {
        return [
            "label" => "Kritis",
            "keterangan" => "Sisa " . $stok . " unit",
            "badge_class" => "badge-warning",
            "row_class" => "row-stock-critical",
            "is_kritis" => true
        ];
    } else {
        return [
            "label" => "Aman",
            "keterangan" => "Tersedia (" . $stok . ")",
            "badge_class" => "badge-success",
            "row_class" => "row-stock-safe",
            "is_kritis" => false
        ];
    }
}

/**
 * Menghasilkan ringkasan analitik statistik inventori
 * 
 * @param array $produk Data katalog produk
 * @return array Ringkasan metrik produk
 */
function hitungStatistik(array $produk): array {
    $totalItem = count($produk);
    $totalUnit = 0;
    $totalKritis = 0;

    foreach ($produk as $item) {
        $totalUnit += $item["stok"];
        $status = getStatusStok($item["stok"]);
        if ($status["is_kritis"]) {
            $totalKritis++;
        }
    }

    return [
        "total_item" => $totalItem,
        "total_unit" => $totalUnit,
        "total_kritis" => $totalKritis,
        "total_aset" => hitungTotalNilaiStok($produk)
    ];
}
