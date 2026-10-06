/**
 * CosVers | RuangCosplay - Detail Page Scripts
 * Handles Gallery slider, Next/Prev, Mobile Touch Swipe, Wishlist toggle, and Booking
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

  if (mobileHamburgerBtn) mobileHamburgerBtn.addEventListener('click', () => toggleMobileNav(true));
  if (mobileDrawerCloseBtn) mobileDrawerCloseBtn.addEventListener('click', () => toggleMobileNav(false));
  if (mobileNavBackdrop) mobileNavBackdrop.addEventListener('click', () => toggleMobileNav(false));

  // --- 2. Interactive Gallery (Next, Prev, Thumbnails, Mobile Swipe) ---
  const galleryMainView = document.getElementById('galleryMainView');
  const slides = document.querySelectorAll('.gallery-slide');
  const thumbs = document.querySelectorAll('.thumb-item');
  const prevBtn = document.getElementById('galleryPrevBtn');
  const nextBtn = document.getElementById('galleryNextBtn');
  const counterPill = document.getElementById('galleryCounterPill');
  const mainGalleryVideo = document.getElementById('mainGalleryVideo');

  let currentSlideIndex = 0;
  const totalSlides = slides.length;

  function showSlide(index) {
    if (index < 0) {
      currentSlideIndex = totalSlides - 1;
    } else if (index >= totalSlides) {
      currentSlideIndex = 0;
    } else {
      currentSlideIndex = index;
    }

    // Toggle active slide
    slides.forEach((slide, i) => {
      if (i === currentSlideIndex) {
        slide.style.display = 'block';
        slide.classList.add('active');
      } else {
        slide.style.display = 'none';
        slide.classList.remove('active');
      }
    });

    // Pause video if moving away from video slide
    if (mainGalleryVideo && currentSlideIndex !== 4) {
      mainGalleryVideo.pause();
    }

    // Update thumbnails active state
    thumbs.forEach((thumb, i) => {
      if (i === currentSlideIndex) {
        thumb.classList.add('active');
        thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
      } else {
        thumb.classList.remove('active');
      }
    });

    // Update Counter
    if (counterPill) {
      counterPill.textContent = `${currentSlideIndex + 1} / ${totalSlides}`;
    }
  }

  if (prevBtn) {
    prevBtn.addEventListener('click', (e) => {
      e.preventDefault();
      showSlide(currentSlideIndex - 1);
    });
  }

  if (nextBtn) {
    nextBtn.addEventListener('click', (e) => {
      e.preventDefault();
      showSlide(currentSlideIndex + 1);
    });
  }

  thumbs.forEach((thumb, i) => {
    thumb.addEventListener('click', () => {
      showSlide(i);
    });
  });

  // Mobile Touch Swipe Support
  let touchStartX = 0;
  let touchStartY = 0;
  let touchEndX = 0;
  let touchEndY = 0;
  const minSwipeDistance = 35; // pixel threshold

  if (galleryMainView) {
    galleryMainView.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
      touchStartY = e.changedTouches[0].screenY;
    }, { passive: true });

    galleryMainView.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX;
      touchEndY = e.changedTouches[0].screenY;
      handleGesture();
    }, { passive: true });
  }

  function handleGesture() {
    const deltaX = touchEndX - touchStartX;
    const deltaY = touchEndY - touchStartY;

    // Ensure horizontal swipe is dominant over vertical scrolling
    if (Math.abs(deltaX) > Math.abs(deltaY) && Math.abs(deltaX) > minSwipeDistance) {
      if (deltaX < 0) {
        // Swiped Left -> Next
        showSlide(currentSlideIndex + 1);
      } else {
        // Swiped Right -> Previous
        showSlide(currentSlideIndex - 1);
      }
    }
  }

  // --- 3. Toast Notifications ---
  const toast = document.getElementById('toastNotice');
  const toastText = document.getElementById('toastText');

  function showToast(message) {
    if (!toast) return;
    if (toastText) toastText.textContent = message;
    toast.classList.add('show');
    setTimeout(() => {
      toast.classList.remove('show');
    }, 3800);
  }

  // --- 4. Wishlist Toggle (Desktop & Mobile Sticky) ---
  const btnWishlistAction = document.getElementById('btnWishlistAction');
  const btnMobileWishlist = document.getElementById('btnMobileWishlist');
  let isWishlisted = false;

  function toggleWishlist() {
    isWishlisted = !isWishlisted;
    if (isWishlisted) {
      btnWishlistAction?.classList.add('active');
      btnMobileWishlist?.classList.add('active');
      if (btnWishlistAction) btnWishlistAction.querySelector('span').textContent = '♥ Tersimpan';
      showToast('Kostum Raiden Shogun disimpan ke Wishlist Anda!');
    } else {
      btnWishlistAction?.classList.remove('active');
      btnMobileWishlist?.classList.remove('active');
      if (btnWishlistAction) btnWishlistAction.querySelector('span').textContent = '♡ Wishlist';
      showToast('Dihapus dari Wishlist.');
    }
  }

  if (btnWishlistAction) btnWishlistAction.addEventListener('click', toggleWishlist);
  if (btnMobileWishlist) btnMobileWishlist.addEventListener('click', toggleWishlist);

  // --- 5. Interactive Nego Modal ---
  const negoModal = document.getElementById('negoModal');
  const btnOpenNegoModal = document.getElementById('btnOpenNegoModal');
  const closeNegoModalBtn = document.getElementById('closeNegoModalBtn');
  const cancelNegoBtn = document.getElementById('cancelNegoBtn');
  const submitNegoForm = document.getElementById('submitNegoForm');
  const negoPriceInput = document.getElementById('negoPriceInput');

  function openNegoModal() {
    if (negoModal) negoModal.classList.add('active');
  }

  function closeNegoModal() {
    if (negoModal) negoModal.classList.remove('active');
  }

  if (btnOpenNegoModal) btnOpenNegoModal.addEventListener('click', openNegoModal);
  if (closeNegoModalBtn) closeNegoModalBtn.addEventListener('click', closeNegoModal);
  if (cancelNegoBtn) cancelNegoBtn.addEventListener('click', closeNegoModal);

  if (negoModal) {
    negoModal.addEventListener('click', (e) => {
      if (e.target === negoModal) closeNegoModal();
    });
  }

  if (submitNegoForm) {
    submitNegoForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const offerPrice = negoPriceInput ? negoPriceInput.value : '';
      closeNegoModal();
      showToast(`Tawaran Nego Rp ${parseInt(offerPrice || 0, 10).toLocaleString('id-ID')} terkirim ke Aoi Cosrent Studio!`);
    });
  }

  // Booking Feedback
  const btnBookingDm = document.getElementById('btnBookingDm');
  if (btnBookingDm) {
    btnBookingDm.addEventListener('click', () => {
      showToast('Membuka DM Instagram Aoi Cosrent Studio untuk booking...');
    });
  }

  // --- 6. Fitur "DIPAKAI COSPLAYER" Review Logic ---
  const reviewModal = document.getElementById('reviewModal');
  const btnOpenReviewModal = document.getElementById('btnOpenReviewModal');
  const closeReviewModalBtn = document.getElementById('closeReviewModalBtn');
  const cancelReviewBtn = document.getElementById('cancelReviewBtn');
  const submitReviewForm = document.getElementById('submitReviewForm');

  const reviewBookingSelect = document.getElementById('reviewBookingSelect');
  const bookingValidationNotice = document.getElementById('bookingValidationNotice');
  const bookingValidationMsg = document.getElementById('bookingValidationMsg');
  const btnSubmitReview = document.getElementById('btnSubmitReview');
  const starRatingSelect = document.getElementById('starRatingSelect');
  const selectedStarRating = document.getElementById('selectedStarRating');
  const reviewTextInput = document.getElementById('reviewTextInput');
  const publicPhotoConsentCheckbox = document.getElementById('publicPhotoConsentCheckbox');
  const dynamicReviewsContainer = document.getElementById('dynamicReviewsContainer');
  const wearerCountText = document.getElementById('wearerCountText');

  let currentWearerCount = 24;

  function openReviewModal() {
    if (reviewModal) {
      validateBookingSelection();
      reviewModal.classList.add('active');
    }
  }

  function closeReviewModal() {
    if (reviewModal) reviewModal.classList.remove('active');
  }

  if (btnOpenReviewModal) btnOpenReviewModal.addEventListener('click', openReviewModal);
  if (closeReviewModalBtn) closeReviewModalBtn.addEventListener('click', closeReviewModal);
  if (cancelReviewBtn) cancelReviewBtn.addEventListener('click', closeReviewModal);

  if (reviewModal) {
    reviewModal.addEventListener('click', (e) => {
      if (e.target === reviewModal) closeReviewModal();
    });
  }

  // Validasi Aturan Booking:
  // 1. Review hanya boleh dibuat oleh customer yang memiliki booking costume tersebut dengan status completed
  // 2. Satu booking hanya boleh memberikan satu review
  function validateBookingSelection() {
    if (!reviewBookingSelect || !bookingValidationNotice || !bookingValidationMsg || !btnSubmitReview) return;
    const selectedOption = reviewBookingSelect.options[reviewBookingSelect.selectedIndex];
    const status = selectedOption?.getAttribute('data-status');
    const isReviewed = selectedOption?.getAttribute('data-reviewed') === 'true';

    if (status !== 'completed') {
      bookingValidationNotice.className = 'booking-status-notice invalid';
      bookingValidationMsg.innerHTML = '<strong>Akses Ditolak:</strong> Review hanya boleh dibuat oleh customer yang memiliki booking costume ini dengan <em>status completed</em>. Booking ini masih berstatus belum selesai.';
      btnSubmitReview.disabled = true;
      btnSubmitReview.style.opacity = '0.5';
      btnSubmitReview.style.cursor = 'not-allowed';
    } else if (isReviewed) {
      bookingValidationNotice.className = 'booking-status-notice invalid';
      bookingValidationMsg.innerHTML = '<strong>Sudah Direview:</strong> Satu booking hanya boleh memberikan satu review. Anda sudah menuliskan ulasan untuk booking ini.';
      btnSubmitReview.disabled = true;
      btnSubmitReview.style.opacity = '0.5';
      btnSubmitReview.style.cursor = 'not-allowed';
    } else {
      bookingValidationNotice.className = 'booking-status-notice valid';
      bookingValidationMsg.innerHTML = '<strong>Status Booking Terverifikasi:</strong> Booking #' + reviewBookingSelect.value + ' telah selesai (Completed ✓). Anda berhak menuliskan review pemakai.';
      btnSubmitReview.disabled = false;
      btnSubmitReview.style.opacity = '1';
      btnSubmitReview.style.cursor = 'pointer';
    }
  }

  if (reviewBookingSelect) {
    reviewBookingSelect.addEventListener('change', validateBookingSelection);
  }

  // Interaktif Rating Bintang 1-5
  if (starRatingSelect) {
    const starSvgs = starRatingSelect.querySelectorAll('svg');
    starSvgs.forEach(star => {
      star.addEventListener('click', () => {
        const ratingVal = parseInt(star.getAttribute('data-rating') || '5', 10);
        if (selectedStarRating) selectedStarRating.value = ratingVal;

        starSvgs.forEach((s, idx) => {
          if (idx < ratingVal) {
            s.classList.add('filled');
            s.style.color = '#facc15';
          } else {
            s.classList.remove('filled');
            s.style.color = '#4b5563';
          }
        });
      });
    });
  }

  // Submit Review Form
  if (submitReviewForm) {
    submitReviewForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const selectedOption = reviewBookingSelect.options[reviewBookingSelect.selectedIndex];
      const status = selectedOption?.getAttribute('data-status');
      const isReviewed = selectedOption?.getAttribute('data-reviewed') === 'true';

      if (status !== 'completed' || isReviewed) {
        showToast('Gagal: Review hanya boleh untuk booking berstatus completed dan belum pernah direview.');
        return;
      }

      const rating = parseInt(selectedStarRating?.value || '5', 10);
      const text = reviewTextInput?.value || 'Costumenya sesuai deskripsi dan nyaman digunakan.';
      const isPublicApproved = publicPhotoConsentCheckbox?.checked || false;
      const bookingCode = reviewBookingSelect.value;

      // Tandai booking sudah direview (Satu booking hanya boleh memberikan satu review)
      selectedOption.setAttribute('data-reviewed', 'true');

      // Generate Teks Bintang
      let starsHtml = '';
      for (let i = 0; i < 5; i++) {
        starsHtml += (i < rating) ? '★' : '☆';
      }

      // Format Konten Foto Berdasarkan Persetujuan Publik
      let photoContentHtml = '';
      if (isPublicApproved) {
        photoContentHtml = `
          <div style="display:flex; flex-direction:column; gap:4px;">
            <span style="font-size:0.7rem; color:var(--accent-gold); font-weight:700;">📸 FOTO PEMAKAI DI EVENT:</span>
            <div class="review-wearer-photo-box">
              <svg viewBox="0 0 140 160" width="100%" height="100%"><rect width="140" height="160" fill="#3b0764"/><circle cx="70" cy="65" r="35" fill="#fbcfe8"/><path d="M25 140 C25 100 45 90 70 90 C95 90 115 100 115 140 Z" fill="#9333ea"/><circle cx="90" cy="45" r="8" fill="#d4af37"/><text x="70" y="152" fill="#e9d5ff" font-size="10" font-family="sans-serif" font-weight="bold" text-anchor="middle">@alinawawi</text></svg>
            </div>
          </div>
        `;
      } else {
        // "Jika tidak disetujui: jangan tampilkan foto customer secara publik."
        photoContentHtml = `
          <div class="review-private-photo-notice">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            <span>Foto pemakai disimpan privat (Hanya digunakan untuk verifikasi fisik pengembalian kostum atas permintaan cosplayer).</span>
          </div>
        `;
      }

      // Buat Elemen Review Baru
      const reviewCard = document.createElement('article');
      reviewCard.className = 'worn-review-card';
      reviewCard.innerHTML = `
        <div class="review-user-row">
          <div class="review-user-info">
            <div class="review-avatar-circle" style="background:#2b1119; color:var(--accent-gold); border-color:var(--accent-gold);">AN</div>
            <div class="review-user-meta">
              <a href="https://instagram.com" target="_blank" rel="noopener" class="review-username-link">@alinawawi</a>
              <span class="review-event-tag">Dipakai Baru Saja &bull; Booking #${bookingCode} (Completed)</span>
            </div>
          </div>
          <div class="verified-renter-badge">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
            ✓ Terverifikasi Pernah Menyewa
          </div>
        </div>

        <div class="review-stars-row">
          <span class="review-stars-text">${starsHtml}</span>
          <span style="font-size:0.75rem; color:var(--text-muted); margin-left:4px;">(Rating ${rating}/5)</span>
        </div>

        <div class="review-content-body">
          <p class="review-quote-text">"${text}"</p>
          ${photoContentHtml}
        </div>
      `;

      if (dynamicReviewsContainer) {
        dynamicReviewsContainer.prepend(reviewCard);
      }

      // Update counter pemakai
      currentWearerCount++;
      if (wearerCountText) {
        wearerCountText.innerHTML = `<strong>${currentWearerCount} orang</strong> telah memakai costume ini`;
      }

      closeReviewModal();
      showToast('Ulasan pemakai terverifikasi berhasil dikirim!');
    });
  }

  const profileAvatarBtn = document.getElementById('profileAvatarBtn');
  if (profileAvatarBtn) {
    profileAvatarBtn.addEventListener('click', () => {
      showToast('Akun CosVers: Ali Nawawi (Cosplayer Terverifikasi)');
    });
  }
});
