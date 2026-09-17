<?php
/**
 * Data Layer: Katalog Produk
 * Sesuai prinsip Slide 10 & 11: Multidimensional Associative Array
 * Menyimpan data komoditas produk: id, nama, kategori, harga, stok, deskripsi
 */

$katalogProduk = [
    [
        "id" => "PRD-001",
        "nama" => "Laptop Asus TUF Gaming",
        "kategori" => "Elektronik",
        "harga" => 14500000,
        "stok" => 5,
        "deskripsi" => "Laptop gaming bertenaga AMD Ryzen 7, RAM 16GB, dan NVIDIA RTX 4060."
    ],
    [
        "id" => "PRD-002",
        "nama" => "Keyboard Mekanikal TKL RGB",
        "kategori" => "Aksesoris",
        "harga" => 650000,
        "stok" => 2, // Stok Kritis (< 3)
        "deskripsi" => "Keyboard mekanikal blue switch dengan backlight RGB dinamis."
    ],
    [
        "id" => "PRD-003",
        "nama" => "Mouse Wireless Silent-Click",
        "kategori" => "Aksesoris",
        "harga" => 250000,
        "stok" => 12,
        "deskripsi" => "Mouse nirkabel ergonomis 2.4GHz dengan DPI hingga 2400."
    ],
    [
        "id" => "PRD-004",
        "nama" => "Monitor Gaming 24 Inch 144Hz",
        "kategori" => "Elektronik",
        "harga" => 1850000,
        "stok" => 1, // Stok Kritis (< 3)
        "deskripsi" => "Panel IPS Full HD dengan refresh rate 144Hz dan respon 1ms."
    ],
    [
        "id" => "PRD-005",
        "nama" => "SSD NVMe 1TB PCIe Gen4",
        "kategori" => "Komponen PC",
        "harga" => 1150000,
        "stok" => 8,
        "deskripsi" => "Kecepatan baca hingga 5000 MB/s untuk transfer data cepat."
    ],
    [
        "id" => "PRD-006",
        "nama" => "RAM DDR5 32GB Kit (2x16GB)",
        "kategori" => "Komponen PC",
        "harga" => 1750000,
        "stok" => 0, // Stok Habis (< 3)
        "deskripsi" => "Memori DDR5 6000MHz CL30 dengan heat spreader aluminium."
    ],
    [
        "id" => "PRD-007",
        "nama" => "Headset Gaming 7.1 Surround",
        "kategori" => "Audio",
        "harga" => 480000,
        "stok" => 6,
        "deskripsi" => "Audio spasial 7.1 dengan mikrofon detachable noise-cancelling."
    ],
    [
        "id" => "PRD-008",
        "nama" => "Webcam Full HD 1080p 60FPS",
        "kategori" => "Aksesoris",
        "harga" => 390000,
        "stok" => 2, // Stok Kritis (< 3)
        "deskripsi" => "Kamera streaming dengan auto-focus cerdas dan dual mikrofon stereo."
    ]
];
