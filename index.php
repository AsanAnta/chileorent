<?php
/**
 * ==============================================================================
 * WEEK 5 - PHP PROSEDURAL (SERVER-SIDE RENDERING / SSR)
 * ==============================================================================
 * File        : index.php
 * Tema        : Chileorent - Marketplace Sewa & Solusi Alih Fungsi Kostum Cosplay
 *
 * Implementasi PHP Prosedural (Server-Side Rendering):
 * - Task 01: Create PHP Page (variabel sesuai tema ya)
 * - Task 02: Process Data with PHP (array multidimensi, conditional status/badge, loop penomoran)
 * - Task 03: Build Dynamic Server-Side Content (SSR dynamic grid cards Program Prioritas melanjutkan struktur Week 4)
 * ==============================================================================
 */

// ==============================================================================
// TASK 01: CREATE PHP PAGE (VARIABEL SESUAI TEMA CHILEORENT)
// ==============================================================================

// 1. Variabel Identitas & Tema Utama Platform
$nama_aplikasi        = "Chileorent";
$tagline              = "Marketplace Sewa & Solusi Alih Fungsi Kostum Cosplay Terpercaya";
$badge_hero           = "Solusi Komunitas Cosplay & Rental • PHP Server-Side Rendering";
$slogan_hero          = "Temukan Kostum Impianmu atau Putar Kembali Aset Kostum yang Menumpuk";
$deskripsi_platform   = "Kesulitan mencari sewa kostum cosplay yang cepat dan aman? Atau Anda pemilik rental yang sedang tutup toko serta cosplayer yang lelah menunggu pembeli? Chileorent menghadirkan ekosistem sewa terverifikasi, perlindungan rekening bersama (escrow), serta alur alih fungsi kostum dengan sistem tawar-menawar fleksibel 0% hingga 8%.";

// 2. Variabel Informasi Akademik / Modul Praktikum
$mata_kuliah          = "Pemrograman Web";
$modul_praktikum      = "Week 5 - PHP Prosedural";
$sub_modul            = "Implementasi PHP Prosedural (Server-Side Rendering)";
$tahun_aktif          = date('Y');

// 3. Variabel Kontak & Komunitas
$kontak_email         = "bantuan@chileorent.com";
$kontak_wa            = "+62 812-3456-7890";
$nama_komunitas       = "Komunitas Cosplay Indonesia";

// 4. Variabel Highlight Keunggulan di Hero Section
$stat_keamanan        = "100% Aman";
$stat_keamanan_label  = "Sistem Escrow Otomatis";
$stat_nego            = "0% - 8%";
$stat_nego_label      = "Batas Nego Fleksibel Terkendali";
$stat_kurasi          = "Terverifikasi";
$stat_kurasi_label    = "Quality Control & Standarisasi Grade";
$stat_sirkular        = "Anti-Nimbun";
$stat_sirkular_label  = "Reuse & Monetize Kostum Eks-Rental";

// 5. Variabel Judul Seksi Program Prioritas (Task 03)
$label_seksi_ssr      = "Program Prioritas • Katalog Unggulan SSR";
$judul_seksi_ssr      = "Program Prioritas Kostum Cosplay Siap Sewa";
$deskripsi_seksi_ssr  = "Seluruh kartu di bawah ini diolah dan dirender langsung dari server menggunakan PHP Prosedural (Server-Side Rendering) melanjutkan struktur Week 4, lengkap dengan array multidimensi, conditional status/badge, dan loop penomoran otomatis.";

// 6. Array Navigasi Header
$menu_navigasi = [
    ['label' => 'Beranda', 'url' => 'index.php', 'active' => true, 'badge' => 'SSR PHP'],
    ['label' => 'Katalog Sewa', 'url' => 'catalog.html', 'active' => false, 'badge' => ''],
    ['label' => 'Alih Fungsi Kostum', 'url' => 'alih-fungsi.html', 'active' => false, 'badge' => '(Nego 0-8%)'],
    ['label' => 'Dashboard Rental', 'url' => 'dashboard-rental.html', 'active' => false, 'badge' => '']
];


// ==============================================================================
// TASK 02: PROCESS DATA WITH PHP
// (Array Multidimensi, Conditional Status/Badge, Loop Penomoran)
// ==============================================================================

// 1. Array Multidimensi: Data Program Prioritas Kostum Cosplay (Melanjutkan Struktur Week 4)
$program_prioritas = [
    [
        'id'            => 'c1',
        'judul'         => "Frieren - Beyond Journey's End",
        'karakter'      => 'Frieren',
        'seri'          => 'Sousou no Frieren',
        'kategori'      => 'Anime / Fantasy',
        'ukuran'        => 'M',
        'gender'        => 'Wanita',
        'harga'         => 120000,
        'grade'         => 'A',
        'rating'        => 4.9,
        'jumlah_sewa'   => 42,
        'status'        => 'Tersedia',
        'program_label' => 'Prioritas Utama Event',
        'gambar'        => 'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=600&auto=format&fit=crop&q=80',
        'deskripsi'     => 'Jubah putih list emas, wig silver styled rapi, tongkat sihir 140cm, anting ruby & telinga elf.',
        'pemilik'       => 'Kurogane Rental (Toko Kami)',
        'kelengkapan'   => ['Wig Silver', 'Tongkat Staff', 'Anting Ruby', 'Telinga Elf']
    ],
    [
        'id'            => 'c2',
        'judul'         => 'Raiden Shogun (Baal) Archon Uwowo',
        'karakter'      => 'Raiden Shogun',
        'seri'          => 'Genshin Impact',
        'kategori'      => 'Game / RPG',
        'ukuran'        => 'S',
        'gender'        => 'Wanita',
        'harga'         => 150000,
        'grade'         => 'A',
        'rating'        => 5.0,
        'jumlah_sewa'   => 56,
        'status'        => 'Tersedia',
        'program_label' => 'Prioritas High-Demand',
        'gambar'        => 'https://images.unsplash.com/photo-1534447677768-be436bb09401?w=600&auto=format&fit=crop&q=80',
        'deskripsi'     => 'Kimono ungu gradasi premium, wig kepang panjang, naginata polearm prop, armor bahu emas.',
        'pemilik'       => 'Kurogane Rental (Toko Kami)',
        'kelengkapan'   => ['Kimono Ungu', 'Naginata Prop', 'Armor Bahu', 'Boots Kulit']
    ],
    [
        'id'            => 'c3',
        'judul'         => 'Kafka - Stellaron Hunter Fullset',
        'karakter'      => 'Kafka',
        'seri'          => 'Honkai: Star Rail',
        'kategori'      => 'Game / Sci-Fi',
        'ukuran'        => 'M',
        'gender'        => 'Wanita',
        'harga'         => 140000,
        'grade'         => 'B',
        'rating'        => 4.8,
        'jumlah_sewa'   => 29,
        'status'        => 'Disewa',
        'program_label' => 'Program Konsinyasi Mitra',
        'gambar'        => 'https://images.unsplash.com/photo-1563245372-f21724e3856d?w=600&auto=format&fit=crop&q=80',
        'deskripsi'     => 'Coat beludru bordir laba-laba, wig maroon rapi, kacamata hitam retro & boots kulit size 38.',
        'pemilik'       => 'Sakura Wardrobe (Titip Sewa Mitra)',
        'kelengkapan'   => ['Coat Beludru', 'Wig Maroon', 'Kacamata Gelap', 'Boots Heels']
    ],
    [
        'id'            => 'c4',
        'judul'         => 'Satoru Gojo - Jujutsu High Uniform',
        'karakter'      => 'Satoru Gojo',
        'seri'          => 'Jujutsu Kaisen',
        'kategori'      => 'Anime / Shounen',
        'ukuran'        => 'L',
        'gender'        => 'Pria',
        'harga'         => 110000,
        'grade'         => 'B',
        'rating'        => 4.7,
        'jumlah_sewa'   => 38,
        'status'        => 'Tersedia',
        'program_label' => 'Prioritas Best Value',
        'gambar'        => 'https://images.unsplash.com/photo-1509198397868-475647b2a1e5?w=600&auto=format&fit=crop&q=80',
        'deskripsi'     => 'Seragam kancing high collar hitam pekat, wig putih spike, penutup mata kain & kacamata bulat hitam.',
        'pemilik'       => 'Kurogane Rental (Toko Kami)',
        'kelengkapan'   => ['Seragam High Collar', 'Blindfold Hitam', 'Wig Spike Putih', 'Kacamata Bulat']
    ],
    [
        'id'            => 'c5',
        'judul'         => 'Houshou Marine - Ahoy Captain Outfit',
        'karakter'      => 'Houshou Marine',
        'seri'          => 'Hololive Production',
        'kategori'      => 'VTuber / Idol',
        'ukuran'        => 'S',
        'gender'        => 'Wanita',
        'harga'         => 135000,
        'grade'         => 'A',
        'rating'        => 4.9,
        'jumlah_sewa'   => 34,
        'status'        => 'Booking',
        'program_label' => 'Prioritas Komunitas VTuber',
        'gambar'        => 'https://images.unsplash.com/photo-1541701494587-cb58502866ab?w=600&auto=format&fit=crop&q=80',
        'deskripsi'     => 'Topi bajak laut bordir tengkorak, wig twintail merah maroon, eyepatch hati, dasi pita & boots 37.',
        'pemilik'       => 'Kurogane Rental (Toko Kami)',
        'kelengkapan'   => ['Topi Pirate', 'Wig Twintail Maroon', 'Eyepatch Hati', 'Boots Size 37']
    ],
    [
        'id'            => 'c6',
        'judul'         => 'Kamen Rider Geats Magnum Boost Form',
        'karakter'      => 'Kamen Rider Geats',
        'seri'          => 'Kamen Rider Geats',
        'kategori'      => 'Tokusatsu / Armor',
        'ukuran'        => 'XL',
        'gender'        => 'Unisex',
        'harga'         => 250000,
        'grade'         => 'A',
        'rating'        => 5.0,
        'jumlah_sewa'   => 19,
        'status'        => 'Tersedia',
        'program_label' => 'Program Akuisisi Eks-Rental',
        'gambar'        => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=600&auto=format&fit=crop&q=80',
        'deskripsi'     => 'Armor dada & helm EVA foam lapis resin cat airbrush glossy, belt desire driver bersuara & magnum shooter 40X.',
        'pemilik'       => 'Toko Toku Bandung (Mitra Akuisisi)',
        'kelengkapan'   => ['Helm Fullset Resin', 'Armor Dada', 'Desire Driver Sound', 'Magnum Shooter 40X']
    ],
    [
        'id'            => 'c7',
        'judul'         => 'Hu Tao - 77th Director Wangsheng',
        'karakter'      => 'Hu Tao',
        'seri'          => 'Genshin Impact',
        'kategori'      => 'Game / RPG',
        'ukuran'        => 'S',
        'gender'        => 'Wanita',
        'harga'         => 130000,
        'grade'         => 'A',
        'rating'        => 4.9,
        'jumlah_sewa'   => 45,
        'status'        => 'Tersedia',
        'program_label' => 'Prioritas Utama Event',
        'gambar'        => 'https://images.unsplash.com/photo-1534447677768-be436bb09401?w=600&auto=format&fit=crop&q=80',
        'deskripsi'     => 'Coat coklat bordir emas, topi bunga plum, wig kuncir twintail panjang, cincin lengkap & tombak Staff of Homa.',
        'pemilik'       => 'Kurogane Rental (Toko Kami)',
        'kelengkapan'   => ['Topi Plum Blossom', 'Wig Twintail Coklat', 'Staff of Homa', 'Set 10 Cincin']
    ],
    [
        'id'            => 'c8',
        'judul'         => 'Anya Forger - Eden Academy Uniform',
        'karakter'      => 'Anya Forger',
        'seri'          => 'Spy x Family',
        'kategori'      => 'Anime / Comedy',
        'ukuran'        => 'Custom',
        'gender'        => 'Wanita',
        'harga'         => 95000,
        'grade'         => 'C',
        'rating'        => 4.8,
        'jumlah_sewa'   => 37,
        'status'        => 'Perawatan',
        'program_label' => 'Program Alih Fungsi Ekonomis',
        'gambar'        => 'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=600&auto=format&fit=crop&q=80',
        'deskripsi'     => 'Dress seragam sekolah Eden dengan ornamen emas, wig pink sebahu dengan hiasan kepala kerucut & boneka Chimera.',
        'pemilik'       => 'Sakura Wardrobe (Titip Sewa Mitra)',
        'kelengkapan'   => ['Dress Eden Academy', 'Wig Pink Sebahu', 'Hiasan Kepala Kerucut', 'Boneka Chimera']
    ]
];

// 2. Fungsi Prosedural Format Mata Uang Rupiah
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

// 3. Pengolahan Data Ringkasan Menggunakan Perulangan & Percabangan (Task 02)
$total_program_prioritas = count($program_prioritas);
$jumlah_siap_sewa        = 0;
$jumlah_terbooking_sewa  = 0;
$jumlah_perawatan        = 0;

foreach ($program_prioritas as $item_cek) {
    if ($item_cek['status'] === 'Tersedia') {
        $jumlah_siap_sewa++;
    } elseif ($item_cek['status'] === 'Disewa' || $item_cek['status'] === 'Booking') {
        $jumlah_terbooking_sewa++;
    } else {
        $jumlah_perawatan++;
    }
}
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($nama_aplikasi) ?> - <?= htmlspecialchars($tagline) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">

    <!-- TOP BAR INDIKATOR IMPLEMENTASI WEEK 5 - PHP PROSEDURAL (SSR) -->
    <aside class="bg-indigo-950 text-indigo-100 text-xs py-2 px-4 border-b border-indigo-800">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-emerald-600 font-mono text-[10px] font-bold text-white uppercase shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                    PHP SSR Active
                </span>
                <span><strong><?= htmlspecialchars($modul_praktikum) ?></strong>: <?= htmlspecialchars($sub_modul) ?></span>
            </div>
            <div class="flex items-center gap-3 text-[11px] text-indigo-200">
                <span class="hidden sm:inline">Task 01: Variabel Tema &bull; Task 02: Array, Conditional & Loop &bull; Task 03: SSR Grid Cards</span>
                <a href="#program-prioritas" class="underline font-semibold text-white hover:text-indigo-200 transition">Lihat SSR Grid &darr;</a>
            </div>
        </div>
    </aside>

    <!-- HEADER & NAVIGASI UTAMA (MENGGUNAKAN VARIABEL & ARRAY TASK 01) -->
    <header id="header-utama" class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between gap-4">
            <!-- Logo & Slogan -->
            <div class="flex items-center gap-3 shrink-0">
                <a href="index.php" class="text-2xl font-bold text-indigo-600 hover:text-indigo-700 transition whitespace-nowrap">
                    <h1><?= htmlspecialchars($nama_aplikasi) ?></h1>
                </a>
                <p class="hidden xl:block text-xs text-gray-500 border-l border-gray-300 pl-3 whitespace-nowrap">
                    <?= htmlspecialchars($tagline) ?>
                </p>
            </div>

            <!-- Navigasi Desktop (Tampil pada layar md+) -->
            <nav id="navigasi-utama" aria-label="Navigasi Utama" class="hidden md:flex items-center">
                <ul class="flex items-center gap-2 lg:gap-4 text-sm font-medium text-gray-600">
                    <?php foreach ($menu_navigasi as $nav): ?>
                        <li>
                            <a href="<?= htmlspecialchars($nav['url']) ?>"
                               <?= $nav['active'] ? 'aria-current="page"' : '' ?>
                               class="px-2 py-1 <?= $nav['active'] ? 'text-indigo-600 font-semibold border-b-2 border-indigo-600' : 'hover:text-indigo-600 transition' ?> whitespace-nowrap">
                                <?= htmlspecialchars($nav['label']) ?>
                                <?php if (!empty($nav['badge'])): ?>
                                    <span class="hidden xl:inline text-xs text-indigo-500 font-semibold"><?= htmlspecialchars($nav['badge']) ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <!-- Aksi Auth Desktop (Tampil pada layar md+) -->
            <div id="desktop-auth-actions" class="hidden md:flex items-center gap-2 shrink-0">
                <a href="login.html" class="px-3 py-1.5 text-sm font-medium text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 transition whitespace-nowrap">Masuk</a>
                <a href="register.html" class="px-3 py-1.5 text-sm font-medium text-white bg-gray-800 hover:bg-gray-900 rounded-lg transition whitespace-nowrap">Daftar Akun</a>
            </div>

            <!-- Kontrol Mobile: Badge Singkat Pengguna + Tombol Hamburger -->
            <div class="flex items-center gap-2 md:hidden">
                <div id="mobile-compact-badge" class="flex items-center"></div>
                <button type="button" id="mobile-menu-btn" aria-label="Buka Menu Navigasi" aria-expanded="false" aria-controls="mobile-dropdown-menu" class="p-2 text-gray-700 hover:text-indigo-600 hover:bg-gray-100 rounded-xl transition focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <svg id="hamburger-icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="hamburger-icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Menu Dropdown Mobile -->
        <div id="mobile-dropdown-menu" class="hidden md:hidden border-t border-gray-100 bg-white/95 backdrop-blur-md px-4 pt-3 pb-4 space-y-3 shadow-lg">
            <nav aria-label="Navigasi Mobile">
                <ul class="flex flex-col space-y-1 text-sm font-medium text-gray-700">
                    <?php foreach ($menu_navigasi as $nav): ?>
                        <li>
                            <a href="<?= htmlspecialchars($nav['url']) ?>"
                               <?= $nav['active'] ? 'aria-current="page"' : '' ?>
                               class="flex items-center gap-2 px-3 py-2 rounded-lg <?= $nav['active'] ? 'bg-indigo-50 text-indigo-600 font-semibold' : 'hover:bg-gray-100 hover:text-indigo-600 transition' ?>">
                                <?= htmlspecialchars($nav['label']) ?> <?= htmlspecialchars($nav['badge']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <div id="mobile-auth-actions" class="pt-2 border-t border-gray-100">
                <div class="grid grid-cols-2 gap-2 text-center text-xs font-semibold">
                    <a href="login.html" class="py-2.5 px-3 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 transition">Masuk</a>
                    <a href="register.html" class="py-2.5 px-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-sm transition">Daftar Akun</a>
                </div>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT AREA -->
    <main id="konten-utama">

        <!-- HERO SECTION (TASK 01: VARIABEL SESUAI TEMA) -->
        <section id="hero" class="bg-gradient-to-br from-indigo-900 via-indigo-800 to-slate-900 text-white py-16 lg:py-24" aria-labelledby="hero-title">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <span class="inline-block px-3 py-1 text-xs font-semibold tracking-wide bg-indigo-500/20 text-indigo-200 border border-indigo-400/30 rounded-full">
                        <?= htmlspecialchars($badge_hero) ?>
                    </span>
                    <h2 id="hero-title" class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight">
                        <?= htmlspecialchars($slogan_hero) ?>
                    </h2>
                    <p class="text-indigo-100 text-base sm:text-lg leading-relaxed">
                        <?= htmlspecialchars($deskripsi_platform) ?>
                    </p>

                    <div class="flex flex-wrap gap-4 pt-2">
                        <a href="#program-prioritas" class="px-6 py-3 text-sm font-semibold text-indigo-900 bg-white hover:bg-indigo-50 rounded-lg shadow transition">Lihat Program Prioritas (SSR)</a>
                        <a href="alih-fungsi.html" class="px-6 py-3 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border border-indigo-400/30 shadow transition">Mulai Alih Fungsi Kostum</a>
                    </div>

                    <ul class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-6 border-t border-indigo-700/60">
                        <div>
                            <strong class="block text-xl font-bold text-white"><?= htmlspecialchars($stat_keamanan) ?></strong>
                            <span class="text-xs text-indigo-200"><?= htmlspecialchars($stat_keamanan_label) ?></span>
                        </div>
                        <div>
                            <strong class="block text-xl font-bold text-white"><?= htmlspecialchars($stat_nego) ?></strong>
                            <span class="text-xs text-indigo-200"><?= htmlspecialchars($stat_nego_label) ?></span>
                        </div>
                        <div>
                            <strong class="block text-xl font-bold text-white"><?= htmlspecialchars($stat_kurasi) ?></strong>
                            <span class="text-xs text-indigo-200"><?= htmlspecialchars($stat_kurasi_label) ?></span>
                        </div>
                        <div>
                            <strong class="block text-xl font-bold text-white"><?= htmlspecialchars($stat_sirkular) ?></strong>
                            <span class="text-xs text-indigo-200"><?= htmlspecialchars($stat_sirkular_label) ?></span>
                        </div>
                    </ul>
                </div>

                <div class="flex justify-center">
                    <figure class="bg-indigo-950/50 p-2 rounded-2xl border border-indigo-700/50 shadow-2xl overflow-hidden w-full max-w-lg">
                        <img src="https://placehold.co/600x400/2b2d42/ffffff?text=Chileorent+Cosplay+Marketplace" alt="Ilustrasi Platform <?= htmlspecialchars($nama_aplikasi) ?> untuk sewa dan alih fungsi kostum cosplay" class="w-full h-auto rounded-xl object-cover">
                        <figcaption class="p-3 text-center text-xs text-indigo-300">
                            Solusi marketplace sewa terverifikasi, konsinyasi titip sewa, dan akuisisi alih fungsi kostum cosplay.
                        </figcaption>
                    </figure>
                </div>
            </div>
        </section>

        <!-- SEKSI 6 PILAR FITUR UTAMA (MELANJUTKAN STRUKTUR WEEK 4) -->
        <section id="fitur-unggulan" class="py-16 bg-white" aria-labelledby="fitur-title">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <header class="text-center max-w-3xl mx-auto mb-12">
                    <span class="text-xs font-bold tracking-wider text-indigo-600 uppercase">Fitur Unggulan</span>
                    <h2 id="fitur-title" class="text-3xl font-extrabold text-gray-900 sm:text-4xl mt-1">6 Pilar Solusi Cerdas <?= htmlspecialchars($nama_aplikasi) ?></h2>
                    <p class="text-gray-600 mt-2">Mendukung ekosistem cosplay yang berkelanjutan, aman bagi penyewa, dan menguntungkan bagi pemilik kostum.</p>
                </header>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <article class="p-6 bg-gray-50 border border-gray-200 rounded-xl hover:shadow-md transition">
                        <div class="text-3xl mb-4">🎭</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">1. Marketplace Sewa Kostum Cosplay</h3>
                        <p class="text-sm text-gray-600 mb-4">Katalog lengkap dari anime, game, VTuber, hingga serial favorit. Dilengkapi kalender ketersediaan jadwal, pilihan ukuran akurat, dan rincian kelengkapan (wig, props, aksesoris).</p>
                        <a href="catalog.html" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800">Jelajahi Katalog &rarr;</a>
                    </article>

                    <article class="p-6 bg-gray-50 border border-gray-200 rounded-xl hover:shadow-md transition">
                        <div class="text-3xl mb-4">🤝</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">2. Sistem Nego Fleksibel (Pilihan 0% - 8%)</h3>
                        <p class="text-sm text-gray-600 mb-4">Fitur tawar-menawar harga pada proses alih fungsi kostum. Pemilik bebas memilih mengaktifkan opsi nego dengan rentang toleransi 0% hingga maksimal 8% agar nilai aset tetap terlindungi.</p>
                        <a href="alih-fungsi.html#fitur-nego" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800">Pelajari Sistem Nego &rarr;</a>
                    </article>

                    <article class="p-6 bg-gray-50 border border-gray-200 rounded-xl hover:shadow-md transition">
                        <div class="text-3xl mb-4">🛡️</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">3. Sistem Escrow & Fitur DP Booking</h3>
                        <p class="text-sm text-gray-600 mb-4">Uang sewa, opsi DP (30%/50% untuk kunci tanggal acara), serta deposit jaminan (opsional khusus pertama kali rental) ditampung secara aman oleh sistem Escrow hingga kostum diterima dengan baik.</p>
                        <a href="#alur-escrow" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800">Cara Kerja Escrow & DP &rarr;</a>
                    </article>

                    <article class="p-6 bg-gray-50 border border-gray-200 rounded-xl hover:shadow-md transition">
                        <div class="text-3xl mb-4">🔄</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">4. Sistem Alur Alih Fungsi Produk</h3>
                        <p class="text-sm text-gray-600 mb-4">Solusi bagi pemilik rental yang menutup usahanya atau cosplayer yang ingin kostumnya bermanfaat: Titip Sewa (Konsinyasi bagi hasil) atau Akuisisi Langsung oleh Chileorent dengan batas nego 0-8%.</p>
                        <a href="alih-fungsi.html" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800">Form Alih Fungsi &rarr;</a>
                    </article>

                    <article class="p-6 bg-gray-50 border border-gray-200 rounded-xl hover:shadow-md transition">
                        <div class="text-3xl mb-4">✅</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">5. Pusat Verifikasi & Jaminan Keamanan</h3>
                        <p class="text-sm text-gray-600 mb-4">Standarisasi kondisi kostum (Grade A, B, atau C) melalui kurasi transparan. Dilengkapi verifikasi identitas (KYC) pengguna dan perlindungan deposit terhadap risiko kerusakan.</p>
                        <a href="#pusat-verifikasi" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800">Standar Verifikasi &rarr;</a>
                    </article>

                    <article class="p-6 bg-gray-50 border border-gray-200 rounded-xl hover:shadow-md transition">
                        <div class="text-3xl mb-4">📊</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">6. Sistem Manajemen Rental Pintar</h3>
                        <p class="text-sm text-gray-600 mb-4">Dashboard terpadu bagi pemilik rental dan mitra kostum: lacak jadwal sewa, status pengiriman dan pengembalian, log pencucian/laundry, hingga pencairan pendapatan.</p>
                        <a href="dashboard-rental.html" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800">Buka Dashboard &rarr;</a>
                    </article>
                </div>
            </div>
        </section>

        <!-- ==============================================================================
             TASK 03: BUILD DYNAMIC SERVER-SIDE CONTENT
             (SSR dynamic grid cards Program Prioritas melanjutkan struktur Week 4)
             ============================================================================== -->
        <section id="program-prioritas" class="py-16 bg-gray-50 border-t border-gray-200" aria-labelledby="katalog-title">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <header class="text-center max-w-3xl mx-auto mb-8">
                    <div class="inline-flex flex-wrap items-center justify-center gap-2 mb-2">
                        <span class="text-xs font-bold tracking-wider text-indigo-600 uppercase"><?= htmlspecialchars($label_seksi_ssr) ?></span>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-100 text-emerald-800 border border-emerald-300">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600 animate-pulse"></span>
                            Dirender via PHP SSR (<?= $total_program_prioritas ?> Unit)
                        </span>
                    </div>
                    <h2 id="katalog-title" class="text-3xl font-extrabold text-gray-900 sm:text-4xl mt-1">
                        <?= htmlspecialchars($judul_seksi_ssr) ?>
                    </h2>
                    <p class="text-gray-600 mt-2 text-sm sm:text-base">
                        <?= htmlspecialchars($deskripsi_seksi_ssr) ?>
                    </p>
                </header>

                <!-- RINGKASAN STATUS OLAHAN DATA PHP (TASK 02) -->
                <div class="flex flex-wrap items-center justify-center gap-3 mb-10 text-xs">
                    <div class="px-3.5 py-2 bg-white border border-gray-200 rounded-xl shadow-sm flex items-center gap-2">
                        <span class="font-bold text-gray-900">Total Program Prioritas:</span>
                        <span class="px-2 py-0.5 bg-indigo-100 text-indigo-800 font-bold rounded-md"><?= $total_program_prioritas ?> Kostum</span>
                    </div>
                    <div class="px-3.5 py-2 bg-white border border-gray-200 rounded-xl shadow-sm flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span class="text-gray-600">Siap Sewa:</span>
                        <strong class="text-emerald-700"><?= $jumlah_siap_sewa ?> Unit</strong>
                    </div>
                    <div class="px-3.5 py-2 bg-white border border-gray-200 rounded-xl shadow-sm flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                        <span class="text-gray-600">Sedang Disewa / DP Booking:</span>
                        <strong class="text-amber-700"><?= $jumlah_terbooking_sewa ?> Unit</strong>
                    </div>
                    <div class="px-3.5 py-2 bg-white border border-gray-200 rounded-xl shadow-sm flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                        <span class="text-gray-600">Perawatan / Laundry:</span>
                        <strong class="text-rose-700"><?= $jumlah_perawatan ?> Unit</strong>
                    </div>
                </div>

                <!-- SSR DYNAMIC GRID CARDS (MELANJUTKAN STRUKTUR KARTU WEEK 4) -->
                <div id="ssr-priority-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php
                    // TASK 02: LOOP PENOMORAN OTOMATIS
                    $nomor_urut = 1;
                    foreach ($program_prioritas as $kostum):
                        // Format nomor urut 2 digit (misal: #01, #02, dst.)
                        $nomor_tampil = str_pad($nomor_urut, 2, '0', STR_PAD_LEFT);

                        // TASK 02: CONDITIONAL STATUS / BADGE KETERSEDIAAN KOSTUM
                        if ($kostum['status'] === 'Tersedia') {
                            $status_teks        = 'Siap Sewa';
                            $status_badge_class = 'bg-emerald-100 text-emerald-800 border-emerald-300';
                            $status_dot_class   = 'bg-emerald-500 animate-pulse';
                            $cta_teks           = 'Sewa';
                            $cta_class          = 'bg-indigo-600 hover:bg-indigo-700 text-white';
                        } elseif ($kostum['status'] === 'Booking') {
                            $status_teks        = 'Dibooking (DP)';
                            $status_badge_class = 'bg-sky-100 text-sky-800 border-sky-300';
                            $status_dot_class   = 'bg-sky-500';
                            $cta_teks           = 'Cek Jadwal';
                            $cta_class          = 'bg-sky-600 hover:bg-sky-700 text-white';
                        } elseif ($kostum['status'] === 'Disewa') {
                            $status_teks        = 'Sedang Disewa';
                            $status_badge_class = 'bg-amber-100 text-amber-800 border-amber-300';
                            $status_dot_class   = 'bg-amber-500';
                            $cta_teks           = 'Antre Sewa';
                            $cta_class          = 'bg-amber-600 hover:bg-amber-700 text-white';
                        } else {
                            $status_teks        = 'Dicuci / Perawatan';
                            $status_badge_class = 'bg-rose-100 text-rose-800 border-rose-300';
                            $status_dot_class   = 'bg-rose-500';
                            $cta_teks           = 'Detail Info';
                            $cta_class          = 'bg-gray-700 hover:bg-gray-800 text-white';
                        }

                        // TASK 02: CONDITIONAL BADGE GRADE MUTU FISIK KOSTUM
                        if ($kostum['grade'] === 'A') {
                            $grade_teks        = 'Grade A (Sangat Baik)';
                            $grade_badge_class = 'bg-emerald-600 text-white';
                        } elseif ($kostum['grade'] === 'B') {
                            $grade_teks        = 'Grade B (Jahitan Rapi)';
                            $grade_badge_class = 'bg-blue-600 text-white';
                        } else {
                            $grade_teks        = 'Grade C (Minus Tertulis)';
                            $grade_badge_class = 'bg-amber-600 text-white';
                        }
                    ?>
                        <article class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm flex flex-col justify-between hover:shadow-md transition">
                            <div>
                                <figure class="relative h-64 overflow-hidden bg-gray-100">
                                    <img src="<?= htmlspecialchars($kostum['gambar']) ?>"
                                         alt="Kostum Cosplay <?= htmlspecialchars($kostum['judul']) ?>"
                                         class="w-full h-full object-cover hover:scale-105 transition duration-300"
                                         onerror="this.src='https://placehold.co/320x400/3d5a80/ffffff?text=<?= urlencode($kostum['karakter']) ?>'">

                                    <!-- Badge Nomor Urut Loop Penomoran (Task 02) & Grade (Conditional Task 02) -->
                                    <div class="absolute top-2 left-2 flex items-center gap-1.5">
                                        <span class="bg-gray-900/90 text-white text-xs font-extrabold px-2 py-1 rounded shadow backdrop-blur-sm border border-gray-700">
                                            #<?= $nomor_tampil ?>
                                        </span>
                                        <span class="<?= $grade_badge_class ?> text-xs font-semibold px-2 py-1 rounded shadow">
                                            <?= htmlspecialchars($grade_teks) ?>
                                        </span>
                                    </div>

                                    <!-- Badge Ukuran -->
                                    <span class="absolute top-2 right-2 bg-white/95 backdrop-blur-sm text-gray-800 text-[10px] font-bold px-2 py-0.5 rounded shadow">
                                        Size <?= htmlspecialchars($kostum['ukuran']) ?>
                                    </span>

                                    <!-- Conditional Status Badge Ketersediaan (Task 02) -->
                                    <div class="absolute bottom-2 left-2 right-2 flex items-center justify-between gap-1">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-bold border shadow-sm <?= $status_badge_class ?>">
                                            <span class="w-1.5 h-1.5 rounded-full <?= $status_dot_class ?>"></span>
                                            <?= htmlspecialchars($status_teks) ?>
                                        </span>
                                        <span class="px-2 py-0.5 rounded bg-indigo-950/80 text-indigo-100 text-[10px] font-medium backdrop-blur-sm">
                                            <?= htmlspecialchars($kostum['program_label']) ?>
                                        </span>
                                    </div>
                                </figure>

                                <div class="p-4">
                                    <div class="flex items-center justify-between text-xs font-bold">
                                        <span class="text-indigo-600 uppercase"><?= htmlspecialchars($kostum['seri']) ?></span>
                                        <span class="text-gray-400 font-medium text-[11px]"><?= htmlspecialchars($kostum['kategori']) ?></span>
                                    </div>

                                    <h3 class="font-bold text-gray-900 text-base mt-1 line-clamp-1">
                                        <a href="detail-kostum.html?id=<?= urlencode($kostum['id']) ?>" class="hover:text-indigo-600 transition">
                                            <?= htmlspecialchars($kostum['judul']) ?>
                                        </a>
                                    </h3>

                                    <p class="text-xs text-gray-600 mt-1">
                                        Ukuran: <strong><?= htmlspecialchars($kostum['ukuran']) ?></strong> (<?= htmlspecialchars($kostum['gender']) ?>)
                                    </p>

                                    <!-- Daftar Kelengkapan dari Array Multidimensi (Task 02) -->
                                    <div class="flex flex-wrap gap-1 mt-2">
                                        <?php foreach ($kostum['kelengkapan'] as $item_perlengkapan): ?>
                                            <span class="px-1.5 py-0.5 bg-gray-100 border border-gray-200 rounded text-[10px] text-gray-700 font-medium">
                                                ✓ <?= htmlspecialchars($item_perlengkapan) ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>

                                    <p class="text-xs text-gray-500 mt-2">
                                        Mitra: <em class="not-italic text-gray-700 font-medium"><?= htmlspecialchars($kostum['pemilik']) ?></em>
                                        <span class="text-amber-600 font-semibold">(<?= number_format($kostum['rating'], 1) ?> ★ &bull; <?= $kostum['jumlah_sewa'] ?>x sewa)</span>
                                    </p>
                                </div>
                            </div>

                            <div class="px-4 pb-4 pt-3 border-t border-gray-100 flex items-center justify-between">
                                <p class="text-gray-900">
                                    <span class="text-lg font-bold text-indigo-600"><?= formatRupiah($kostum['harga']) ?></span>
                                    <span class="text-xs text-gray-500">/ 3 Hari</span>
                                </p>
                                <a href="detail-kostum.html?id=<?= urlencode($kostum['id']) ?>"
                                   class="px-3 py-1.5 text-xs font-semibold rounded-md transition shadow-sm <?= $cta_class ?>">
                                    <?= htmlspecialchars($cta_teks) ?>
                                </a>
                            </div>
                        </article>
                    <?php
                        $nomor_urut++;
                    endforeach;
                    ?>
                </div>

                <div class="mt-10 text-center">
                    <a href="catalog.html" class="inline-flex items-center px-6 py-3 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow transition">
                        Lihat Seluruh Katalog Kostum &rarr;
                    </a>
                </div>
            </div>
        </section>

        <!-- SEKSI ALUR ALIH FUNGSI PRODUK & FITUR NEGO (MELANJUTKAN STRUKTUR WEEK 4) -->
        <section id="alur-alih-fungsi" class="py-16 bg-white" aria-labelledby="alih-fungsi-title">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <header class="text-center max-w-3xl mx-auto mb-12">
                    <span class="text-xs font-bold tracking-wider text-indigo-600 uppercase">Solusi Pemilik Rental Tutup & Cosplayer</span>
                    <h2 id="alih-fungsi-title" class="text-3xl font-extrabold text-gray-900 sm:text-4xl mt-1">Jangan Biarkan Kostum Menumpuk di Gudang</h2>
                    <p class="text-gray-600 mt-2">Alih fungsikan koleksi kostum Anda agar menghasilkan uang dan dapat dinikmati oleh sesama cosplayer.</p>
                </header>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <div class="p-6 bg-gray-50 border border-gray-200 rounded-xl space-y-3">
                        <div class="text-3xl">🤝</div>
                        <h3 class="text-lg font-bold text-gray-900">1. Titip Sewa (Konsinyasi Bagi Hasil)</h3>
                        <p class="text-sm text-gray-600">Kostum tetap milik Anda, namun dikelola dan direntalkan melalui jaringan <?= htmlspecialchars($nama_aplikasi) ?>. Anda mendapatkan pendapatan pasif berkala setiap kali kostum disewa tanpa perlu repot mengurus administrasi dan laundry.</p>
                        <ul class="text-xs text-gray-500 space-y-1 pt-2 border-t border-gray-200">
                            <li>✓ Bagi hasil transparan (70% pemilik : 30% platform)</li>
                            <li>✓ Asuransi proteksi kerusakan kostum</li>
                            <li>✓ Laporan status sewa real-time di dashboard</li>
                        </ul>
                    </div>

                    <div class="p-6 bg-gray-50 border border-gray-200 rounded-xl space-y-3">
                        <div class="text-3xl">🏢</div>
                        <h3 class="text-lg font-bold text-gray-900">2. Beli Langsung oleh <?= htmlspecialchars($nama_aplikasi) ?> (Akuisisi)</h3>
                        <p class="text-sm text-gray-600">Khusus bagi pemilik usaha rental yang sedang menutup usahanya atau cosplayer yang ingin melikuidasi inventaris sekaligus dengan cepat. <?= htmlspecialchars($nama_aplikasi) ?> membeli inventaris kostum Anda dengan taksiran transparan didukung batas nego 0-8%.</p>
                        <ul class="text-xs text-gray-500 space-y-1 pt-2 border-t border-gray-200">
                            <li>✓ Pencairan dana cepat & borongan via Escrow</li>
                            <li>✓ Penjemputan paket inventaris kostum langsung</li>
                            <li>✓ Fitur negosiasi terkendali batas 8%</li>
                        </ul>
                    </div>
                </div>

                <!-- NOTIFIKASI KHUSUS JUAL PUTUS ADMIN -->
                <div class="p-4 bg-amber-50 border border-amber-200 rounded-xl text-xs text-amber-900 mb-8 flex items-start gap-3">
                    <span class="text-lg">💡</span>
                    <div>
                        <strong>Informasi Transparansi Alur:</strong> Opsi <em>Jual Putus</em> langsung ke cosplayer merupakan wewenang internal Administrator/Owner platform <?= htmlspecialchars($nama_aplikasi) ?> untuk menjual aset unit kostum inventaris rental kami sendiri ketika toko membutuhkan perputaran modal dan dana segar.
                    </div>
                </div>

                <aside class="p-6 sm:p-8 bg-indigo-50 border border-indigo-200 rounded-2xl flex flex-col md:flex-row items-center justify-between gap-6" aria-labelledby="nego-info-title">
                    <div class="space-y-2">
                        <h3 id="nego-info-title" class="text-xl font-bold text-indigo-900">💡 Fitur Nego Fleksibel Terkendali (0% - 8%)</h3>
                        <p class="text-sm text-indigo-800 leading-relaxed max-w-3xl">
                            Saat memasukkan kostum ke sistem Alih Fungsi, pemilik memiliki kontrol penuh atas opsi negosiasi. Anda dapat menyetel toleransi tawar-menawar mulai dari <strong>0% (Harga Pas / Tanpa Nego)</strong> hingga batas maksimal <strong>8%</strong>. Sistem otomatis menolak penawaran yang melebihi batas 8% sehingga harga jual atau taksiran tidak anjlok semena-mena.
                        </p>
                    </div>
                    <a href="alih-fungsi.html#simulasi-nego" class="whitespace-nowrap px-5 py-2.5 text-sm font-semibold text-indigo-900 bg-white hover:bg-indigo-100 border border-indigo-300 rounded-lg shadow-sm transition">
                        Coba Formulir Alih Fungsi & Nego &rarr;
                    </a>
                </aside>
            </div>
        </section>

        <!-- SEKSI SISTEM ESCROW (MELANJUTKAN STRUKTUR WEEK 4) -->
        <section id="alur-escrow" class="py-16 bg-gray-900 text-white" aria-labelledby="escrow-title">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <header class="text-center max-w-3xl mx-auto mb-12">
                    <span class="text-xs font-bold tracking-wider text-indigo-400 uppercase">Perlindungan Finansial 100%</span>
                    <h2 id="escrow-title" class="text-3xl font-extrabold sm:text-4xl mt-1">Alur Rekening Bersama Otomatis (Escrow)</h2>
                    <p class="text-gray-400 mt-2">Bagaimana <?= htmlspecialchars($nama_aplikasi) ?> menjamin keamanan transaksi sewa maupun transaksi alih fungsi produk.</p>
                </header>

                <ol class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <li class="p-6 bg-gray-800 border border-gray-700 rounded-xl relative">
                        <span class="text-xs font-bold text-indigo-400 uppercase">Langkah 1</span>
                        <h4 class="text-lg font-bold mt-1 mb-2">Pemesanan & Pembayaran</h4>
                        <p class="text-sm text-gray-300">Penyewa / pembeli membayar biaya transaksi beserta deposit jaminan ke rekening bersama otomatis <?= htmlspecialchars($nama_aplikasi) ?>.</p>
                    </li>
                    <li class="p-6 bg-gray-800 border border-gray-700 rounded-xl relative">
                        <span class="text-xs font-bold text-indigo-400 uppercase">Langkah 2</span>
                        <h4 class="text-lg font-bold mt-1 mb-2">Verifikasi & Pengiriman</h4>
                        <p class="text-sm text-gray-300">Pemilik mengirimkan kostum sesuai deskripsi. Resi pengiriman dicatat dan dilacak oleh sistem.</p>
                    </li>
                    <li class="p-6 bg-gray-800 border border-gray-700 rounded-xl relative">
                        <span class="text-xs font-bold text-indigo-400 uppercase">Langkah 3</span>
                        <h4 class="text-lg font-bold mt-1 mb-2">Penerimaan & Pengecekan</h4>
                        <p class="text-sm text-gray-300">Penyewa menerima kostum dan melakukan unboxing untuk memverifikasi kesesuaian kondisi serta kelengkapan fisik.</p>
                    </li>
                    <li class="p-6 bg-gray-800 border border-gray-700 rounded-xl relative">
                        <span class="text-xs font-bold text-indigo-400 uppercase">Langkah 4</span>
                        <h4 class="text-lg font-bold mt-1 mb-2">Pelepasan Dana & Refund</h4>
                        <p class="text-sm text-gray-300">Setelah periode sewa usai dan kostum kembali dengan selamat, dana sewa diteruskan ke pemilik dan deposit jaminan langsung dikembalikan ke penyewa.</p>
                    </li>
                </ol>
            </div>
        </section>

        <!-- SEKSI PUSAT VERIFIKASI (MELANJUTKAN STRUKTUR WEEK 4) -->
        <section id="pusat-verifikasi" class="py-16 bg-white" aria-labelledby="verifikasi-title">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <header class="text-center max-w-3xl mx-auto mb-12">
                    <span class="text-xs font-bold tracking-wider text-indigo-600 uppercase">Standarisasi Kualitas</span>
                    <h2 id="verifikasi-title" class="text-3xl font-extrabold text-gray-900 sm:text-4xl mt-1">Pusat Verifikasi & Jaminan Keamanan</h2>
                    <p class="text-gray-600 mt-2">Kami memastikan kostum yang beredar memiliki kualitas jujur dan kondisi yang transparan.</p>
                </header>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="p-6 bg-gray-50 border border-gray-200 rounded-xl">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Klasifikasi Standar Grade Kondisi Kostum</h3>
                        <dl class="space-y-4 text-sm text-gray-600">
                            <div>
                                <dt class="font-bold text-gray-900">Grade A (Kondisi Prima / Pristine):</dt>
                                <dd class="mt-1">Kondisi 90-100%, kain bersih tanpa noda/sobek, wig tertata rapi, aksesoris lengkap tanpa retak.</dd>
                            </div>
                            <div>
                                <dt class="font-bold text-gray-900">Grade B (Kondisi Wajar / Good):</dt>
                                <dd class="mt-1">Kondisi 75-89%, ada pemakaian wajar, noda minor di bagian dalam, wig perlu disisir ulang, aksesoris lengkap.</dd>
                            </div>
                            <div>
                                <dt class="font-bold text-gray-900">Grade C (Kondisi Minus Tertulis / Fair):</dt>
                                <dd class="mt-1">Kondisi 60-74%, terdapat minus tertentu (misal kancing lepas/resleting perlu pelumas), dicantumkan foto bukti jelas dengan harga sewa/jual yang lebih terjangkau.</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="p-6 bg-gray-50 border border-gray-200 rounded-xl">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Jaminan Keamanan Tambahan</h3>
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="flex gap-2">
                                <span class="text-indigo-600 font-bold">&bull;</span>
                                <div><strong class="text-gray-900">Verifikasi Identitas (KYC):</strong> Pemilik rental dan penyewa memvalidasi identitas via KTP/ID dan tautan akun media sosial cosplay resmi.</div>
                            </li>
                            <li class="flex gap-2">
                                <span class="text-indigo-600 font-bold">&bull;</span>
                                <div><strong class="text-gray-900">Deposit Jaminan Perlindungan:</strong> Menjaga aset pemilik rental dari resiko hilang atau rusak berat akibat kelalaian penyewa.</div>
                            </li>
                            <li class="flex gap-2">
                                <span class="text-indigo-600 font-bold">&bull;</span>
                                <div><strong class="text-gray-900">Perlindungan Dana Konsumen:</strong> Uang kembali 100% jika kostum yang dikirim tidak sesuai spesifikasi atau tidak dikirimkan oleh pemilik.</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- SEKSI FAQ (MELANJUTKAN STRUKTUR WEEK 4) -->
        <section id="faq" class="py-16 bg-gray-50 border-t border-gray-200" aria-labelledby="faq-title">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <header class="text-center mb-12">
                    <span class="text-xs font-bold tracking-wider text-indigo-600 uppercase">Paling Sering Ditanyakan</span>
                    <h2 id="faq-title" class="text-3xl font-extrabold text-gray-900 mt-1">Pertanyaan Seputar <?= htmlspecialchars($nama_aplikasi) ?></h2>
                </header>

                <div class="space-y-4">
                    <details class="group bg-white p-5 border border-gray-200 rounded-xl shadow-sm">
                        <summary class="font-bold text-gray-900 cursor-pointer flex justify-between items-center list-none">
                            Apa itu platform <?= htmlspecialchars($nama_aplikasi) ?>?
                            <span class="transition group-open:rotate-180">🔻</span>
                        </summary>
                        <p class="text-sm text-gray-600 mt-3 pt-3 border-t border-gray-100"><?= htmlspecialchars($nama_aplikasi) ?> adalah platform marketplace sewa kostum cosplay sekaligus penyedia solusi alih fungsi (jual/titip sewa/akuisisi) untuk kostum dari para pemilik usaha rental yang menutup tokonya atau cosplayer yang ingin memutar aset kostumnya.</p>
                    </details>

                    <details class="group bg-white p-5 border border-gray-200 rounded-xl shadow-sm">
                        <summary class="font-bold text-gray-900 cursor-pointer flex justify-between items-center list-none">
                            Bagaimana aturan fitur Nego Fleksibel (0% - 8%) pada Alih Fungsi?
                            <span class="transition group-open:rotate-180">🔻</span>
                        </summary>
                        <p class="text-sm text-gray-600 mt-3 pt-3 border-t border-gray-100">Pemilik kostum dapat memilih apakah kostumnya bisa ditawar atau berharga pas (0%). Jika diaktifkan, pemilik dapat menetapkan batas toleransi tawar maksimal 8%. Sistem akan menolak penawaran yang melebihi batas 8% untuk melindungi nilai barang pemilik.</p>
                    </details>

                    <details class="group bg-white p-5 border border-gray-200 rounded-xl shadow-sm">
                        <summary class="font-bold text-gray-900 cursor-pointer flex justify-between items-center list-none">
                            Bagaimana ketentuan uang jaminan (deposit)? Apakah wajib?
                            <span class="transition group-open:rotate-180">🔻</span>
                        </summary>
                        <p class="text-sm text-gray-600 mt-3 pt-3 border-t border-gray-100">Uang jaminan bersifat <strong>opsional</strong> dan hanya ditujukan bagi penyewa yang baru <strong>pertama kali</strong> merental kostum di platform/mitra bersangkutan sebagai jaminan keamanan awal. Jika Anda sudah pernah menyewa sebelumnya atau memiliki akun yang lolos verifikasi reputasi baik di <?= htmlspecialchars($nama_aplikasi) ?>, uang jaminan <strong>bebas / Rp 0</strong>. Uang deposit yang dibayarkan akan dikembalikan 100% setelah kostum selesai disewa tanpa cacat.</p>
                    </details>

                    <details class="group bg-white p-5 border border-gray-200 rounded-xl shadow-sm">
                        <summary class="font-bold text-gray-900 cursor-pointer flex justify-between items-center list-none">
                            Apakah saya bisa memesan sewa kostum dengan sistem DP (Uang Muka)?
                            <span class="transition group-open:rotate-180">🔻</span>
                        </summary>
                        <p class="text-sm text-gray-600 mt-3 pt-3 border-t border-gray-100">Bisa! <?= htmlspecialchars($nama_aplikasi) ?> menyediakan fitur <strong>DP Booking (30% atau 50%)</strong> untuk mengunci tanggal kostum agar tidak diambil oleh cosplayer lain untuk event tersebut. Sisa pembayaran sewa dapat dilunasi H-2 sebelum tanggal pengiriman.</p>
                    </details>

                    <details class="group bg-white p-5 border border-gray-200 rounded-xl shadow-sm">
                        <summary class="font-bold text-gray-900 cursor-pointer flex justify-between items-center list-none">
                            Saya punya rental kostum yang mau tutup, bagaimana cara <?= htmlspecialchars($nama_aplikasi) ?> membantu?
                            <span class="transition group-open:rotate-180">🔻</span>
                        </summary>
                        <p class="text-sm text-gray-600 mt-3 pt-3 border-t border-gray-100">Anda dapat memilih skema Akuisisi Borongan oleh <?= htmlspecialchars($nama_aplikasi) ?> melalui halaman <a href="alih-fungsi.html" class="text-indigo-600 font-medium hover:underline">Alih Fungsi</a>. Tim kami akan mendata seluruh katalog kostum Anda dan memberikan penawaran borongan agar Anda tidak perlu menunggu pembeli satu per satu.</p>
                    </details>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER (MENGGUNAKAN VARIABEL TASK 01) -->
    <footer id="footer-utama" class="bg-gray-900 text-gray-400 py-12 border-t border-gray-800 text-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="space-y-3">
                <h3 class="text-lg font-bold text-white"><?= htmlspecialchars($nama_aplikasi) ?></h3>
                <p class="text-xs leading-relaxed">Platform marketplace sewa kostum cosplay, alur alih fungsi reuse kostum rental tutup, sistem nego terkendali 0-8%, dan rekening bersama otomatis.</p>
                <p class="text-xs text-gray-500">&copy; <?= htmlspecialchars($tahun_aktif) ?> <?= htmlspecialchars($nama_aplikasi) ?> Indonesia. Hak Cipta Dilindungi.</p>
            </div>

            <div>
                <h4 class="text-sm font-bold text-white mb-3">Navigasi</h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="index.php" class="hover:text-white transition">Beranda (PHP SSR)</a></li>
                    <li><a href="catalog.html" class="hover:text-white transition">Katalog Kostum Sewa</a></li>
                    <li><a href="alih-fungsi.html" class="hover:text-white transition">Form Alih Fungsi & Nego (0-8%)</a></li>
                    <li><a href="dashboard-rental.html" class="hover:text-white transition">Dashboard Manajemen Rental</a></li>
                    <li><a href="detail-kostum.html" class="hover:text-white transition">Contoh Detail Kostum</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-bold text-white mb-3">Keamanan & Layanan</h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="#alur-escrow" class="hover:text-white transition">Sistem Escrow Otomatis</a></li>
                    <li><a href="#pusat-verifikasi" class="hover:text-white transition">Standar Verifikasi Grade A/B/C</a></li>
                    <li><a href="#program-prioritas" class="hover:text-white transition">Program Prioritas (SSR)</a></li>
                    <li><a href="#faq" class="hover:text-white transition">FAQ & Pusat Bantuan</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-bold text-white mb-3">Komunitas & Kontak</h4>
                <address class="not-italic text-xs space-y-2">
                    <p>Email: <?= htmlspecialchars($kontak_email) ?></p>
                    <p>WhatsApp Hotline: <?= htmlspecialchars($kontak_wa) ?></p>
                    <p><?= htmlspecialchars($nama_komunitas) ?></p>
                </address>
            </div>
        </div>
    </footer>

    <!-- ENGINE SCRIPT UNTUK SINKRONISASI SESI NAVBAR & MENU MOBILE -->
    <script src="app.js"></script>
</body>
</html>
