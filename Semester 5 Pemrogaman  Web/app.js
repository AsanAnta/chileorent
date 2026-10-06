/**
 * CosVers | RuangCosplay - Interactive Scripts
 * Handles mobile drawer, catalog filter, hero multi-filters, event modal, negotiation modal, and toasts
 */

document.addEventListener('DOMContentLoaded', () => {
  // --- 1. Mobile Drawer Navigation ---
  const mobileHamburgerBtn = document.getElementById('mobileHamburgerBtn');
  const mobileDrawerCloseBtn = document.getElementById('mobileDrawerCloseBtn');
  const mobileNavBackdrop = document.getElementById('mobileNavBackdrop');
  const body = document.body;

  function toggleMobileNav(isOpen) {
    if (isOpen) {
      body.classList.add('mobile-nav-active');
    } else {
      body.classList.remove('mobile-nav-active');
    }
  }

  if (mobileHamburgerBtn) {
    mobileHamburgerBtn.addEventListener('click', () => toggleMobileNav(true));
  }
  if (mobileDrawerCloseBtn) {
    mobileDrawerCloseBtn.addEventListener('click', () => toggleMobileNav(false));
  }
  if (mobileNavBackdrop) {
    mobileNavBackdrop.addEventListener('click', () => toggleMobileNav(false));
  }

  // Close drawer when clicking any drawer link
  document.querySelectorAll('.drawer-link').forEach(link => {
    link.addEventListener('click', () => toggleMobileNav(false));
  });

  // --- 2. Live Search & Hero Multi-Filters ---
  const heroMainSearchInput = document.getElementById('heroMainSearchInput');
  const searchInputDesktop = document.getElementById('searchInputDesktop');
  const filterKota = document.getElementById('filterKota');
  const filterGender = document.getElementById('filterGender');
  const filterKategori = document.getElementById('filterKategori');
  const filterUkuran = document.getElementById('filterUkuran');
  const filterBrand = document.getElementById('filterBrand');
  const filterSeries = document.getElementById('filterSeries');
  const catalogPills = document.querySelectorAll('.catalog-pill');
  const costumeCards = document.querySelectorAll('.costume-card');
  const resultCount = document.getElementById('resultCount');

  let activeCategoryPill = 'all';

  function filterCatalog() {
    let visibleCount = 0;
    const query = (heroMainSearchInput?.value || searchInputDesktop?.value || '').trim().toLowerCase();
    const selectedKota = filterKota?.value || 'all';
    const selectedGender = filterGender?.value || 'all';
    const selectedKategori = filterKategori?.value || 'all';
    const selectedUkuran = filterUkuran?.value || 'all';
    const selectedSeries = filterSeries?.value || 'all';

    costumeCards.forEach(card => {
      const cardCategory = card.getAttribute('data-category') || '';
      const cardCity = (card.getAttribute('data-city') || '').toLowerCase();
      const cardGender = card.getAttribute('data-gender') || '';
      const cardSize = (card.getAttribute('data-size') || '').toLowerCase();
      const cardSeriesAttr = card.getAttribute('data-series') || '';

      const cardTitle = (card.querySelector('.card-title')?.textContent || '').toLowerCase();
      const cardSeriesText = (card.querySelector('.card-series')?.textContent || '').toLowerCase();
      const cardLocationText = (card.querySelector('.card-location')?.textContent || '').toLowerCase();

      // Check Pill Category Filter
      const matchesPillCategory = (activeCategoryPill === 'all' || cardCategory === activeCategoryPill);

      // Check Dropdown Filters
      const matchesKota = (selectedKota === 'all' || cardCity.includes(selectedKota));
      const matchesGender = (selectedGender === 'all' || cardGender === selectedGender);
      const matchesKategori = (selectedKategori === 'all' || cardCategory === selectedKategori);
      const matchesUkuran = (selectedUkuran === 'all' || cardSize === selectedUkuran);
      const matchesSeries = (selectedSeries === 'all' || cardSeriesAttr === selectedSeries || cardSeriesText.includes(selectedSeries));

      // Check Text Query
      const matchesSearch = query === '' || 
                            cardTitle.includes(query) || 
                            cardSeriesText.includes(query) || 
                            cardLocationText.includes(query);

      if (matchesPillCategory && matchesKota && matchesGender && matchesKategori && matchesUkuran && matchesSeries && matchesSearch) {
        card.style.display = 'flex';
        visibleCount++;
      } else {
        card.style.display = 'none';
      }
    });

    if (resultCount) {
      resultCount.textContent = `${visibleCount} Kostum Siap Sewa`;
    }
  }

  // Bind Hero Search & Desktop Search Sync
  function bindSearchInput(input) {
    if (!input) return;
    input.addEventListener('input', (e) => {
      const val = e.target.value;
      if (input === heroMainSearchInput && searchInputDesktop) {
        searchInputDesktop.value = val;
      } else if (input === searchInputDesktop && heroMainSearchInput) {
        heroMainSearchInput.value = val;
      }
      filterCatalog();
    });
  }

  bindSearchInput(heroMainSearchInput);
  bindSearchInput(searchInputDesktop);

  // Bind dropdown filters
  [filterKota, filterGender, filterKategori, filterUkuran, filterBrand, filterSeries].forEach(selectElem => {
    if (selectElem) {
      selectElem.addEventListener('change', () => {
        // Sync filterKategori dropdown with catalog pill if applicable
        if (selectElem === filterKategori && filterKategori.value !== 'all') {
          catalogPills.forEach(p => {
            if (p.getAttribute('data-category') === filterKategori.value) {
              catalogPills.forEach(cp => cp.classList.remove('active'));
              p.classList.add('active');
              activeCategoryPill = filterKategori.value;
            }
          });
        }
        filterCatalog();
      });
    }
  });

  // Category Pills in Catalog section
  catalogPills.forEach(pill => {
    pill.addEventListener('click', () => {
      catalogPills.forEach(p => p.classList.remove('active'));
      pill.classList.add('active');
      activeCategoryPill = pill.getAttribute('data-category') || 'all';
      if (filterKategori) {
        filterKategori.value = activeCategoryPill;
      }
      filterCatalog();
    });
  });

  // Hero Quick Chips
  document.querySelectorAll('.quick-chip').forEach(chip => {
    chip.addEventListener('click', () => {
      const q = chip.getAttribute('data-query') || '';
      if (heroMainSearchInput) heroMainSearchInput.value = q;
      if (searchInputDesktop) searchInputDesktop.value = q;
      filterCatalog();
      // Scroll smoothly to catalog
      document.getElementById('katalog')?.scrollIntoView({ behavior: 'smooth' });
    });
  });

  // Form submit prevention
  const heroFilterForm = document.getElementById('heroFilterForm');
  if (heroFilterForm) {
    heroFilterForm.addEventListener('submit', (e) => {
      e.preventDefault();
      filterCatalog();
      document.getElementById('katalog')?.scrollIntoView({ behavior: 'smooth' });
    });
  }

  // --- 3. Event Detail Modal ---
  const eventDetailModal = document.getElementById('eventDetailModal');
  const closeEventModalBtn = document.getElementById('closeEventModalBtn');
  const closeEventModalBtn2 = document.getElementById('closeEventModalBtn2');
  const btnCariKostumEvent = document.getElementById('btnCariKostumEvent');

  const modalEventTitle = document.getElementById('modalEventTitle');
  const modalEventNameText = document.getElementById('modalEventNameText');
  const modalEventCountdown = document.getElementById('modalEventCountdown');
  const modalEventDateText = document.getElementById('modalEventDateText');
  const modalEventLocText = document.getElementById('modalEventLocText');
  const modalEventDescText = document.getElementById('modalEventDescText');

  function openEventModal(eventCard) {
    const name = eventCard.getAttribute('data-event-name') || 'Event Cosplay';
    const date = eventCard.getAttribute('data-event-date') || '';
    const loc = eventCard.getAttribute('data-event-location') || '';
    const city = eventCard.getAttribute('data-event-city') || '';
    const countdown = eventCard.getAttribute('data-event-countdown') || '';
    const desc = eventCard.getAttribute('data-event-desc') || '';

    if (modalEventNameText) modalEventNameText.textContent = name;
    if (modalEventCountdown) modalEventCountdown.textContent = countdown;
    if (modalEventDateText) modalEventDateText.textContent = date;
    if (modalEventLocText) modalEventLocText.textContent = `${loc} (${city})`;
    if (modalEventDescText) modalEventDescText.textContent = desc;

    if (eventDetailModal) eventDetailModal.classList.add('active');
  }

  function closeEventModal() {
    if (eventDetailModal) eventDetailModal.classList.remove('active');
  }

  document.querySelectorAll('.btn-event-detail').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const card = btn.closest('.event-card');
      if (card) openEventModal(card);
    });
  });

  if (closeEventModalBtn) closeEventModalBtn.addEventListener('click', closeEventModal);
  if (closeEventModalBtn2) closeEventModalBtn2.addEventListener('click', closeEventModal);

  if (btnCariKostumEvent) {
    btnCariKostumEvent.addEventListener('click', () => {
      closeEventModal();
    });
  }

  if (eventDetailModal) {
    eventDetailModal.addEventListener('click', (e) => {
      if (e.target === eventDetailModal) closeEventModal();
    });
  }

  // --- 4. Interactive Negotiation (Nego Harga) Modal ---
  const negoModal = document.getElementById('negoModal');
  const closeNegoModalBtn = document.getElementById('closeNegoModalBtn');
  const cancelNegoBtn = document.getElementById('cancelNegoBtn');
  const submitNegoForm = document.getElementById('submitNegoForm');

  const modalImg = document.getElementById('modalProductImg');
  const modalTitle = document.getElementById('modalProductTitle');
  const modalSeries = document.getElementById('modalProductSeries');
  const modalBasePrice = document.getElementById('modalBasePrice');
  const negoPriceInput = document.getElementById('negoPriceInput');

  function openNegoModal(card) {
    const title = card.querySelector('.card-title')?.textContent || 'Kostum Cosplay';
    const series = card.querySelector('.card-series')?.textContent || '';
    const priceText = card.querySelector('.price-val')?.textContent || 'Rp 0';

    if (modalTitle) modalTitle.textContent = title;
    if (modalSeries) modalSeries.textContent = series;
    if (modalBasePrice) modalBasePrice.textContent = `${priceText} / 3 hari`;

    // Suggest offer 15% below catalog price
    const numericPrice = parseInt(priceText.replace(/[^0-9]/g, ''), 10) || 120000;
    const suggestedNego = Math.round((numericPrice * 0.85) / 5000) * 5000;
    if (negoPriceInput) negoPriceInput.value = suggestedNego;

    if (negoModal) negoModal.classList.add('active');
  }

  function closeNegoModal() {
    if (negoModal) negoModal.classList.remove('active');
  }

  document.querySelectorAll('.btn-card-nego').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const card = btn.closest('.costume-card');
      if (card) openNegoModal(card);
    });
  });

  if (closeNegoModalBtn) closeNegoModalBtn.addEventListener('click', closeNegoModal);
  if (cancelNegoBtn) cancelNegoBtn.addEventListener('click', closeNegoModal);

  if (negoModal) {
    negoModal.addEventListener('click', (e) => {
      if (e.target === negoModal) closeNegoModal();
    });
  }

  // --- 5. Toast Notifications & Quick Actions ---
  const toast = document.getElementById('toastNotice');
  const toastText = document.getElementById('toastText');

  window.showToast = function(message) {
    if (!toast) return;
    if (toastText) toastText.textContent = message;
    toast.classList.add('show');
    setTimeout(() => {
      toast.classList.remove('show');
    }, 3800);
  };

  if (submitNegoForm) {
    submitNegoForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const offerPrice = negoPriceInput ? negoPriceInput.value : '';
      closeNegoModal();
      window.showToast(`Tawaran sewa Rp ${parseInt(offerPrice || 0, 10).toLocaleString('id-ID')} terkirim ke pemilik rental!`);
    });
  }

  document.querySelectorAll('.btn-card-rent').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const card = btn.closest('.costume-card');
      const title = card?.querySelector('.card-title')?.textContent.trim() || 'Kostum';
      window.showToast(`Kostum "${title}" dimasukkan ke permohonan sewa!`);
    });
  });

  const profileAvatarBtn = document.getElementById('profileAvatarBtn');
  if (profileAvatarBtn) {
    profileAvatarBtn.addEventListener('click', () => {
      window.showToast('Akun CosVers: Ali Nawawi (Cosplayer Terverifikasi)');
    });
  }

  // Global helper for filtering by Cosrent city click
  window.filterByCosrent = function(cityName) {
    if (filterKota) {
      const cityLower = cityName.toLowerCase();
      for (let opt of filterKota.options) {
        if (opt.value.includes(cityLower) || cityLower.includes(opt.value)) {
          filterKota.value = opt.value;
          break;
        }
      }
    }
    filterCatalog();
    window.showToast(`Menampilkan koleksi rental untuk wilayah ${cityName}`);
  };
});
