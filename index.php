<?php
/**
 * Presentation Layer: Titik Masuk Utama (Main Entry Point)
 * Sesuai prinsip Slide 14: Separation of Concerns (SoC)
 * dan Slide 17: Mini Project 1 Product Information System
 */

// 1. Merajut berkas inti menggunakan require_once (Level toleransi nol jika berkas hilang)
require_once 'config.php';
require_once 'products.php';
require_once 'functions.php';

// 2. Kalkulasi statistik dan metrik analitik inventori
$statistik = hitungStatistik($katalogProduk);

// 3. Render Header Layout
include 'layout_header.php';
?>

<!-- Kartu Ringkasan Metrik / KPI Gudang -->
<section class="metrics-grid">
    <div class="metric-card highlight">
        <div class="metric-label">Total Nilai Aset Gudang</div>
        <div class="metric-value highlight-value"><?= formatRupiah($statistik['total_aset']) ?></div>
        <div class="metric-hint">Akumulasi seluruh (harga &times; stok) komoditas</div>
    </div>

    <div class="metric-card">
        <div class="metric-label">Total Jenis Produk</div>
        <div class="metric-value"><?= $statistik['total_item'] ?></div>
        <div class="metric-hint">Item terdaftar dalam katalog aktif</div>
    </div>

    <div class="metric-card">
        <div class="metric-label">Total Unit Tersedia</div>
        <div class="metric-value"><?= $statistik['total_unit'] ?> <span style="font-size: 0.9rem; font-weight: normal; color: var(--text-muted);">Pcs</span></div>
        <div class="metric-hint">Total kuantitas fisik di gudang</div>
    </div>

    <div class="metric-card">
        <div class="metric-label">Stok Kritis / Habis</div>
        <div class="metric-value" style="color: <?= $statistik['total_kritis'] > 0 ? 'var(--status-warning-text)' : 'var(--status-safe-text)' ?>;">
            <?= $statistik['total_kritis'] ?>
        </div>
        <div class="metric-hint">Perlu restock segera (stok &lt; <?= BATAS_STOK_KRITIS ?>)</div>
    </div>
</section>

<!-- Banner Notifikasi Aturan Bisnis -->
<?php if ($statistik['total_kritis'] > 0): ?>
<div class="alert-banner">
    <div class="alert-icon">&#9888;&#65039;</div>
    <div class="alert-text">
        <strong>Aturan Bisnis Aktif:</strong> Ditemukan <strong><?= $statistik['total_kritis'] ?> produk</strong> dengan tingkat stok kritis (di bawah <?= BATAS_STOK_KRITIS ?> unit). Baris produk yang memerlukan restock telah disorot secara otomatis oleh sistem.
    </div>
</div>
<?php endif; ?>

<!-- Tabel Data Katalog Produk -->
<section class="table-card">
    <div class="table-header-bar">
        <h2>Daftar Komoditas &amp; Status Inventori</h2>
        <span class="category-pill"><?= count($katalogProduk) ?> Baris Data</span>
    </div>

    <div class="table-responsive">
        <table class="product-table">
            <thead>
                <tr>
                    <th>Kode SKU</th>
                    <th>Nama &amp; Deskripsi Produk</th>
                    <th>Kategori</th>
                    <th>Harga Satuan</th>
                    <th>Stok</th>
                    <th>Nilai Aset</th>
                    <th>Status Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Perulangan foreach untuk menelusuri data multidimensional array (Slide 8 & 17)
                foreach ($katalogProduk as $item): 
                    // Evaluasi status dan warna baris secara kondisional (Slide 7 & 17)
                    $status = getStatusStok($item['stok']);
                    $nilaiAsetPerItem = $item['harga'] * $item['stok'];
                ?>
                    <tr class="<?= $status['row_class'] ?>">
                        <td>
                            <span class="badge-id"><?= htmlspecialchars($item['id']) ?></span>
                        </td>
                        <td>
                            <div class="product-name-cell"><?= htmlspecialchars($item['nama']) ?></div>
                            <div class="product-desc"><?= htmlspecialchars($item['deskripsi']) ?></div>
                        </td>
                        <td>
                            <span class="category-pill"><?= htmlspecialchars($item['kategori']) ?></span>
                        </td>
                        <td class="price-text">
                            <?= formatRupiah($item['harga']) ?>
                        </td>
                        <td>
                            <strong style="font-size: 1rem;"><?= $item['stok'] ?></strong>
                        </td>
                        <td class="subtotal-text">
                            <?= formatRupiah($nilaiAsetPerItem) ?>
                        </td>
                        <td>
                            <span class="badge-status <?= $status['badge_class'] ?>">
                                <span class="pulse-dot"></span>
                                <?= $status['label'] ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr style="background: rgba(15, 23, 42, 0.95); font-weight: bold;">
                    <td colspan="5" style="text-align: right; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-muted);">
                        Total Akumulasi Nilai Aset Gudang:
                    </td>
                    <td class="subtotal-text" style="font-size: 1.05rem;" colspan="2">
                        <?= formatRupiah($statistik['total_aset']) ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</section>

<?php
// 4. Render Footer Layout
include 'layout_footer.php';
?>
