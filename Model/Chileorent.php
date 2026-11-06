<?php
/**
 * ==============================================================================
 * PERTEMUAN 7: WEB PROGRAMMING - MVC ARCHITECTURE
 * TASK 01 & TASK 03: MODEL (Model/Chileorent.php)
 * ==============================================================================
 * Tema: Chileorent - Marketplace Sewa & Solusi Alih Fungsi Kostum Cosplay
 *
 * Tanggung Jawab Model:
 * - Menyimpan dan mengelola data inti (Properties) platform Chileorent.
 * - Mengelola data Program Prioritas Kostum Cosplay, 6 Pilar, Alur Escrow, FAQ, & Profil.
 * - Menyediakan method manipulasi data (Behavior) untuk Controller.
 * ==============================================================================
 */

class Chileorent
{
    // Property Data (Sesuai Konsep Model: Pengelola Data)
    public string $name;
    public string $period;
    public string $tagline;
    public array $profile;
    public array $programs;
    public array $pillars;
    public array $escrowSteps;
    public array $faqs;

    /**
     * Constructor: Inisialisasi Data Model
     */
    public function __construct()
    {
        $this->name    = "Chileorent";
        $this->period  = "2024 - " . date('Y');
        $this->tagline = "Marketplace Sewa & Solusi Alih Fungsi Kostum Cosplay Terpercaya";

        // Profil & Identitas Platform
        $this->profile = [
            'name'               => $this->name,
            'period'             => $this->period,
            'tagline'            => $this->tagline,
            'founder_role'       => 'Ekosistem Komunitas Cosplay & Manajemen Rental Terpadu',
            'badge_hero'         => 'Solusi Komunitas Cosplay & Rental • PHP MVC Architecture',
            'slogan_hero'        => 'Temukan Kostum Impianmu atau Putar Kembali Aset Kostum yang Menumpuk',
            'description'        => 'Kesulitan mencari sewa kostum cosplay yang cepat dan aman? Atau Anda pemilik rental yang sedang tutup toko serta cosplayer yang lelah menunggu pembeli? Chileorent menghadirkan ekosistem sewa terverifikasi, perlindungan rekening bersama (escrow), serta alur alih fungsi kostum dengan sistem tawar-menawar fleksibel 0% hingga 8%.',
            'hero_image'         => 'https://placehold.co/600x400/2b2d42/ffffff?text=Chileorent+Cosplay+Marketplace',
            'hero_caption'       => 'Solusi marketplace sewa terverifikasi, konsinyasi titip sewa, dan akuisisi alih fungsi kostum cosplay.',
            'section_ssr_label'  => 'Program Prioritas • Managed by MVC Model',
            'section_ssr_title'  => 'Program Prioritas Kostum Cosplay Siap Sewa',
            'section_ssr_desc'   => 'Konten di bawah ini diolah oleh Model (Model/Chileorent.php), dikendalikan oleh Controller (Controller/ChileorentController.php), dan ditampilkan oleh View (View/chileorent-page.php) melalui alur MVC.',
            'academic_info'      => [
                'course'  => 'Web Programming',
                'session' => 'Pertemuan 7 - Model View Controller (MVC)',
                'tasks'   => 'Task 01: Design MVC Structure • Task 02: Build the Controller • Task 03: Connect Model, Controller & View'
            ],
            'contact'            => [
                'email'     => 'bantuan@chileorent.com',
                'whatsapp'  => '+62 812-3456-7890',
                'community' => 'Komunitas Cosplay Indonesia',
                'year'      => date('Y')
            ],
            'highlights'         => [
                ['value' => '100% Aman',     'label' => 'Sistem Escrow Otomatis'],
                ['value' => '0% - 8%',       'label' => 'Batas Nego Fleksibel Terkendali'],
                ['value' => 'Terverifikasi', 'label' => 'Quality Control & Standarisasi Grade'],
                ['value' => 'Anti-Nimbun',   'label' => 'Reuse & Monetize Kostum Eks-Rental']
            ],
            'navigation'         => [
                ['label' => 'Beranda (MVC)',      'url' => 'index.php',             'active' => true,  'badge' => 'MVC'],
                ['label' => 'Katalog Sewa',       'url' => 'catalog.html',          'active' => false, 'badge' => ''],
                ['label' => 'Alih Fungsi Kostum', 'url' => 'alih-fungsi.html',      'active' => false, 'badge' => '(Nego 0-8%)'],
                ['label' => 'Dashboard Rental',   'url' => 'dashboard-rental.html', 'active' => false, 'badge' => '']
            ]
        ];

        // Data Program Prioritas Kostum Cosplay (8 Kostum)
        $this->programs = [
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

        // 6 Pilar Fitur Utama
        $this->pillars = [
            [
                'icon'        => '🎭',
                'title'       => '1. Marketplace Sewa Kostum Cosplay',
                'description' => 'Katalog lengkap dari anime, game, VTuber, hingga serial favorit. Dilengkapi kalender ketersediaan jadwal, pilihan ukuran akurat, dan rincian kelengkapan (wig, props, aksesoris).',
                'link_text'   => 'Jelajahi Katalog',
                'link_url'    => 'catalog.html'
            ],
            [
                'icon'        => '🤝',
                'title'       => '2. Sistem Nego Fleksibel (Pilihan 0% - 8%)',
                'description' => 'Fitur tawar-menawar harga pada proses alih fungsi kostum. Pemilik bebas memilih mengaktifkan opsi nego dengan rentang toleransi 0% hingga maksimal 8% agar nilai aset tetap terlindungi.',
                'link_text'   => 'Pelajari Sistem Nego',
                'link_url'    => 'alih-fungsi.html#fitur-nego'
            ],
            [
                'icon'        => '🛡️',
                'title'       => '3. Sistem Escrow & Fitur DP Booking',
                'description' => 'Uang sewa, opsi DP (30%/50% untuk kunci tanggal acara), serta deposit jaminan (opsional khusus pertama kali rental) ditampung secara aman oleh sistem Escrow hingga kostum diterima dengan baik.',
                'link_text'   => 'Cara Kerja Escrow & DP',
                'link_url'    => '#alur-escrow'
            ],
            [
                'icon'        => '🔄',
                'title'       => '4. Sistem Alur Alih Fungsi Produk',
                'description' => 'Solusi bagi pemilik rental yang menutup usahanya atau cosplayer yang ingin kostumnya bermanfaat: Titip Sewa (Konsinyasi bagi hasil) atau Akuisisi Langsung oleh Chileorent dengan batas nego 0-8%.',
                'link_text'   => 'Form Alih Fungsi',
                'link_url'    => 'alih-fungsi.html'
            ],
            [
                'icon'        => '✅',
                'title'       => '5. Pusat Verifikasi & Jaminan Keamanan',
                'description' => 'Standarisasi kondisi kostum (Grade A, B, atau C) melalui kurasi transparan. Dilengkapi verifikasi identitas (KYC) pengguna dan perlindungan deposit terhadap risiko kerusakan.',
                'link_text'   => 'Standar Verifikasi',
                'link_url'    => '#pusat-verifikasi'
            ],
            [
                'icon'        => '📊',
                'title'       => '6. Sistem Manajemen Rental Pintar',
                'description' => 'Dashboard terpadu bagi pemilik rental dan mitra kostum: lacak jadwal sewa, status pengiriman dan pengembalian, log pencucian/laundry, hingga pencairan pendapatan.',
                'link_text'   => 'Buka Dashboard',
                'link_url'    => 'dashboard-rental.html'
            ]
        ];

        // 4 Langkah Escrow
        $this->escrowSteps = [
            [
                'step'        => 'Langkah 1',
                'title'       => 'Pemesanan & Pembayaran',
                'description' => 'Penyewa / pembeli membayar biaya transaksi beserta deposit jaminan ke rekening bersama otomatis Chileorent.'
            ],
            [
                'step'        => 'Langkah 2',
                'title'       => 'Verifikasi & Pengiriman',
                'description' => 'Pemilik mengirimkan kostum sesuai deskripsi. Resi pengiriman dicatat dan dilacak oleh sistem.'
            ],
            [
                'step'        => 'Langkah 3',
                'title'       => 'Penerimaan & Pengecekan',
                'description' => 'Penyewa menerima kostum dan melakukan unboxing untuk memverifikasi kesesuaian kondisi serta kelengkapan fisik.'
            ],
            [
                'step'        => 'Langkah 4',
                'title'       => 'Pelepasan Dana & Refund',
                'description' => 'Setelah periode sewa usai dan kostum kembali dengan selamat, dana sewa diteruskan ke pemilik dan deposit jaminan langsung dikembalikan ke penyewa.'
            ]
        ];

        // FAQs
        $this->faqs = [
            [
                'question' => 'Apa itu platform Chileorent?',
                'answer'   => 'Chileorent adalah platform marketplace sewa kostum cosplay sekaligus penyedia solusi alih fungsi (jual/titip sewa/akuisisi) untuk kostum dari para pemilik usaha rental yang menutup tokonya atau cosplayer yang ingin memutar aset kostumnya.'
            ],
            [
                'question' => 'Bagaimana aturan fitur Nego Fleksibel (0% - 8%) pada Alih Fungsi?',
                'answer'   => 'Pemilik kostum dapat memilih apakah kostumnya bisa ditawar atau berharga pas (0%). Jika diaktifkan, pemilik dapat menetapkan batas toleransi tawar maksimal 8%. Sistem akan menolak penawaran yang melebihi batas 8% untuk melindungi nilai barang pemilik.'
            ],
            [
                'question' => 'Bagaimana ketentuan uang jaminan (deposit)? Apakah wajib?',
                'answer'   => 'Uang jaminan bersifat opsional dan hanya ditujukan bagi penyewa yang baru pertama kali merental kostum di platform/mitra bersangkutan sebagai jaminan keamanan awal. Jika Anda sudah pernah menyewa sebelumnya atau memiliki akun yang lolos verifikasi reputasi baik di Chileorent, uang jaminan bebas / Rp 0. Uang deposit yang dibayarkan akan dikembalikan 100% setelah kostum selesai disewa tanpa cacat.'
            ],
            [
                'question' => 'Apakah saya bisa memesan sewa kostum dengan sistem DP (Uang Muka)?',
                'answer'   => 'Bisa! Chileorent menyediakan fitur DP Booking (30% atau 50%) untuk mengunci tanggal kostum agar tidak diambil oleh cosplayer lain untuk event tersebut. Sisa pembayaran sewa dapat dilunasi H-2 sebelum tanggal pengiriman.'
            ],
            [
                'question' => 'Saya punya rental kostum yang mau tutup, bagaimana cara Chileorent membantu?',
                'answer'   => 'Anda dapat memilih skema Akuisisi Borongan oleh Chileorent melalui halaman Alih Fungsi. Tim kami akan mendata seluruh katalog kostum Anda dan memberikan penawaran borongan agar Anda tidak perlu menunggu pembeli satu per satu.'
            ]
        ];
    }

    // ==========================================================================
    // GETTER METHODS (MODEL BEHAVIOR)
    // ==========================================================================

    public function getName(): string
    {
        return $this->name;
    }

    public function getPeriod(): string
    {
        return $this->period;
    }

    public function getTagline(): string
    {
        return $this->tagline;
    }

    public function getProfile(): array
    {
        return $this->profile;
    }

    public function getPrograms(?string $keyword = null, ?string $status = null): array
    {
        if (empty($keyword) && empty($status)) {
            return $this->programs;
        }

        return array_values(array_filter($this->programs, function ($item) use ($keyword, $status) {
            $matchKey = true;
            $matchStatus = true;

            if (!empty($keyword)) {
                $kw = strtolower($keyword);
                $matchKey = str_contains(strtolower($item['judul']), $kw) ||
                            str_contains(strtolower($item['karakter']), $kw) ||
                            str_contains(strtolower($item['seri']), $kw) ||
                            str_contains(strtolower($item['kategori']), $kw);
            }

            if (!empty($status) && $status !== 'all') {
                $matchStatus = (strtolower($item['status']) === strtolower($status));
            }

            return $matchKey && $matchStatus;
        }));
    }

    public function getProgramById(string $id): ?array
    {
        foreach ($this->programs as $item) {
            if ($item['id'] === $id) {
                return $item;
            }
        }
        return null;
    }

    public function getPillars(): array
    {
        return $this->pillars;
    }

    public function getEscrowSteps(): array
    {
        return $this->escrowSteps;
    }

    public function getFaqs(): array
    {
        return $this->faqs;
    }

    public function getProgramStats(): array
    {
        $stats = [
            'total'      => count($this->programs),
            'siap_sewa'  => 0,
            'terbooking' => 0,
            'perawatan'  => 0
        ];

        foreach ($this->programs as $item) {
            if ($item['status'] === 'Tersedia') {
                $stats['siap_sewa']++;
            } elseif ($item['status'] === 'Disewa' || $item['status'] === 'Booking') {
                $stats['terbooking']++;
            } else {
                $stats['perawatan']++;
            }
        }

        return $stats;
    }

    public function getStatusBadge(string $status): array
    {
        if ($status === 'Tersedia') {
            return [
                'text'        => 'Siap Sewa',
                'badge_class' => 'bg-emerald-100 text-emerald-800 border-emerald-300',
                'dot_class'   => 'bg-emerald-500 animate-pulse',
                'cta_text'    => 'Sewa',
                'cta_class'   => 'bg-indigo-600 hover:bg-indigo-700 text-white'
            ];
        } elseif ($status === 'Booking') {
            return [
                'text'        => 'Dibooking (DP)',
                'badge_class' => 'bg-sky-100 text-sky-800 border-sky-300',
                'dot_class'   => 'bg-sky-500',
                'cta_text'    => 'Cek Jadwal',
                'cta_class'   => 'bg-sky-600 hover:bg-sky-700 text-white'
            ];
        } elseif ($status === 'Disewa') {
            return [
                'text'        => 'Sedang Disewa',
                'badge_class' => 'bg-amber-100 text-amber-800 border-amber-300',
                'dot_class'   => 'bg-amber-500',
                'cta_text'    => 'Antre Sewa',
                'cta_class'   => 'bg-amber-600 hover:bg-amber-700 text-white'
            ];
        }

        return [
            'text'        => 'Dicuci / Perawatan',
            'badge_class' => 'bg-rose-100 text-rose-800 border-rose-300',
            'dot_class'   => 'bg-rose-500',
            'cta_text'    => 'Detail Info',
            'cta_class'   => 'bg-gray-700 hover:bg-gray-800 text-white'
        ];
    }

    public function getGradeBadge(string $grade): array
    {
        if ($grade === 'A') {
            return [
                'text'  => 'Grade A (Sangat Baik)',
                'class' => 'bg-emerald-600 text-white'
            ];
        } elseif ($grade === 'B') {
            return [
                'text'  => 'Grade B (Jahitan Rapi)',
                'class' => 'bg-blue-600 text-white'
            ];
        }

        return [
            'text'  => 'Grade C (Minus Tertulis)',
            'class' => 'bg-amber-600 text-white'
        ];
    }

    public function formatRupiah(int|float $nominal): string
    {
        return "Rp " . number_format($nominal, 0, ',', '.');
    }
}
