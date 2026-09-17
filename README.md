Product Information System (PIS) 📦💻

Product Information System (PIS)** adalah aplikasi web inventori dan katalog produk berbasis "PHP Native" yang menerapkan konsep "Separation of Concerns (SoC)", "Multidimensional Associative Array", serta logika bisnis kondisional untuk memantau status stok dan menghitung nilai aset pergudangan.

Proyek ini dikembangkan sebagai pemenuhan Tugas Mata Kuliah Pemrograman Web — Pertemuan 2 / Mini Project 1.

---

📑 Daftar Isi

1. [Fitur Utama](#-fitur-utama)
2. [Arsitektur dan Struktur Berkas](#-arsitektur-dan-struktur-berkas)
3. [Konsep dan Prinsip Pemrograman](#-konsep-dan-prinsip-pemrograman)
4. [Prasyarat Sistem](#-prasyarat-sistem)
5. [Panduan Instalasi dan Menjalankan Aplikasi](#-panduan-instalasi-dan-menjalankan-aplikasi)
6. [Aturan Bisnis](#-aturan-bisnis)
7. [Penjelasan Berkas](#-penjelasan-berkas)
8. [Tampilan Antarmuka (UI/UX)](#-tampilan-antarmuka-uiux)
9. [Informasi Akademik](#-informasi-akademik)

---

✨ Fitur Utama

📊 Dashboard Metrik dan KPI Pergudangan

Dashboard menyediakan informasi ringkas mengenai kondisi inventori, meliputi:

- Total nilai aset gudang** berdasarkan akumulasi `harga × stok`.
- Total jenis produk** yang terdaftar dalam katalog.
- Total kuantitas produk** yang tersedia secara fisik.
- Jumlah produk kritis atau habis** yang membutuhkan perhatian.

⚠️ Deteksi Otomatis Stok Kritis

Sistem secara otomatis memeriksa kondisi stok setiap produk berdasarkan batas stok yang telah ditentukan.

Fitur yang tersedia:

- Alert banner ketika terdapat produk dengan stok kritis atau habis.
- Pulse indicator** untuk memberikan tanda visual.
- Status badge** berdasarkan kondisi stok.
- Row highlight** pada produk yang membutuhkan restock.

📋 Tabel Katalog Produk

Tabel katalog menampilkan informasi lengkap setiap produk, antara lain:

- SKU ID
- Nama produk
- Deskripsi
- Kategori
- Harga satuan
- Jumlah stok
- Nilai aset per produk
- Status ketersediaan

Setiap produk memiliki perhitungan nilai aset berdasarkan:

``` 
Nilai Aset = Harga Satuan × Jumlah Stok
```

Pada bagian footer tabel juga tersedia **rekapitulasi total nilai aset seluruh produk.

🎨 Modern Dark Mode UI

Antarmuka dirancang dengan gaya modern dan profesional menggunakan:

- Dark theme
- Konsep "glassmorphism"
- Tipografi yang rapi
- Layout berbasis Flexbox dan Grid
- Efek hover dan animasi sederhana
- Responsive design untuk desktop, tablet, dan perangkat mobile

---

🏗 Arsitektur dan Struktur Berkas

Proyek menggunakan pendekatan **Separation of Concerns (SoC)** dengan memisahkan data, konfigurasi, logika bisnis, dan tampilan ke dalam beberapa berkas.

```
tugas-mk-web/
│
├── config.php          # Konfigurasi global dan konstanta sistem
├── products.php        # Data produk dalam multidimensional associative array
├── functions.php       # Fungsi dan logika bisnis aplikasi
├── layout_header.php   # Template header dan bagian <head>
├── layout_footer.php   # Template footer aplikasi
├── index.php           # Halaman utama / presentation layer
├── style.css           # Styling dan desain antarmuka
└── README.md           # Dokumentasi proyek
```

Alur Sederhana Aplikasi

```catatan
config.php
     │
     ▼
products.php
     │
     ▼
functions.php
     │
     ▼
index.php
     │
     ├── layout_header.php
     │
     ├── Dashboard
     │
     ├── Tabel Produk
     │
     └── layout_footer.php
```

Struktur tersebut membuat setiap bagian aplikasi memiliki tanggung jawab yang lebih jelas dan mudah dikelola.

---

🧠 Konsep dan Prinsip Pemrograman

Proyek ini menerapkan beberapa konsep dasar PHP yang dipelajari dalam perkuliahan.

1. Separation of Concerns (SoC)

Kode aplikasi dipisahkan berdasarkan tanggung jawabnya:

- Configuration Layer → `config.php`
- Data Layer → `products.php`
- Processing Layer → `functions.php`
- Presentation Layer → `index.php`
- Template Layer → `layout_header.php` dan `layout_footer.php`

Pemisahan ini membuat kode lebih terstruktur, mudah dipahami, dan lebih mudah dikembangkan.

Penggunaan `require_once` diterapkan pada berkas yang bersifat penting, sedangkan `include` digunakan untuk komponen template atau layout.

2. Konstanta dan Konfigurasi

Nilai konfigurasi yang bersifat tetap didefinisikan menggunakan `define()` atau `const`.

Contohnya:

```php
define('APP_NAME', 'Product Information System');
define('BATAS_STOK_KRITIS', 3);
define('MATA_UANG', 'Rp');
```

Konstanta digunakan agar nilai konfigurasi tidak berubah selama proses eksekusi aplikasi.

### 3. Single Responsibility Principle (SRP)

Setiap fungsi memiliki tanggung jawab yang spesifik.

Contohnya:

```catatan
hitungTotalNilaiStok()
→ Menghitung total nilai aset produk

formatRupiah()
→ Memformat angka menjadi format mata uang Rupiah

getStatusStok()
→ Menentukan status stok produk

hitungStatistik()
→ Menghasilkan statistik inventori
```

Dengan pendekatan ini, fungsi lebih mudah digunakan kembali dan dipelihara.

4. Multidimensional Associative Array

Data produk disimpan menggunakan "multidimensional associative array".

Contoh struktur datanya:

```php
$products = [
    [
        'sku' => 'PRD001',
        'nama' => 'Laptop',
        'kategori' => 'Elektronik',
        'harga' => 7500000,
        'stok' => 5
    ],
    [
        'sku' => 'PRD002',
        'nama' => 'Keyboard',
        'kategori' => 'Aksesoris',
        'harga' => 350000,
        'stok' => 2
    ]
];
```

Setiap produk memiliki beberapa pasangan **key-value** seperti SKU, nama, kategori, harga, dan stok.

5. Percabangan dan Perulangan

Sistem menggunakan:

* `foreach` untuk melakukan iterasi terhadap data produk.
* `if`, `elseif`, dan `else` untuk menentukan status stok.
* Percabangan kondisional untuk menentukan tampilan dan styling berdasarkan kondisi produk.

---

⚙️ Prasyarat Sistem

Sebelum menjalankan aplikasi, pastikan sistem telah memiliki:

| Komponen   | Kebutuhan                                          |
| ---------- | -------------------------------------------------- |
| PHP        | Versi 8.0 atau lebih baru                          |
| Web Server | Apache / Nginx / PHP Built-in Server               |
| Browser    | Chrome, Firefox, Edge, atau browser modern lainnya |

PHP 8.0+ digunakan karena proyek memanfaatkan fitur modern PHP, termasuk **Union Types** seperti:

```php
int|float
```

---

🚀 Panduan Instalasi dan Menjalankan Aplikasi

Terdapat beberapa cara untuk menjalankan proyek ini secara lokal.

Opsi 1 — PHP Built-in Server

Metode ini merupakan cara paling sederhana untuk menjalankan aplikasi tanpa konfigurasi Apache.

1. Buka Terminal

Gunakan PowerShell, Command Prompt, atau Git Bash.

2. Masuk ke direktori proyek

```bash
cd "d:/tugas kuliah/tugas mk web"
```

3. Jalankan PHP Built-in Server

```bash
php -S localhost:8000
```

4. Buka aplikasi di browser

Akses:

```catatan
http://localhost:8000
```

---

Opsi 2 — XAMPP

Jika menggunakan XAMPP:

1. Pindahkan folder proyek ke:

```catatan
C:\xampp\htdocs\tugas-mk-web
```

2. Buka **XAMPP Control Panel**.
3. Jalankan "Apache".
4. Buka browser.
5. Akses:

```catatan
http://localhost/tugas-mk-web
```

---

Opsi 3 — Laragon

Jika menggunakan Laragon:

1. Pindahkan folder proyek ke:

```catatan
C:\laragon\www\tugas-mk-web
```

2. Jalankan Laragon.
3. Aktifkan web server.
4. Buka browser.
5. Akses:

```catatan
http://localhost/tugas-mk-web
```

---

📏 Aturan Bisnis

Sistem menentukan status stok berdasarkan konstanta:

```php
BATAS_STOK_KRITIS = 3
```

Aturan status stok yang digunakan:

| Jumlah Stok |   Status   |  Badge | Kondisi Tampilan | Keterangan                                            |
| ----------: | :--------: | :----: | :--------------- | :---------------------------------------------------- |
|         `0` |    Habis   |  Merah | Highlight merah  | Stok kosong dan menjadi prioritas utama untuk restock |
|       `1–2` |   Kritis   | Kuning | Highlight oranye | Stok berada di bawah batas aman                       |
|       `≥ 3` |    Aman    |  Hijau | Normal           | Stok dianggap mencukupi                               |

Logika Sederhana

```catatan
Jika stok = 0
    → Status: HABIS

Jika stok < 3
    → Status: KRITIS

Jika stok >= 3
    → Status: AMAN
```

---

📂 Penjelasan Berkas

| Berkas              | Tanggung Jawab                                                                                             |
| ------------------- | ---------------------------------------------------------------------------------------------------------- |
| `config.php`        | Menyimpan konfigurasi dan konstanta global seperti nama aplikasi, versi, batas stok kritis, dan mata uang. |
| `products.php`      | Menyimpan data produk menggunakan multidimensional associative array sebagai mock database.                |
| `functions.php`     | Menyimpan fungsi modular untuk perhitungan, formatting, evaluasi stok, dan statistik.                      |
| `layout_header.php` | Menyediakan struktur HTML bagian awal, `<head>`, navigasi, dan identitas aplikasi.                         |
| `layout_footer.php` | Menyediakan bagian footer dan penutup struktur HTML.                                                       |
| `index.php`         | Menjadi entry point utama dan presentation layer aplikasi.                                                 |
| `style.css`         | Mengatur layout, warna, typography, badge, efek visual, animasi, dan responsive design.                    |
| `README.md`         | Berisi dokumentasi mengenai proyek, instalasi, struktur, dan konsep yang digunakan.                        |

---

🎨 Tampilan Antarmuka (UI/UX)

PIS menggunakan konsep desain "Modern Dark Dashboard" dengan beberapa karakteristik utama.

🎨 Color Palette

Warna utama menggunakan:

```catatan
Background : #0f172a
Accent     : Indigo / Sky Blue
```

Palet tersebut digunakan untuk menghasilkan tampilan dashboard yang modern dengan nuansa teknologi.

🪟 Glassmorphism

Beberapa komponen menggunakan efek semi-transparan dan `backdrop-filter` untuk memberikan tampilan glassmorphism.

✨ Interaktivitas

Antarmuka dilengkapi dengan beberapa efek visual, seperti:

- Pulse indicator pada status tertentu.
- Status badge berdasarkan kondisi stok.
- Hover effect pada tabel.
- Row highlight untuk produk kritis atau habis.
- Responsive layout untuk berbagai ukuran layar.

---

🎯 Tujuan Pengembangan

Proyek ini dibuat untuk mengimplementasikan konsep dasar PHP dalam sebuah aplikasi sederhana yang memiliki alur kerja nyata.

Melalui proyek ini, beberapa konsep yang dipraktikkan meliputi:

- Sintaks dasar PHP.
- Variabel dan konstanta.
- Array dan multidimensional associative array.
- Percabangan `if-elseif-else`.
- Perulangan `foreach`.
- Function dan parameter.
- Perhitungan data.
- Pemisahan kode menggunakan **Separation of Concerns**.
- Penggunaan `include` dan `require_once`.
- Integrasi PHP dengan HTML dan CSS.
- Pembuatan antarmuka dashboard sederhana.

---

👨‍💻 Informasi Akademik

| Informasi          | Detail                                                           |
| ------------------ | ---------------------------------------------------------------- |
|   Mata Kuliah      | Pemrograman Web                                                  |
|   Materi           | Pertemuan 2 — Sintaks Dasar PHP, Array, & Separation of Concerns |
|   Proyek           | Mini Project 1                                                   |
|   Tahun Akademik   | 2026                                                             |
|   Teknologi        | PHP Native, HTML, CSS                                            |

---

📌 Catatan

Proyek ini masih menggunakan "mock database berbasis array PHP" dan belum menggunakan database seperti MySQL.

Pengembangan selanjutnya dapat mencakup:

- Integrasi database MySQL.
- Fitur CRUD produk.
- Sistem login dan autentikasi.
- Pencarian dan filter produk.
- Sistem kategori produk.
- Riwayat stok masuk dan keluar.
- Laporan inventori.
- Export data ke PDF atau Excel.

---

Product Information System (PIS)
Mini Project 1 — Pemrograman Web 2026
