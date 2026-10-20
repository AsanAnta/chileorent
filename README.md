# 🎭 Chileorent

**Marketplace Sewa & Solusi Alih Fungsi Kostum Cosplay Terpercaya**

Chileorent adalah platform web yang menghubungkan cosplayer yang ingin merental kostum dengan para pemilik usaha rental (terutama yang sedang menutup usahanya) dan cosplayer yang ingin memonetisasi/mengalihfungsikan kostum lama mereka agar tidak sekadar menimbun di lemari.

---

## ✨ 6 Pilar Fitur Utama

1. **Marketplace Sewa Kostum Cosplay**: Katalog lengkap anime, game, VTuber, dan serial favorit dengan filter mendalam dan ketersediaan jadwal.
2. **Sistem Nego Fleksibel (Pilihan 0% - 8%)**: Fitur tawar-menawar harga terkontrol khusus alih fungsi kostum dengan toleransi 0% (harga pas) hingga maksimal 8% guna melindungi margin pemilik aset.
3. **Sistem Escrow (Rekening Bersama Otomatis)**: Uang sewa, uang jaminan deposit, dan dana pembelian diamankan di rekening bersama hingga kostum diterima dan diverifikasi dengan baik.
4. **Sistem Alur Alih Fungsi Produk**: 3 skema fleksibel bagi pemilik kostum lama: Jual Putus, Titip Sewa (Konsinyasi), atau Akuisisi Borongan oleh Chileorent (solusi rental tutup).
5. **Pusat Verifikasi & Jaminan Keamanan**: Standarisasi mutu fisik kostum (Grade A/B/C), verifikasi identitas (KYC), serta opsi deposit opsional (khusus penyewa baru).
6. **Sistem Manajemen Rental Pintar Multi-Peran**: Dasbor adaptif untuk Pengelola Luas (Owner & Admin), Penjual (Tracking Alih Fungsi & Nego), dan Perental (Status Sewa & Wishlist).

---

## 📂 Struktur Berkas Proyek

```text
Chileorent/
├── data/
│   └── costumes.json     # Endpoint REST API Data Kostum Cosplay (JSON)
├── api/
│   └── costumes.json     # Endpoint Alias REST API
├── index.php             # Implementasi Week 5: PHP Prosedural & Server-Side Rendering (SSR)
├── index.html            # Beranda Utama (Hero, Highlight Katalog API, Escrow, FAQ)
├── catalog.html          # Katalog Marketplace Sewa (Live Fetch API, Filter & Inspector)
├── detail-kostum.html    # Detail Sewa Kostum (Sinkronisasi Data API & Form Booking)
├── alih-fungsi.html      # Alur Alih Fungsi, Slider Nego 0-8%, Kalkulator Aman & Simulasi
├── dashboard-rental.html # Dasbor Multi-Peran (Pengelola Luas, Penjual, Perental)
├── login.html            # Portal Masuk Pengelola & Member Komunitas
├── register.html         # Pendaftaran Akun Sesuai Peran
├── admin-dashboard.html  # Panel Kontrol Admin (Kurasi Grade A/B/C, Audit Escrow)
├── app.js                # Engine Utama & Modul ChileoAPI (Fetch API Integration)
├── style.css             # Seluruh Aturan Styling CSS & Desain Sistem Responsif
├── .gitignore            # Konfigurasi file yang diabaikan Git
└── README.md             # Dokumentasi Proyek
```

---

## 🚀 Cara Menjalankan Proyek Secara Lokal

### Cara 1: Langsung Buka di Browser
Klik dua kali pada berkas `index.html` dari File Explorer di komputer Anda.

### Cara 2: Menggunakan Local Server (Python)
Buka terminal di dalam folder proyek, lalu jalankan:
```bash
python -m http.server 8000
```
Buka browser dan akses: `http://localhost:8000`

### Cara 3: Menggunakan Live Server (VS Code)
Klik kanan pada `index.html` di VS Code, lalu pilih **"Open with Live Server"**.

### Cara 4: Menggunakan Built-in Web Server PHP (Khusus Week 5)
Buka terminal di folder proyek, lalu jalankan:
```bash
php -S localhost:8000
```
Buka browser dan akses: `http://localhost:8000/index.php` (atau simpan ke folder `htdocs` jika menggunakan XAMPP).

---

## ⚡ Pertemuan 4: Task 01 - Connect to API

Mengimplementasikan integrasi REST API menggunakan **JavaScript Fetch API** sesuai diagram alur kuliah:

```
[ WEB PAGE ] ──► [ JAVASCRIPT ] ──► [ FETCH API ] ──► [ REST API ] ──► [ JSON RESPONSE ]
(Halaman Web)     (app.js Engine)     (GET Endpoint)    (costumes.json)    (Array of Objects)
```

1. **Web Page**: Halaman web Chileorent (`index.html`, `catalog.html`, `detail-kostum.html`) diakses pengguna.
2. **JavaScript**: Modul `ChileoAPI` pada `app.js` mengeksekusi request HTTP asynchronous.
3. **Fetch API**: Mengirim `GET` request ke endpoint `data/costumes.json`.
4. **REST API Endpoint**: `data/costumes.json` (dan alias `api/costumes.json`) menyediakan resource data kostum cosplay lengkap.
5. **JSON Data**: Data diterima dalam format JSON standar dan langsung di-render ke antarmuka pengguna.
6. **API Inspector & Modal**: Di halaman `catalog.html`, disediakan banner status koneksi, tombol **"🔄 Uji Fetch API"**, dan tombol **"{ ; } Response JSON"**.

---

## 🐘 Pertemuan 5: PHP Prosedural (Server-Side Rendering)

Mengimplementasikan rendering halaman dari sisi server (**Server-Side Rendering / SSR**) menggunakan bahasa pemrograman **PHP Prosedural** pada berkas [`index.php`](index.php) sesuai instruksi praktikum:

```
[ BROWSER ] ◄── HTML Siap Tampil ── [ SERVER PHP ]
                                           │
  ┌────────────────────────────────────────┴────────────────────────────────────────┐
  ▼                                        ▼                                        ▼
[ Task 01: Variabel Tema ]     [ Task 02: Olah Data ]               [ Task 03: SSR Grid Cards ]
$nama_aplikasi, $tagline,      - Array multidimensi $program_prioritas  - Loop foreach kartu
$deskripsi, $menu_navigasi     - Conditional badge status & grade       - Penomoran otomatis No. #
                               - Fungsi formatRupiah()                  - Melanjutkan struktur Week 4
```

### Rincian Capaian Tugas:

1. **Task 01: Create PHP Page (Variabel Sesuai Tema)**:
   - Dibuat berkas [`index.php`](index.php) berbasis PHP prosedural.
   - Dideklarasikan variabel identitas & tema platform: `$nama_aplikasi`, `$tagline`, `$slogan_hero`, `$deskripsi_platform`, `$kontak_email`, `$kontak_wa`, `$tahun_aktif`, serta array navigasi `$menu_navigasi`.
   - Variabel diinterpolasi langsung ke dalam elemen halaman web (Navbar, Hero Section, dan Footer).

2. **Task 02: Process Data with PHP (Array Multidimensi, Conditional Status/Badge, Loop Penomoran)**:
   - **Array Multidimensi**: Array asosiatif multidimensi `$program_prioritas` memuat 8 data kostum cosplay dengan rincian lengkap (`id`, `judul`, `seri`, `kategori`, `grade`, `ukuran`, `harga`, `rating`, `status`, `gambar`, `kelengkapan`, dll).
   - **Conditional Status / Badge**:
     - `renderStatusBadge($status)`: Percabangan `if / elseif / else` untuk menghasilkan badge visual status ketersediaan:
       - `Tersedia`: Badge hijau (*Siap Sewa*) dengan indikator titik berkedip.
       - `Disewa`: Badge kuning/amber (*Sedang Disewa*).
       - `Booking`: Badge biru langit (*Dibooking / DP Terkunci*).
       - `Perawatan`: Badge merah/rose (*Dicuci / Perbaikan*).
     - `renderGradeBadge($grade)`: Percabangan kondisi grade mutu fisik kostum (Grade A, B, atau C).
     - `formatRupiah($angka)`: Format mata uang standar Rupiah Indonesia (misal: `Rp 120.000`).
   - **Loop Penomoran**: Variabel `$nomor_urut = 1;` diinkrementasi pada setiap iterasi untuk menampilkan label `No. #1`, `No. #2`, dst. pada setiap kartu.

3. **Task 03: Build Dynamic Server-Side Content (SSR Dynamic Grid Cards Melanjutkan Struktur Week 4)**:
   - Kartu kostum dirender secara dinamis langsung dari server PHP menggunakan sintaks perulangan `<?php foreach ($program_prioritas as $kostum): ?> ... <?php endforeach; ?>`.
   - Mengadopsi dan melanjutkan struktur kartu dari Week 4 (gambar dengan penanganan fallback, badge nomor urut, badge grade, badge ukuran, badge status sewa, tag seri & kategori, judul, rating bintang, checklist kelengkapan aksesoris, harga sewa per 3 hari, dan tombol detail booking).

