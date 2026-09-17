<?php
/**
 * Konfigurasi Global Aplikasi
 * Sesuai prinsip Slide 4: Manajemen Data Memori (Konstanta bersifat immutable)
 * dan Slide 14: Pemisahan Berkas (Separation of Concerns)
 */

// Menentukan konstanta aplikasi menggunakan define() dan const
define("APP_NAME", "Product Information System");
define("APP_VERSION", "1.0.0");
define("MATA_UANG", "Rp");

// Aturan bisnis: Batas stok untuk status kritis
const BATAS_STOK_KRITIS = 3;

// Informasi institusi / mata kuliah
const NAMA_MATA_KULIAH = "Pemrograman Web - Pertemuan 2";
const TAHUN_AKADEMIK = "2026";
