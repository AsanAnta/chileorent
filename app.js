/**
 * CHILEORENT SIMULATION ENGINE (app.js)
 * Mengelola state interaktif, multi-role session, transaksi escrow,
 * filter katalog, kalkulator DP & deposit, serta alur alih fungsi & kurasi admin.
 */

const STORAGE_KEYS = {
    USER_SESSION: 'chileorent_user_session',
    COSTUMES: 'chileorent_costumes',
    RENTALS: 'chileorent_rentals',
    REPURPOSING: 'chileorent_repurposing',
    ESCROW: 'chileorent_escrow',
    OWNER_LIQUIDATION: 'chileorent_owner_liquidation'
};

// DATA AWAL (SEED DATA REALISTIS)
const INITIAL_DATA = {
    costumes: [
        {
            id: 'c1',
            title: 'Frieren - Beyond Journey\'s End',
            character: 'Frieren',
            series: 'Sousou no Frieren',
            category: 'anime',
            size: 'M',
            gender: 'female',
            price: 120000,
            includes: ['wig', 'prop', 'accessories'],
            grade: 'A',
            rating: 4.9,
            rentCount: 42,
            image: 'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=600&auto=format&fit=crop&q=80',
            description: 'Jubah putih list emas, wig silver styled rapi, tongkat sihir 140cm, anting ruby & telinga elf.',
            owner: 'Kurogane Rental (Toko Kami)'
        },
        {
            id: 'c2',
            title: 'Raiden Shogun (Baal) Archon Uwowo',
            character: 'Raiden Shogun',
            series: 'Genshin Impact',
            category: 'game',
            size: 'S',
            gender: 'female',
            price: 150000,
            includes: ['wig', 'prop', 'accessories', 'shoes'],
            grade: 'A',
            rating: 5.0,
            rentCount: 56,
            image: 'https://images.unsplash.com/photo-1534447677768-be436bb09401?w=600&auto=format&fit=crop&q=80',
            description: 'Kimono ungu gradasi premium, wig kepang panjang, naginata polearm prop, armor bahu emas.',
            owner: 'Kurogane Rental (Toko Kami)'
        },
        {
            id: 'c3',
            title: 'Kafka - Stellaron Hunter Fullset',
            character: 'Kafka',
            series: 'Honkai: Star Rail',
            category: 'game',
            size: 'M',
            gender: 'female',
            price: 140000,
            includes: ['wig', 'shoes', 'accessories'],
            grade: 'A',
            rating: 4.8,
            rentCount: 29,
            image: 'https://images.unsplash.com/photo-1563245372-f21724e3856d?w=600&auto=format&fit=crop&q=80',
            description: 'Coat beludru bordir laba-laba, wig maroon rapi, kacamata hitam retro & boots kulit size 38.',
            owner: 'Sakura Wardrobe (Titip Sewa Mitra)'
        },
        {
            id: 'c4',
            title: 'Satoru Gojo - Jujutsu High Uniform',
            character: 'Satoru Gojo',
            series: 'Jujutsu Kaisen',
            category: 'anime',
            size: 'L',
            gender: 'male',
            price: 110000,
            includes: ['wig', 'accessories'],
            grade: 'B',
            rating: 4.7,
            rentCount: 38,
            image: 'https://images.unsplash.com/photo-1509198397868-475647b2a1e5?w=600&auto=format&fit=crop&q=80',
            description: 'Seragam kancing high collar hitam pekat, wig putih spike, penutup mata kain & kacamata bulat hitam.',
            owner: 'Kurogane Rental (Toko Kami)'
        },
        {
            id: 'c5',
            title: 'Houshou Marine - Ahoy Captain Outfit',
            character: 'Houshou Marine',
            series: 'Hololive Production',
            category: 'vtuber',
            size: 'S',
            gender: 'female',
            price: 135000,
            includes: ['wig', 'accessories', 'shoes'],
            grade: 'A',
            rating: 4.9,
            rentCount: 34,
            image: 'https://images.unsplash.com/photo-1541701494587-cb58502866ab?w=600&auto=format&fit=crop&q=80',
            description: 'Topi bajak laut bordir tengkorak, wig twintail merah maroon, eyepatch hati, dasi pita & boots 37.',
            owner: 'Kurogane Rental (Toko Kami)'
        },
        {
            id: 'c6',
            title: 'Kamen Rider Geats Magnum Boost Form',
            character: 'Kamen Rider Geats',
            series: 'Kamen Rider Geats',
            category: 'tokusatsu',
            size: 'XL',
            gender: 'unisex',
            price: 250000,
            includes: ['prop', 'accessories', 'shoes'],
            grade: 'A',
            rating: 5.0,
            rentCount: 19,
            image: 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=600&auto=format&fit=crop&q=80',
            description: 'Armor dada & helm EVA foam lapis resin cat airbrush glossy, belt desire driver bersuara & magnum shooter 40X.',
            owner: 'Toko Toku Bandung (Mitra Akuisisi)'
        }
    ],

    rentals: [
        {
            id: 'BK-2026-081',
            costumeTitle: 'Frieren (Size M)',
            renterName: 'Alisa Putri',
            renterPhone: '0812-3456-7890',
            startDate: '2026-09-24',
            duration: 3,
            endDate: '2026-09-27',
            scheme: 'Lunas 100%',
            dpAmount: 0,
            totalPaid: 240000,
            depositAmount: 100000,
            depositStatus: 'Tertahan di Escrow (Refund Saat Barang Tiba)',
            itemStatus: 'Sedang Dipakai',
            courier: 'JNE Express',
            trackingNumber: 'JNE-882910481'
        },
        {
            id: 'BK-2026-094',
            costumeTitle: 'Raiden Shogun (Size S)',
            renterName: 'Alisa Putri',
            renterPhone: '0812-3456-7890',
            startDate: '2026-10-10',
            duration: 3,
            endDate: '2026-10-12',
            scheme: 'DP 30% Kunci Tanggal',
            dpAmount: 42000,
            totalPaid: 42000,
            remainingBill: 98000,
            depositAmount: 0,
            depositStatus: 'Bebas Deposit (Akun Terverifikasi)',
            itemStatus: 'Booking Terkunci',
            courier: 'SiCepat Halu',
            trackingNumber: 'Menunggu Pengiriman H-1'
        }
    ],

    repurposing: [
        {
            id: 'AF-2026-012',
            ownerName: 'Sakura Wardrobe (Eks Rental Bandung)',
            ownerCategory: 'Pemilik Usaha Rental Tutup',
            character: 'Raiden Shogun Uwowo',
            series: 'Genshin Impact',
            scheme: 'akuisisi_chileorent',
            schemeLabel: 'Akuisisi Langsung oleh Chileorent',
            basePrice: 1200000,
            negoTolerance: 8,
            minPrice: 1104000,
            submittedGrade: 'A',
            adminGrade: 'Grade A (95%)',
            status: 'Disetujui Chileorent',
            escrowStatus: 'Dana Ditransfer ke Rekening Penjual',
            date: '2026-09-28'
        },
        {
            id: 'AF-2026-018',
            ownerName: 'Sakura Wardrobe (Eks Rental Bandung)',
            ownerCategory: 'Pemilik Usaha Rental Tutup',
            character: 'Kafka Honkai Star Rail',
            series: 'Honkai: Star Rail',
            scheme: 'titip_sewa',
            schemeLabel: 'Titip Sewa (Bagi Hasil 70:30)',
            basePrice: 150000,
            negoTolerance: 4,
            minPrice: 144000,
            submittedGrade: 'A',
            adminGrade: 'Menunggu Kurasi Fisik Admin',
            status: 'Proses Verifikasi Fisik',
            escrowStatus: 'Menunggu Review Admin',
            date: '2026-09-29'
        }
    ],

    ownerLiquidation: [
        {
            id: 'OWN-KST-03',
            costumeTitle: 'Zhongli Archon Costume (Size L)',
            source: 'Inventaris Rental Utama Kami (Butuh Dana Kas Cepat)',
            condition: 'Grade A (95%) Fullset + Senjata Tombak',
            directPrice: 1450000,
            negoTolerance: 8,
            floorPrice: 1334000,
            buyerBid: 1380000,
            status: 'Ditawar Calon Pembeli (Nego Masuk)'
        },
        {
            id: 'OWN-KST-07',
            costumeTitle: 'Diluc Red Dead of Night Skin (Size M)',
            source: 'Inventaris Rental Utama Kami (Butuh Dana Kas Cepat)',
            condition: 'Grade B (Minus kancing jaket telah diganti baru)',
            directPrice: 950000,
            negoTolerance: 5,
            floorPrice: 902500,
            buyerBid: 0,
            status: 'Aktif Dijual Putus'
        }
    ],

    escrowTransactions: [
        {
            id: 'ESC-8841',
            type: 'Sewa Kostum',
            renter: 'Alisa Putri',
            owner: 'Kurogane Rental (Toko Kami)',
            amount: 240000,
            depositPart: 100000,
            status: 'Menunggu Approval Admin',
            itemState: 'Barang Kembali Aman'
        },
        {
            id: 'ESC-8849',
            type: 'Akuisisi Alih Fungsi',
            renter: 'Pihak Chileorent',
            owner: 'Sakura Wardrobe',
            amount: 1104000,
            depositPart: 0,
            status: 'Selesai Dicairkan',
            itemState: 'Barang Diterima Gudang'
        }
    ]
};

// INISIALISASI DATA LOCALSTORAGE
function initChileorentData() {
    if (!localStorage.getItem(STORAGE_KEYS.COSTUMES)) {
        localStorage.setItem(STORAGE_KEYS.COSTUMES, JSON.stringify(INITIAL_DATA.costumes));
    }
    if (!localStorage.getItem(STORAGE_KEYS.RENTALS)) {
        localStorage.setItem(STORAGE_KEYS.RENTALS, JSON.stringify(INITIAL_DATA.rentals));
    }
    if (!localStorage.getItem(STORAGE_KEYS.REPURPOSING)) {
        localStorage.setItem(STORAGE_KEYS.REPURPOSING, JSON.stringify(INITIAL_DATA.repurposing));
    }
    if (!localStorage.getItem(STORAGE_KEYS.ESCROW)) {
        localStorage.setItem(STORAGE_KEYS.ESCROW, JSON.stringify(INITIAL_DATA.escrowTransactions));
    }
    if (!localStorage.getItem(STORAGE_KEYS.OWNER_LIQUIDATION)) {
        localStorage.setItem(STORAGE_KEYS.OWNER_LIQUIDATION, JSON.stringify(INITIAL_DATA.ownerLiquidation));
    }
    if (!localStorage.getItem(STORAGE_KEYS.USER_SESSION)) {
        // Default awal: Tamu / Pengunjung (belum masuk)
        localStorage.setItem(STORAGE_KEYS.USER_SESSION, JSON.stringify({
            role: 'guest',
            name: null
        }));
    }
}

// GETTERS & SETTERS
const ChileoDB = {
    getUserSession: () => JSON.parse(localStorage.getItem(STORAGE_KEYS.USER_SESSION) || '{"role":"guest"}'),
    setUserSession: (session) => {
        localStorage.setItem(STORAGE_KEYS.USER_SESSION, JSON.stringify(session));
        if (typeof ChileoUI !== 'undefined' && ChileoUI.syncNavbar) {
            ChileoUI.syncNavbar();
        }
    },
    logout: () => {
        localStorage.setItem(STORAGE_KEYS.USER_SESSION, JSON.stringify({
            role: 'guest',
            name: null
        }));
        window.location.href = 'index.html';
    },
    
    getCostumes: () => JSON.parse(localStorage.getItem(STORAGE_KEYS.COSTUMES) || '[]'),
    getRentals: () => JSON.parse(localStorage.getItem(STORAGE_KEYS.RENTALS) || '[]'),
    addRental: (rental) => {
        const rentals = ChileoDB.getRentals();
        rentals.unshift(rental);
        localStorage.setItem(STORAGE_KEYS.RENTALS, JSON.stringify(rentals));

        // Tambah juga ke Escrow
        const escrows = ChileoDB.getEscrow();
        escrows.unshift({
            id: 'ESC-' + Math.floor(1000 + Math.random() * 9000),
            type: 'Sewa Kostum',
            renter: rental.renterName,
            owner: 'Kurogane Rental (Toko Kami)',
            amount: rental.totalPaid,
            depositPart: rental.depositAmount,
            status: 'Menunggu Approval Admin',
            itemState: 'Kostum Siap Kirim'
        });
        localStorage.setItem(STORAGE_KEYS.ESCROW, JSON.stringify(escrows));
    },

    getRepurposing: () => JSON.parse(localStorage.getItem(STORAGE_KEYS.REPURPOSING) || '[]'),
    addRepurposing: (item) => {
        const list = ChileoDB.getRepurposing();
        list.unshift(item);
        localStorage.setItem(STORAGE_KEYS.REPURPOSING, JSON.stringify(list));
    },
    updateRepurposingGrade: (id, grade, status) => {
        const list = ChileoDB.getRepurposing();
        const found = list.find(x => x.id === id);
        if (found) {
            found.adminGrade = grade;
            if (status) found.status = status;
            localStorage.setItem(STORAGE_KEYS.REPURPOSING, JSON.stringify(list));
        }
    },

    getEscrow: () => JSON.parse(localStorage.getItem(STORAGE_KEYS.ESCROW) || '[]'),
    releaseEscrow: (id) => {
        const list = ChileoDB.getEscrow();
        const found = list.find(x => x.id === id);
        if (found) {
            found.status = 'Dana Dilepas & Refund Selesai';
            localStorage.setItem(STORAGE_KEYS.ESCROW, JSON.stringify(list));
        }
    },

    getOwnerLiquidation: () => JSON.parse(localStorage.getItem(STORAGE_KEYS.OWNER_LIQUIDATION) || '[]'),
    addOwnerLiquidation: (item) => {
        const list = ChileoDB.getOwnerLiquidation();
        list.unshift(item);
        localStorage.setItem(STORAGE_KEYS.OWNER_LIQUIDATION, JSON.stringify(list));
    }
};

// =========================================================================
// PERTEMUAN 4: TASK 01 - CONNECT TO API (FETCH API & REST DATA INTEGRATION)
// Sesuai alur materi: Web Page -> JavaScript -> Fetch API -> REST API -> JSON
// =========================================================================
const ChileoAPI = {
    ENDPOINT: 'data/costumes.json',
    ALT_ENDPOINT: 'api/costumes.json',
    lastResponse: null,
    lastFetchedAt: null,

    /**
     * Mengambil data kostum dari REST API endpoint menggunakan Fetch API
     * Menggunakan Promise .then() sesuai persis dengan sintaks materi kuliah Pertemuan 4
     * 
     * fetch('data/costumes.json')
     *   .then(res => res.json())
     *   .then(data => { // proses data })
     */
    fetchCostumes: function(onSuccess, onError) {
        const startTime = performance.now();
        console.log(`[ChileoAPI] Mengirim GET request ke: ${this.ENDPOINT}`);

        return fetch(this.ENDPOINT)
            .then(res => {
                if (!res.ok) {
                    throw new Error(`HTTP Error: Status ${res.status} (${res.statusText})`);
                }
                return res.json();
            })
            .then(data => {
                const duration = Math.round(performance.now() - startTime);
                console.log(`[ChileoAPI] REST API berhasil merespons dalam ${duration}ms:`, data);
                
                // Normalisasi dwibahasa: mendukung struktur bahasa Indonesia sesuai slide maupun camelCase
                const normalized = data.map(item => ({
                    ...item,
                    title: item.title || item.judul,
                    character: item.character || item.karakter,
                    series: item.series || item.seri,
                    category: item.category || item.kategori,
                    size: item.size || item.ukuran,
                    price: item.price || item.harga,
                    includes: item.includes || item.kelengkapan || [],
                    image: item.image || item.gambar,
                    description: item.description || item.deskripsi,
                    owner: item.owner || item.pemilik,
                    rentCount: item.rentCount || item.jumlah_sewa || 0
                }));

                ChileoAPI.lastResponse = normalized;
                ChileoAPI.lastFetchedAt = new Date();

                // Sinkronkan ke local storage agar kompatibel dengan modul transaksi lainnya
                localStorage.setItem(STORAGE_KEYS.COSTUMES, JSON.stringify(normalized));

                if (typeof onSuccess === 'function') {
                    onSuccess(normalized, {
                        source: 'REST API (Fetch)',
                        endpoint: this.ENDPOINT,
                        duration: duration,
                        timestamp: ChileoAPI.lastFetchedAt,
                        status: 200,
                        count: normalized.length
                    });
                }
                return normalized;
            })
            .catch(err => {
                console.warn('[ChileoAPI] Fetch API dialihkan ke fallback lokal (misal jika dibuka langsung lewat file:// browser tanpa web server):', err);
                const cachedData = ChileoDB.getCostumes();
                
                if (typeof onError === 'function') {
                    onError(cachedData, {
                        source: 'LocalStorage Fallback (CORS/Offline)',
                        error: err.message,
                        endpoint: this.ENDPOINT,
                        count: cachedData.length
                    });
                } else if (typeof onSuccess === 'function') {
                    onSuccess(cachedData, {
                        source: 'LocalStorage Fallback',
                        error: err.message,
                        endpoint: this.ENDPOINT,
                        count: cachedData.length
                    });
                }
                return cachedData;
            });
    },

    /**
     * Mengambil detail kostum tunggal berdasarkan ID via API
     */
    getCostumeById: function(id, callback) {
        return this.fetchCostumes(data => {
            const costume = data.find(c => String(c.id) === String(id)) || data[0];
            if (typeof callback === 'function') callback(costume);
        });
    }
};

// UI SYNCHRONIZER: MENYESUAIKAN NAVBAR SESUAI TIPE PERAN PENDAFTAR / LOGIN
const ChileoUI = {
    syncNavbar: function() {
        const session = ChileoDB.getUserSession();
        const role = (session && session.role) ? session.role : 'guest';

        // 1. Sinkronkan link "Dashboard Rental" di navbar utama
        const navLinks = document.querySelectorAll('nav a, header a');
        navLinks.forEach(link => {
            const href = link.getAttribute('href') || '';
            const text = link.textContent.trim();

            if (href.includes('dashboard-rental.html') || 
                text === 'Dashboard Rental' || 
                text === 'Dashboard Perental' || 
                text === 'Dashboard Penjual' || 
                text === 'Dashboard Pengelola') {
                
                if (role === 'customer' || role === 'renter' || role === 'seller') {
                    link.textContent = 'Dashboard Customer';
                    link.setAttribute('href', 'dashboard-rental.html');
                    link.setAttribute('title', 'Dashboard Customer (Lacak Sewa, Resi & Alih Fungsi Kostum)');
                } else if (role === 'admin' || role === 'owner_admin') {
                    link.textContent = 'Dashboard Pengelola';
                    link.setAttribute('href', 'dashboard-rental.html#view-owner-luas');
                    link.setAttribute('title', 'Dashboard Pemilik Usaha Rental & Admin');
                } else {
                    link.textContent = 'Dashboard Rental';
                    link.setAttribute('href', 'dashboard-rental.html');
                }
            }
        });

        // Sembunyikan navigasi publik (Beranda, Katalog, Alih Fungsi) dan breadcrumb jika login sebagai admin
        if (role === 'admin' || role === 'owner_admin') {
            const adminHiddenNavs = document.querySelectorAll('header nav a[href*="index.html"], header nav a[href*="catalog.html"], header nav a[href*="alih-fungsi.html"]');
            adminHiddenNavs.forEach(link => {
                const li = link.closest('li');
                if (li) li.style.display = 'none';
                else link.style.display = 'none';
            });

            // Sembunyikan breadcrumb path jika admin
            const breadcrumbNavs = document.querySelectorAll('.breadcrumb-nav');
            breadcrumbNavs.forEach(b => {
                b.style.display = 'none';
            });

            // Arahkan logo brand Chileorent ke dashboard admin
            const logoLink = document.querySelector('header a[href*="index.html"]');
            if (logoLink) {
                logoLink.setAttribute('href', 'dashboard-rental.html#view-owner-luas');
            }
        } else {
            // Tampilkan kembali semua menu (4 menu) dan breadcrumb untuk customer atau tamu
            const navItems = document.querySelectorAll('header nav a[href*="index.html"], header nav a[href*="catalog.html"], header nav a[href*="alih-fungsi.html"]');
            navItems.forEach(link => {
                const li = link.closest('li');
                if (li) li.style.display = '';
                else link.style.display = '';
            });

            const breadcrumbNavs = document.querySelectorAll('.breadcrumb-nav');
            breadcrumbNavs.forEach(b => {
                b.style.display = '';
            });

            const logoLink = document.querySelector('header a[href*="dashboard-rental.html#view-owner-luas"]');
            if (logoLink) {
                logoLink.setAttribute('href', 'index.html');
            }
        }

        // 2. Sinkronkan tombol Auth Header Desktop & Mobile Dropdown
        const headerActions = document.getElementById('desktop-auth-actions') || 
                              document.querySelector('.header-auth-actions') ||
                              document.querySelector('header .flex.items-center.gap-2.order-2') ||
                              document.querySelector('header .flex.items-center.gap-2:not(#navigasi-utama)');

        const mobileCompactBadge = document.getElementById('mobile-compact-badge');
        const mobileAuthActions = document.getElementById('mobile-auth-actions');

        if (role && role !== 'guest' && session.name) {
            let roleLabel = 'Customer';
            let roleColor = 'bg-emerald-50 text-emerald-800 border-emerald-300';
            if (role === 'admin' || role === 'owner_admin') {
                roleLabel = 'Admin';
                roleColor = 'bg-amber-50 text-amber-800 border-amber-300';
            }

            // Desktop Auth
            if (headerActions) {
                const loginLink = headerActions.querySelector('a[href*="login.html"]');
                const registerLink = headerActions.querySelector('a[href*="register.html"]');
                if (loginLink) loginLink.style.display = 'none';
                if (registerLink) registerLink.style.display = 'none';

                let userBox = headerActions.querySelector('.chileo-auth-box');
                if (!userBox) {
                    userBox = document.createElement('div');
                    userBox.className = 'chileo-auth-box flex items-center gap-2 flex-nowrap shrink-0';
                    headerActions.insertBefore(userBox, headerActions.firstChild);
                }

                userBox.innerHTML = `
                    <span class="px-2.5 py-1 text-xs font-medium border rounded-lg ${roleColor} flex items-center gap-1.5 shadow-sm whitespace-nowrap">
                        <span>👤</span>
                        <strong class="max-w-[120px] truncate sm:max-w-none">${session.name}</strong>
                        <span class="text-[10px] font-bold uppercase opacity-75">(${roleLabel})</span>
                    </span>
                    <button type="button" onclick="ChileoDB.logout()" class="px-2.5 py-1.5 text-xs font-semibold text-red-700 bg-red-50 hover:bg-red-100 border border-red-200 rounded-lg transition whitespace-nowrap">
                        Keluar
                    </button>
                `;
            }

            // Mobile Compact Badge (di baris atas samping hamburger)
            if (mobileCompactBadge) {
                mobileCompactBadge.innerHTML = `
                    <span class="px-2 py-1 text-[11px] font-semibold border rounded-lg ${roleColor} flex items-center gap-1 shadow-sm max-w-[130px] truncate">
                        <span>👤</span>
                        <span class="truncate">${session.name.split(' ')[0]}</span>
                    </span>
                `;
            }

            // Mobile Auth Actions (di dalam dropdown)
            if (mobileAuthActions) {
                mobileAuthActions.innerHTML = `
                    <div class="p-3 bg-gray-50 border border-gray-200 rounded-xl space-y-2">
                        <div class="flex items-center justify-between gap-2">
                            <div class="flex items-center gap-2 truncate">
                                <span class="text-base">👤</span>
                                <div class="truncate">
                                    <strong class="text-xs text-gray-900 block truncate">${session.name}</strong>
                                    <span class="text-[10px] text-gray-500 truncate block">${session.email || 'Akun Aktif'}</span>
                                </div>
                            </div>
                            <span class="px-2 py-0.5 text-[10px] font-bold rounded-full ${roleColor} flex-shrink-0">${roleLabel}</span>
                        </div>
                        <button type="button" onclick="ChileoDB.logout()" class="w-full py-2 text-xs font-bold text-red-600 bg-red-50 hover:bg-red-100 border border-red-200 rounded-lg transition text-center">
                            Keluar dari Akun
                        </button>
                    </div>
                `;
            }
        } else {
            // Mode Tamu / Guest
            if (headerActions) {
                const loginLink = headerActions.querySelector('a[href*="login.html"]');
                const registerLink = headerActions.querySelector('a[href*="register.html"]');
                if (loginLink) loginLink.style.display = '';
                if (registerLink) registerLink.style.display = '';
                const userBox = headerActions.querySelector('.chileo-auth-box');
                if (userBox) userBox.remove();
            }

            if (mobileCompactBadge) {
                mobileCompactBadge.innerHTML = '';
            }

            if (mobileAuthActions) {
                mobileAuthActions.innerHTML = `
                    <div class="grid grid-cols-2 gap-2 text-center text-xs font-semibold">
                        <a href="login.html" class="py-2.5 px-3 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 transition">Masuk</a>
                        <a href="register.html" class="py-2.5 px-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-sm transition">Daftar Akun</a>
                    </div>
                `;
            }
        }

        // 3. Inisialisasi Hamburger Menu & Dropdown Mobile
        this.initMobileMenu();
    },

    /**
     * Inisialisasi Tombol Hamburger & Dropdown Menu Navigasi Mobile
     */
    initMobileMenu: function() {
        const toggleBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-dropdown-menu');
        if (!toggleBtn || !mobileMenu) return;

        if (toggleBtn.dataset.listenerAttached === 'true') return;
        toggleBtn.dataset.listenerAttached = 'true';

        const iconOpen = document.getElementById('hamburger-icon-open') || toggleBtn.querySelector('.icon-hamburger');
        const iconClose = document.getElementById('hamburger-icon-close') || toggleBtn.querySelector('.icon-close');

        function openMenu() {
            mobileMenu.classList.remove('hidden');
            if (iconOpen) iconOpen.classList.add('hidden');
            if (iconClose) iconClose.classList.remove('hidden');
            toggleBtn.setAttribute('aria-expanded', 'true');
        }

        function closeMenu() {
            mobileMenu.classList.add('hidden');
            if (iconOpen) iconOpen.classList.remove('hidden');
            if (iconClose) iconClose.classList.add('hidden');
            toggleBtn.setAttribute('aria-expanded', 'false');
        }

        function toggleMenu() {
            const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';
            if (isExpanded) {
                closeMenu();
            } else {
                openMenu();
            }
        }

        toggleBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleMenu();
        });

        // Tutup saat link atau tombol di dalam menu mobile diklik (menggunakan event delegation)
        mobileMenu.addEventListener('click', (e) => {
            if (e.target.closest('a, button')) {
                closeMenu();
            }
        });

        // Tutup saat klik di luar header
        document.addEventListener('click', (e) => {
            const header = document.querySelector('header');
            if (header && !header.contains(e.target)) {
                closeMenu();
            }
        });

        // Tutup dengan tombol Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeMenu();
            }
        });

        // Tutup saat layar di-resize ke ukuran desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                closeMenu();
            }
        });
    },

    initMobileNavbar: function() {
        this.initMobileMenu();
    }
};

// AUTO-RUN ON PAGE LOAD
initChileorentData();

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        ChileoUI.syncNavbar();
        ChileoUI.initMobileMenu();
    });
} else {
    ChileoUI.syncNavbar();
    ChileoUI.initMobileMenu();
}

// HELPER: Format Rupiah
function formatRupiah(number) {
    return 'Rp ' + Number(number).toLocaleString('id-ID');
}
