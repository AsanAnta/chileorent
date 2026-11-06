<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($name) ?> - <?= htmlspecialchars($tagline) ?> | MVC Pertemuan 7</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">

    <!-- TOP BAR INDIKATOR IMPLEMENTASI PERTEMUAN 7 - MVC (MODEL VIEW CONTROLLER) -->
    <aside class="bg-indigo-950 text-indigo-100 text-xs py-2 px-4 border-b border-indigo-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-emerald-600 font-mono text-[10px] font-bold text-white uppercase shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                    MVC ACTIVE: MODEL &rarr; CONTROLLER &rarr; VIEW
                </span>
                <span>
                    <strong><?= htmlspecialchars($profile['academic_info']['session']) ?></strong>:
                    <code>Model/Chileorent.php</code> &bull; <code>Controller/ChileorentController.php</code> &bull; <code>View/chileorent-page.php</code>
                </span>
            </div>
            <div class="flex items-center gap-3 text-[11px] text-indigo-200">
                <a href="#mvc-architecture" class="underline font-semibold text-amber-300 hover:text-white transition">Lihat Alur MVC &darr;</a>
                <a href="#program-prioritas" class="underline font-semibold text-white hover:text-indigo-200 transition">Program Prioritas &darr;</a>
            </div>
        </div>
    </aside>

    <!-- HEADER & NAVIGASI UTAMA (GENERATED DARI DATA VIEW $profile['navigation']) -->
    <header id="header-utama" class="bg-white border-b border-gray-200 shadow-sm sticky top-8 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between gap-4">
            <!-- Logo & Slogan -->
            <div class="flex items-center gap-3 shrink-0">
                <a href="index.php" class="text-2xl font-bold text-indigo-600 hover:text-indigo-700 transition whitespace-nowrap">
                    <h1><?= htmlspecialchars($name) ?></h1>
                </a>
                <p class="hidden xl:block text-xs text-gray-500 border-l border-gray-300 pl-3 whitespace-nowrap">
                    <?= htmlspecialchars($tagline) ?>
                </p>
            </div>

            <!-- Navigasi Desktop -->
            <nav id="navigasi-utama" aria-label="Navigasi Utama" class="hidden md:flex items-center">
                <ul class="flex items-center gap-2 lg:gap-4 text-sm font-medium text-gray-600">
                    <?php foreach ($profile['navigation'] as $nav): ?>
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

            <!-- Aksi Auth Desktop -->
            <div id="desktop-auth-actions" class="hidden md:flex items-center gap-2 shrink-0">
                <a href="login.html" class="px-3 py-1.5 text-sm font-medium text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 transition whitespace-nowrap">Masuk</a>
                <a href="register.html" class="px-3 py-1.5 text-sm font-medium text-white bg-gray-800 hover:bg-gray-900 rounded-lg transition whitespace-nowrap">Daftar Akun</a>
            </div>

            <!-- Kontrol Mobile: Tombol Hamburger -->
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
                    <?php foreach ($profile['navigation'] as $nav): ?>
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

        <!-- NOTIFIKASI CONTROLLER FEEDBACK (TASK 02) -->
        <?php if (!empty($feedback)): ?>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                <div class="p-4 rounded-2xl bg-indigo-50 border border-indigo-200 text-indigo-900 text-xs sm:text-sm flex flex-col sm:flex-row sm:items-center justify-between gap-3 shadow-sm">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">⚙️</span>
                        <div>
                            <strong class="font-bold">Controller Respons:</strong>
                            <p class="text-xs text-indigo-700 mt-0.5"><?= htmlspecialchars($feedback) ?></p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-2.5 py-1 rounded bg-indigo-200 text-indigo-900 font-mono text-[10px] font-bold uppercase">
                            Method: <?= htmlspecialchars($activeMethod) ?>()
                        </span>
                        <?php if ($activeMethod !== 'index'): ?>
                            <a href="index.php" class="px-2.5 py-1 rounded bg-white hover:bg-gray-100 text-indigo-600 font-semibold text-xs border border-indigo-200 transition">
                                Reset ke Semua Data
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- HERO SECTION (VIEW MENERIMA DATA DARI MODEL VIA CONTROLLER) -->
        <section id="hero" class="bg-gradient-to-br from-indigo-900 via-indigo-800 to-slate-900 text-white py-16 lg:py-24" aria-labelledby="hero-title">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="inline-block px-3 py-1 text-xs font-semibold tracking-wide bg-indigo-500/20 text-indigo-200 border border-indigo-400/30 rounded-full">
                            <?= htmlspecialchars($profile['badge_hero']) ?>
                        </span>
                        <span class="inline-block px-3 py-1 text-xs font-bold tracking-wide bg-emerald-400/20 text-emerald-200 border border-emerald-400/30 rounded-full">
                            Periode: <?= htmlspecialchars($period) ?>
                        </span>
                    </div>

                    <h2 id="hero-title" class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight">
                        <?= htmlspecialchars($profile['slogan_hero']) ?>
                    </h2>
                    <p class="text-indigo-100 text-base sm:text-lg leading-relaxed">
                        <?= htmlspecialchars($profile['description']) ?>
                    </p>

                    <div class="flex flex-wrap gap-4 pt-2">
                        <a href="#program-prioritas" class="px-6 py-3 text-sm font-semibold text-indigo-900 bg-white hover:bg-indigo-50 rounded-lg shadow transition">
                            Lihat Program Prioritas (MVC Grid)
                        </a>
                        <a href="alih-fungsi.html" class="px-6 py-3 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border border-indigo-400/30 shadow transition">
                            Mulai Alih Fungsi Kostum
                        </a>
                    </div>

                    <ul class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-6 border-t border-indigo-700/60">
                        <?php foreach ($profile['highlights'] as $highlight): ?>
                            <div>
                                <strong class="block text-xl font-bold text-white"><?= htmlspecialchars($highlight['value']) ?></strong>
                                <span class="text-xs text-indigo-200"><?= htmlspecialchars($highlight['label']) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Visual Card Platform dari Model & Controller -->
                <div class="flex justify-center">
                    <div class="bg-indigo-950/60 p-4 sm:p-5 rounded-2xl border border-indigo-700/60 shadow-2xl w-full max-w-lg space-y-4 backdrop-blur-sm">
                        <figure class="overflow-hidden rounded-xl border border-indigo-800/80 relative">
                            <img src="<?= htmlspecialchars($profile['hero_image']) ?>"
                                 alt="Ilustrasi Platform <?= htmlspecialchars($name) ?>"
                                 class="w-full h-auto object-cover">
                            <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-slate-950/95 via-slate-950/70 to-transparent p-4 flex items-end justify-between">
                                <div>
                                    <span class="text-[10px] font-mono uppercase tracking-wider text-amber-300 block">MVC Model: Model/Chileorent.php</span>
                                    <h3 class="text-xl font-extrabold text-white"><?= htmlspecialchars($name) ?></h3>
                                    <p class="text-xs text-indigo-200 font-semibold">Periode Layanan: <?= htmlspecialchars($period) ?></p>
                                </div>
                                <span class="px-2.5 py-1 rounded-lg bg-emerald-500/20 border border-emerald-400/40 text-emerald-200 text-[11px] font-bold">
                                    <?= count($programs) ?> Item Tampil
                                </span>
                            </div>
                        </figure>

                        <!-- Panel Interaktif Uji Controller (Task 02) -->
                        <div class="bg-white/10 rounded-xl p-3.5 border border-indigo-700/50 space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-white uppercase tracking-wider">Uji Method Controller:</span>
                                <span class="text-[10px] font-mono text-emerald-300">REQUEST &rarr; CONTROLLER</span>
                            </div>
                            <div class="grid grid-cols-3 gap-2 text-center text-xs">
                                <a href="index.php?action=index" class="p-2 rounded-lg bg-indigo-900/80 hover:bg-indigo-800 text-white font-bold border border-indigo-700 transition">
                                    index()
                                    <span class="block text-[10px] font-normal text-indigo-200">Semua Data</span>
                                </a>
                                <a href="index.php?action=show&id=c1" class="p-2 rounded-lg bg-indigo-900/80 hover:bg-indigo-800 text-white font-bold border border-indigo-700 transition">
                                    show('c1')
                                    <span class="block text-[10px] font-normal text-indigo-200">Detail Frieren</span>
                                </a>
                                <a href="#form-filter-mvc" class="p-2 rounded-lg bg-amber-500/90 hover:bg-amber-400 text-slate-900 font-bold border border-amber-300 transition">
                                    process()
                                    <span class="block text-[10px] font-normal text-slate-900">Form Filter</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SEKSI DETAIL KOSTUM TERTENTU JIKA DIPANGGIL VIA METHOD show() -->
        <?php if (!empty($selectedCostume)): ?>
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
                <div class="bg-indigo-900 text-white rounded-3xl p-6 sm:p-8 shadow-xl border border-indigo-700 grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                    <div class="md:col-span-4 rounded-2xl overflow-hidden shadow-lg h-64 bg-gray-800">
                        <img src="<?= htmlspecialchars($selectedCostume['gambar']) ?>" 
                             alt="<?= htmlspecialchars($selectedCostume['judul']) ?>" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="md:col-span-8 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-1 rounded bg-amber-400 text-slate-950 font-bold text-xs font-mono">
                                Controller::show('<?= htmlspecialchars($selectedCostume['id']) ?>')
                            </span>
                            <span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 text-xs font-bold">
                                <?= htmlspecialchars($selectedCostume['status']) ?>
                            </span>
                        </div>
                        <h3 class="text-2xl font-black text-white"><?= htmlspecialchars($selectedCostume['judul']) ?></h3>
                        <p class="text-indigo-200 text-sm leading-relaxed"><?= htmlspecialchars($selectedCostume['deskripsi']) ?></p>
                        <div class="flex flex-wrap gap-2 text-xs pt-1">
                            <span class="px-2.5 py-1 rounded-lg bg-indigo-950/80 border border-indigo-700">Karakter: <strong><?= htmlspecialchars($selectedCostume['karakter']) ?></strong></span>
                            <span class="px-2.5 py-1 rounded-lg bg-indigo-950/80 border border-indigo-700">Seri: <strong><?= htmlspecialchars($selectedCostume['seri']) ?></strong></span>
                            <span class="px-2.5 py-1 rounded-lg bg-indigo-950/80 border border-indigo-700">Ukuran: <strong><?= htmlspecialchars($selectedCostume['ukuran']) ?></strong></span>
                            <span class="px-2.5 py-1 rounded-lg bg-indigo-950/80 border border-indigo-700">Harga: <strong class="text-amber-300"><?= $model->formatRupiah($selectedCostume['harga']) ?> / 3 Hari</strong></span>
                        </div>
                        <div class="pt-2 flex items-center gap-3">
                            <a href="detail-kostum.html?id=<?= urlencode($selectedCostume['id']) ?>" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-xl text-xs font-bold shadow transition">
                                Buka Form Booking Detail &rarr;
                            </a>
                            <a href="index.php" class="px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded-xl text-xs font-semibold transition">
                                Tutup Panel Detail
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!-- SEKSI PENJELASAN ARSITEKTUR MVC PERTEMUAN 7 (CHECKLIST & DIAGRAM ALUR) -->
        <section id="mvc-architecture" class="py-10 bg-indigo-50/70 border-b border-indigo-100" aria-labelledby="mvc-title">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white border border-indigo-200 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-5 border-b border-gray-100">
                        <div>
                            <span class="text-[11px] font-bold uppercase tracking-wider text-indigo-600">
                                <?= htmlspecialchars($profile['academic_info']['course']) ?> &bull; <?= htmlspecialchars($profile['academic_info']['session']) ?>
                            </span>
                            <h2 id="mvc-title" class="text-xl sm:text-2xl font-extrabold text-gray-900 mt-0.5">
                                Arsitektur MVC: Model, View, Controller
                            </h2>
                            <p class="text-xs text-gray-500 mt-1">
                                Struktur kode telah dipisahkan secara modular sesuai kaidah rekayasa perangkat lunak web modern.
                            </p>
                        </div>
                        <div class="flex flex-wrap gap-2 text-xs">
                            <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 font-semibold">✓ Task 01: Design MVC</span>
                            <span class="px-3 py-1 rounded-full bg-indigo-100 text-indigo-800 font-semibold">✓ Task 02: Build Controller</span>
                            <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-900 font-semibold">✓ Task 03: Connect MVC</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-xs">
                        <!-- Task 01: Model -->
                        <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200 space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center font-black text-sm">M</span>
                                <span class="px-2 py-0.5 rounded bg-emerald-600 text-white font-mono text-[10px]">MODEL</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-900">Task 01: Design the Model</h3>
                            <p class="text-gray-600">Mengelola data dan aturan bisnis. Bersih dari kode HTML tampilan.</p>
                            <div class="bg-white p-3 rounded-xl border border-gray-200 font-mono text-[11px] space-y-1 text-emerald-900">
                                <div>📁 <strong>Model/Chileorent.php</strong></div>
                                <div class="text-[10px] text-gray-500 pt-1">Props: $name, $period, $programs</div>
                            </div>
                        </div>

                        <!-- Task 02: Controller -->
                        <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200 space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="w-8 h-8 rounded-xl bg-indigo-100 text-indigo-800 flex items-center justify-center font-black text-sm">C</span>
                                <span class="px-2 py-0.5 rounded bg-indigo-600 text-white font-mono text-[10px]">CONTROLLER</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-900">Task 02: Build the Controller</h3>
                            <p class="text-gray-600">Menangani request pengguna, memanggil Model, dan mengarahkan ke View.</p>
                            <div class="bg-white p-3 rounded-xl border border-gray-200 font-mono text-[11px] space-y-1 text-indigo-900">
                                <div>⚙️ <strong>index()</strong>: render default view</div>
                                <div>⚙️ <strong>show()</strong>: render item spesifik</div>
                                <div>⚙️ <strong>process()</strong>: tangani request form</div>
                            </div>
                        </div>

                        <!-- Task 03: View -->
                        <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200 space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="w-8 h-8 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center font-black text-sm">V</span>
                                <span class="px-2 py-0.5 rounded bg-amber-600 text-white font-mono text-[10px]">VIEW</span>
                            </div>
                            <h3 class="text-sm font-bold text-gray-900">Task 03: Connect MVC</h3>
                            <p class="text-gray-600">Menampilkan antarmuka web dari data yang dikirimkan oleh Controller.</p>
                            <div class="bg-white p-3 rounded-xl border border-gray-200 font-mono text-[11px] space-y-1 text-amber-900">
                                <div>🖼️ <strong>View/chileorent-page.php</strong></div>
                                <div class="text-[10px] text-gray-500 pt-1">Zero logic duplication &bull; Clean UI</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SEKSI 6 PILAR FITUR UTAMA (DARI MODEL VIA CONTROLLER) -->
        <section id="fitur-unggulan" class="py-16 bg-white" aria-labelledby="fitur-title">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <header class="text-center max-w-3xl mx-auto mb-12">
                    <span class="text-xs font-bold tracking-wider text-indigo-600 uppercase">Fitur Unggulan &bull; Model Data</span>
                    <h2 id="fitur-title" class="text-3xl font-extrabold text-gray-900 sm:text-4xl mt-1">
                        6 Pilar Solusi Cerdas <?= htmlspecialchars($name) ?>
                    </h2>
                    <p class="text-gray-600 mt-2">Mendukung ekosistem cosplay yang berkelanjutan, aman bagi penyewa, dan menguntungkan bagi pemilik kostum.</p>
                </header>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach ($pillars as $pillar): ?>
                        <article class="p-6 bg-gray-50 border border-gray-200 rounded-2xl hover:shadow-md transition">
                            <div class="text-3xl mb-4"><?= $pillar['icon'] ?></div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2"><?= htmlspecialchars($pillar['title']) ?></h3>
                            <p class="text-sm text-gray-600 mb-4 leading-relaxed"><?= htmlspecialchars($pillar['description']) ?></p>
                            <a href="<?= htmlspecialchars($pillar['link_url']) ?>" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800">
                                <?= htmlspecialchars($pillar['link_text']) ?> &rarr;
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ==============================================================================
             TASK 03: DYNAMIC GRID CARDS DIHASILKAN MELALUI ALUR MVC
             MODEL ($model) -> CONTROLLER ($controller) -> VIEW ($programs)
             ============================================================================== -->
        <section id="program-prioritas" class="py-16 bg-gray-50 border-t border-gray-200" aria-labelledby="katalog-title">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <header class="text-center max-w-3xl mx-auto mb-8">
                    <div class="inline-flex flex-wrap items-center justify-center gap-2 mb-2">
                        <span class="text-xs font-bold tracking-wider text-indigo-600 uppercase"><?= htmlspecialchars($profile['section_ssr_label']) ?></span>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-100 text-emerald-800 border border-emerald-300">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600 animate-pulse"></span>
                            MVC Dynamic Grid (<?= count($programs) ?> Item Ditampilkan)
                        </span>
                    </div>
                    <h2 id="katalog-title" class="text-3xl font-extrabold text-gray-900 sm:text-4xl mt-1">
                        <?= htmlspecialchars($profile['section_ssr_title']) ?>
                    </h2>
                    <p class="text-gray-600 mt-2 text-sm sm:text-base">
                        <?= htmlspecialchars($profile['section_ssr_desc']) ?>
                    </p>
                </header>

                <!-- FORM FILTER UNTUK MENGUJI CONTROLLER METHOD process() -->
                <div id="form-filter-mvc" class="bg-white p-4 sm:p-5 rounded-2xl border border-gray-200 shadow-sm mb-8">
                    <form action="index.php" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-end">
                        <input type="hidden" name="action" value="process">
                        
                        <div class="sm:col-span-5">
                            <label for="keyword" class="block text-xs font-bold text-gray-700 mb-1">Cari Karakter / Anime / Seri:</label>
                            <input type="text" id="keyword" name="keyword" value="<?= htmlspecialchars($filterKeyword ?? '') ?>" 
                                   placeholder="Cth: Frieren, Genshin, Honkai, Gojo..."
                                   class="w-full px-3 py-2 text-xs border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        </div>

                        <div class="sm:col-span-4">
                            <label for="status" class="block text-xs font-bold text-gray-700 mb-1">Status Ketersediaan:</label>
                            <select id="status" name="status" class="w-full px-3 py-2 text-xs border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none bg-white">
                                <option value="all">Semua Status</option>
                                <option value="Tersedia" <?= (($filterStatus ?? '') === 'Tersedia') ? 'selected' : '' ?>>Tersedia (Siap Sewa)</option>
                                <option value="Disewa" <?= (($filterStatus ?? '') === 'Disewa') ? 'selected' : '' ?>>Disewa</option>
                                <option value="Booking" <?= (($filterStatus ?? '') === 'Booking') ? 'selected' : '' ?>>Booking</option>
                                <option value="Perawatan" <?= (($filterStatus ?? '') === 'Perawatan') ? 'selected' : '' ?>>Perawatan</option>
                            </select>
                        </div>

                        <div class="sm:col-span-3 flex gap-2">
                            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-xs font-bold shadow-sm transition">
                                Saring (process)
                            </button>
                            <a href="index.php" class="py-2 px-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-xs font-semibold transition text-center whitespace-nowrap">
                                Reset
                            </a>
                        </div>
                    </form>
                </div>

                <!-- RINGKASAN STATUS DARI MODEL -->
                <div class="flex flex-wrap items-center justify-center gap-3 mb-10 text-xs">
                    <div class="px-3.5 py-2 bg-white border border-gray-200 rounded-xl shadow-sm flex items-center gap-2">
                        <span class="font-bold text-gray-900">Total Program Prioritas:</span>
                        <span class="px-2 py-0.5 bg-indigo-100 text-indigo-800 font-bold rounded-md"><?= $programStats['total'] ?> Kostum</span>
                    </div>
                    <div class="px-3.5 py-2 bg-white border border-gray-200 rounded-xl shadow-sm flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span class="text-gray-600">Siap Sewa:</span>
                        <strong class="text-emerald-700"><?= $programStats['siap_sewa'] ?> Unit</strong>
                    </div>
                    <div class="px-3.5 py-2 bg-white border border-gray-200 rounded-xl shadow-sm flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                        <span class="text-gray-600">Sedang Disewa / DP:</span>
                        <strong class="text-amber-700"><?= $programStats['terbooking'] ?> Unit</strong>
                    </div>
                    <div class="px-3.5 py-2 bg-white border border-gray-200 rounded-xl shadow-sm flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                        <span class="text-gray-600">Perawatan / Laundry:</span>
                        <strong class="text-rose-700"><?= $programStats['perawatan'] ?> Unit</strong>
                    </div>
                </div>

                <!-- DYNAMIC GRID CARDS -->
                <div id="ssr-priority-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php
                    $nomor_urut = 1;
                    foreach ($programs as $kostum):
                        $nomor_tampil = str_pad($nomor_urut, 2, '0', STR_PAD_LEFT);

                        // Memanggil Method Helper Model untuk Styling Badge
                        $statusBadge = $model->getStatusBadge($kostum['status']);
                        $gradeBadge  = $model->getGradeBadge($kostum['grade']);
                        $hargaFormat = $model->formatRupiah($kostum['harga']);
                    ?>
                        <article class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm flex flex-col justify-between hover:shadow-md transition">
                            <div>
                                <figure class="relative h-64 overflow-hidden bg-gray-100">
                                    <img src="<?= htmlspecialchars($kostum['gambar']) ?>"
                                         alt="Kostum Cosplay <?= htmlspecialchars($kostum['judul']) ?>"
                                         class="w-full h-full object-cover hover:scale-105 transition duration-300"
                                         onerror="this.src='https://placehold.co/320x400/3d5a80/ffffff?text=<?= urlencode($kostum['karakter']) ?>'">

                                    <!-- Nomor Urut & Badge Grade -->
                                    <div class="absolute top-2 left-2 flex items-center gap-1.5">
                                        <span class="bg-gray-900/90 text-white text-xs font-extrabold px-2 py-1 rounded shadow backdrop-blur-sm border border-gray-700">
                                            #<?= $nomor_tampil ?>
                                        </span>
                                        <span class="<?= $gradeBadge['class'] ?> text-xs font-semibold px-2 py-1 rounded shadow">
                                            <?= htmlspecialchars($gradeBadge['text']) ?>
                                        </span>
                                    </div>

                                    <!-- Badge Ukuran -->
                                    <span class="absolute top-2 right-2 bg-white/95 backdrop-blur-sm text-gray-800 text-[10px] font-bold px-2 py-0.5 rounded shadow">
                                        Size <?= htmlspecialchars($kostum['ukuran']) ?>
                                    </span>

                                    <!-- Badge Status -->
                                    <div class="absolute bottom-2 left-2 right-2 flex items-center justify-between gap-1">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-bold border shadow-sm <?= $statusBadge['badge_class'] ?>">
                                            <span class="w-1.5 h-1.5 rounded-full <?= $statusBadge['dot_class'] ?>"></span>
                                            <?= htmlspecialchars($statusBadge['text']) ?>
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
                                        <a href="index.php?action=show&id=<?= urlencode($kostum['id']) ?>" class="hover:text-indigo-600 transition">
                                            <?= htmlspecialchars($kostum['judul']) ?>
                                        </a>
                                    </h3>

                                    <p class="text-xs text-gray-600 mt-1">
                                        Ukuran: <strong><?= htmlspecialchars($kostum['ukuran']) ?></strong> (<?= htmlspecialchars($kostum['gender']) ?>)
                                    </p>

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
                                    <span class="text-lg font-bold text-indigo-600"><?= htmlspecialchars($hargaFormat) ?></span>
                                    <span class="text-xs text-gray-500">/ 3 Hari</span>
                                </p>
                                <div class="flex items-center gap-1.5">
                                    <a href="index.php?action=show&id=<?= urlencode($kostum['id']) ?>"
                                       class="px-2.5 py-1.5 text-xs font-semibold rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-800 transition">
                                        show()
                                    </a>
                                    <a href="detail-kostum.html?id=<?= urlencode($kostum['id']) ?>"
                                       class="px-3 py-1.5 text-xs font-semibold rounded-lg transition shadow-sm <?= $statusBadge['cta_class'] ?>">
                                        <?= htmlspecialchars($statusBadge['cta_text']) ?>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php
                        $nomor_urut++;
                    endforeach;
                    ?>
                </div>

                <div class="mt-10 text-center">
                    <a href="catalog.html" class="inline-flex items-center px-6 py-3 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl shadow transition">
                        Lihat Seluruh Katalog Kostum &rarr;
                    </a>
                </div>
            </div>
        </section>

        <!-- SEKSI ALUR ALIH FUNGSI PRODUK & FITUR NEGO -->
        <section id="alur-alih-fungsi" class="py-16 bg-white" aria-labelledby="alih-fungsi-title">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <header class="text-center max-w-3xl mx-auto mb-12">
                    <span class="text-xs font-bold tracking-wider text-indigo-600 uppercase">Solusi Pemilik Rental Tutup &amp; Cosplayer</span>
                    <h2 id="alih-fungsi-title" class="text-3xl font-extrabold text-gray-900 sm:text-4xl mt-1">Jangan Biarkan Kostum Menumpuk di Gudang</h2>
                    <p class="text-gray-600 mt-2">Alih fungsikan koleksi kostum Anda agar menghasilkan uang dan dapat dinikmati oleh sesama cosplayer.</p>
                </header>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <div class="p-6 bg-gray-50 border border-gray-200 rounded-2xl space-y-3">
                        <div class="text-3xl">🤝</div>
                        <h3 class="text-lg font-bold text-gray-900">1. Titip Sewa (Konsinyasi Bagi Hasil)</h3>
                        <p class="text-sm text-gray-600">Kostum tetap milik Anda, namun dikelola dan direntalkan melalui jaringan <?= htmlspecialchars($name) ?>. Anda mendapatkan pendapatan pasif berkala setiap kali kostum disewa tanpa perlu repot mengurus administrasi dan laundry.</p>
                        <ul class="text-xs text-gray-500 space-y-1 pt-2 border-t border-gray-200">
                            <li>✓ Bagi hasil transparan (70% pemilik : 30% platform)</li>
                            <li>✓ Asuransi proteksi kerusakan kostum</li>
                            <li>✓ Laporan status sewa real-time di dashboard</li>
                        </ul>
                    </div>

                    <div class="p-6 bg-gray-50 border border-gray-200 rounded-2xl space-y-3">
                        <div class="text-3xl">🏢</div>
                        <h3 class="text-lg font-bold text-gray-900">2. Beli Langsung oleh <?= htmlspecialchars($name) ?> (Akuisisi)</h3>
                        <p class="text-sm text-gray-600">Khusus bagi pemilik usaha rental yang sedang menutup usahanya atau cosplayer yang ingin melikuidasi inventaris sekaligus dengan cepat. <?= htmlspecialchars($name) ?> membeli inventaris kostum Anda dengan taksiran transparan didukung batas nego 0-8%.</p>
                        <ul class="text-xs text-gray-500 space-y-1 pt-2 border-t border-gray-200">
                            <li>✓ Pencairan dana cepat &amp; borongan via Escrow</li>
                            <li>✓ Penjemputan paket inventaris kostum langsung</li>
                            <li>✓ Fitur negosiasi terkendali batas 8%</li>
                        </ul>
                    </div>
                </div>

                <aside class="p-6 sm:p-8 bg-indigo-50 border border-indigo-200 rounded-2xl flex flex-col md:flex-row items-center justify-between gap-6" aria-labelledby="nego-info-title">
                    <div class="space-y-2">
                        <h3 id="nego-info-title" class="text-xl font-bold text-indigo-900">💡 Fitur Nego Fleksibel Terkendali (0% - 8%)</h3>
                        <p class="text-sm text-indigo-800 leading-relaxed max-w-3xl">
                            Saat memasukkan kostum ke sistem Alih Fungsi, pemilik memiliki kontrol penuh atas opsi negosiasi dengan toleransi tawar-menawar <strong>0% (Harga Pas)</strong> hingga maksimal <strong>8%</strong>.
                        </p>
                    </div>
                    <a href="alih-fungsi.html#simulasi-nego" class="whitespace-nowrap px-5 py-2.5 text-sm font-semibold text-indigo-900 bg-white hover:bg-indigo-100 border border-indigo-300 rounded-xl shadow-sm transition">
                        Coba Formulir Alih Fungsi &amp; Nego &rarr;
                    </a>
                </aside>
            </div>
        </section>

        <!-- SEKSI SISTEM ESCROW (DARI MODEL VIA CONTROLLER) -->
        <section id="alur-escrow" class="py-16 bg-gray-900 text-white" aria-labelledby="escrow-title">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <header class="text-center max-w-3xl mx-auto mb-12">
                    <span class="text-xs font-bold tracking-wider text-indigo-400 uppercase">Perlindungan Finansial 100%</span>
                    <h2 id="escrow-title" class="text-3xl font-extrabold sm:text-4xl mt-1">Alur Rekening Bersama Otomatis (Escrow)</h2>
                    <p class="text-gray-400 mt-2">Bagaimana <?= htmlspecialchars($name) ?> menjamin keamanan transaksi sewa maupun alih fungsi produk.</p>
                </header>

                <ol class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php foreach ($escrowSteps as $step): ?>
                        <li class="p-6 bg-gray-800 border border-gray-700 rounded-2xl relative">
                            <span class="text-xs font-bold text-indigo-400 uppercase"><?= htmlspecialchars($step['step']) ?></span>
                            <h4 class="text-lg font-bold mt-1 mb-2"><?= htmlspecialchars($step['title']) ?></h4>
                            <p class="text-sm text-gray-300 leading-relaxed"><?= htmlspecialchars($step['description']) ?></p>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </section>

        <!-- SEKSI FAQ (DARI MODEL VIA CONTROLLER) -->
        <section id="faq" class="py-16 bg-gray-50 border-t border-gray-200" aria-labelledby="faq-title">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <header class="text-center mb-12">
                    <span class="text-xs font-bold tracking-wider text-indigo-600 uppercase">Paling Sering Ditanyakan</span>
                    <h2 id="faq-title" class="text-3xl font-extrabold text-gray-900 mt-1">Pertanyaan Seputar <?= htmlspecialchars($name) ?></h2>
                </header>

                <div class="space-y-4">
                    <?php foreach ($faqs as $faq): ?>
                        <details class="group bg-white p-5 border border-gray-200 rounded-2xl shadow-sm">
                            <summary class="font-bold text-gray-900 cursor-pointer flex justify-between items-center list-none">
                                <?= htmlspecialchars($faq['question']) ?>
                                <span class="transition group-open:rotate-180">🔻</span>
                            </summary>
                            <p class="text-sm text-gray-600 mt-3 pt-3 border-t border-gray-100 leading-relaxed">
                                <?= htmlspecialchars($faq['answer']) ?>
                            </p>
                        </details>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER (DATA PROFIL DARI MODEL) -->
    <footer id="footer-utama" class="bg-gray-900 text-gray-400 py-12 border-t border-gray-800 text-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="space-y-3">
                <h3 class="text-lg font-bold text-white"><?= htmlspecialchars($name) ?></h3>
                <p class="text-xs leading-relaxed"><?= htmlspecialchars($tagline) ?></p>
                <p class="text-xs text-gray-500">&copy; <?= htmlspecialchars($profile['contact']['year']) ?> <?= htmlspecialchars($name) ?> Indonesia (Periode <?= htmlspecialchars($period) ?>).</p>
            </div>

            <div>
                <h4 class="text-sm font-bold text-white mb-3">Navigasi MVC</h4>
                <ul class="space-y-2 text-xs">
                    <?php foreach ($profile['navigation'] as $nav): ?>
                        <li>
                            <a href="<?= htmlspecialchars($nav['url']) ?>" class="hover:text-white transition">
                                <?= htmlspecialchars($nav['label']) ?> <?= htmlspecialchars($nav['badge']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-bold text-white mb-3">Pusat Layanan</h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="#mvc-architecture" class="hover:text-white transition">Arsitektur MVC Pertemuan 7</a></li>
                    <li><a href="#program-prioritas" class="hover:text-white transition">Program Prioritas Kostum</a></li>
                    <li><a href="#alur-escrow" class="hover:text-white transition">Sistem Escrow Otomatis</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-bold text-white mb-3">Kontak &amp; Komunitas</h4>
                <address class="not-italic text-xs space-y-2">
                    <p>Email: <?= htmlspecialchars($profile['contact']['email']) ?></p>
                    <p>WhatsApp: <?= htmlspecialchars($profile['contact']['whatsapp']) ?></p>
                    <p><?= htmlspecialchars($profile['contact']['community']) ?></p>
                </address>
            </div>
        </div>
    </footer>

    <script src="app.js"></script>
</body>
</html>
