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
├── index.html            # Beranda Utama (Hero, 6 Pilar, Highlight Katalog, Escrow, FAQ)
├── catalog.html          # Katalog Marketplace Sewa (Sidebar Filter & Grid Produk)
├── detail-kostum.html    # Detail Sewa Kostum, Form Booking, Fitur DP (30%/50%), Deposit Opsional
├── alih-fungsi.html      # Alur Alih Fungsi, Slider Nego 0-8%, Kalkulator Aman & Simulasi Penawaran
├── dashboard-rental.html # Dasbor Multi-Peran (Pengelola Luas, Penjual Terbatas, Perental Terbatas)
├── login.html            # Portal Masuk Pengelola & Member Komunitas
├── register.html         # Pendaftaran Akun Sesuai Peran (Perental, Penjual, Mitra Rental)
├── admin-dashboard.html  # Panel Kontrol Admin (Kurasi Grade A/B/C, Audit Escrow, Verifikasi KYC)
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
