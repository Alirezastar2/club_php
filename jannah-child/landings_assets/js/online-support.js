
/**
 * جاوااسکریپت صفحه پشتیبانی آنلاین (بهینه‌سازی: هندل فقط برای دکمه‌های Primary؛ Secondary بدون دخالت)
 * - دیپ‌لینک + fallback برای primary
 * - لینک‌های آموزش (secondary) بدون preventDefault تا در موبایل درست باز شوند
 */

document.addEventListener('DOMContentLoaded', function () {
  // متغیرهای سراسری
  let currentModal = null;
  let isModalOpen = false;

  // --- ابزار تشخیص پلتفرم/دیپ‌لینک ---
  function isAndroid() {
    const ua = navigator.userAgent || navigator.vendor || window.opera;
    return /Android/i.test(ua);
  }
  function isIOS() {
    const ua = navigator.userAgent || window.navigator.userAgent || '';
    return /iPhone|iPad|iPod/i.test(ua);
  }
  function isMobileDevice() {
    return isAndroid() || isIOS();
  }
  function isDeepLink(url) {
    if (!url) return false;
    const lower = url.toLowerCase();
    return lower.startsWith('snapp://') || lower.startsWith('intent://');
  }
  function navigateWithTarget(url, anchor) {
    const tgt = anchor && anchor.getAttribute ? anchor.getAttribute('target') : null;
    if (tgt === '_blank') window.open(url, '_blank', 'noopener,noreferrer');
    else window.location.assign(url);
  }
  // اختیاری: fallback پیش‌فرض سراسری از روی body
  const DEFAULT_FALLBACK = document.body.getAttribute('data-default-fallback') || '';

  /**
   * تلاش برای باز کردن دیپ‌لینک با fallback
   * @param {string} url - دیپ‌لینک (snapp:// یا intent://)
   * @param {string} fallbackUrl - لینک fallback (وب/استور). اختیاری اما توصیه می‌شود.
   * @param {HTMLElement} anchor - المانی که کلیک شده (برای رعایت target)
   */
  function openDeepLink(url, fallbackUrl, anchor) {
    // اگر دیپ‌لینک نبود، به صورت عادی باز کنیم
    if (!isDeepLink(url)) {
      navigateWithTarget(url, anchor);
      return;
    }

    // اگر موبایل نیست (مثلاً دسکتاپ)، مستقیم به fallback برو
    if (!isMobileDevice()) {
      if (fallbackUrl) navigateWithTarget(fallbackUrl, anchor);
      else window.location.href = url; // آخرین تلاش
      return;
    }

    // Android
    if (isAndroid()) {
      try {
        window.location.href = url; // اجازه بده مرورگر/وب‌ویو خودش هندل کند
        setTimeout(function () {
          if (document.visibilityState === 'visible') {
            if (fallbackUrl) navigateWithTarget(fallbackUrl, anchor);
          }
        }, 1200);
      } catch (e) {
        if (fallbackUrl) navigateWithTarget(fallbackUrl, anchor);
      }
      return;
    }

    // iOS
    if (isIOS()) {
      window.location.href = url;
      setTimeout(function () {
        if (document.visibilityState === 'visible') {
          if (fallbackUrl) navigateWithTarget(fallbackUrl, anchor);
        }
      }, 1200);
      return;
    }

    // پیش‌فرض
    if (fallbackUrl) navigateWithTarget(fallbackUrl, anchor);
  }

  // --- کنترل مودال‌ها ---
  function openModal(modalId) {
    const modal = document.getElementById('modal-' + modalId);
    if (modal) {
      modal.style.display = 'block';
      document.body.style.overflow = 'hidden';
      currentModal = modal;
      isModalOpen = true;

      const closeBtn = modal.querySelector('.modal-close');
      if (closeBtn) closeBtn.focus();

      setTimeout(() => modal.classList.add('modal-open'), 10);
    }
  }

  function closeModal(modal) {
    if (modal) {
      modal.classList.remove('modal-open');
      setTimeout(() => {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
        currentModal = null;
        isModalOpen = false;
      }, 300);
    }
  }

  function closeAllModals() {
    document.querySelectorAll('.modal').forEach(closeModal);
  }

  // رویداد کلیک روی کارت‌های پشتیبانی
  const supportCards = document.querySelectorAll('.support-card');
  supportCards.forEach((card) => {
    card.addEventListener('click', function (e) {
      e.preventDefault();
      const modalId = this.getAttribute('data-modal');
      if (modalId) openModal(modalId);
    });

    card.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        const modalId = this.getAttribute('data-modal');
        if (modalId) openModal(modalId);
      }
    });

    card.setAttribute('tabindex', '0');
    card.setAttribute('role', 'button');
    const titleEl = card.querySelector('.support-card-title');
    card.setAttribute(
      'aria-label',
      'باز کردن مودال ' + (titleEl ? titleEl.textContent : '')
    );
  });

  // رویداد کلیک روی دکمه‌های بستن
  document.querySelectorAll('.modal-close').forEach((button) => {
    button.addEventListener('click', function (e) {
      e.preventDefault();
      closeModal(this.closest('.modal'));
    });
    button.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        closeModal(this.closest('.modal'));
      }
    });
  });

  // بستن مودال با کلیک روی پس‌زمینه
  document.querySelectorAll('.modal').forEach((modal) => {
    modal.addEventListener('click', function (e) {
      if (e.target === this) closeModal(this);
    });
  });

  // بستن مودال با ESC
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && isModalOpen) {
      e.preventDefault();
      closeAllModals();
    }
  });

  // انیمیشن ورود کارت‌ها با Intersection Observer
  const cardsObserver = new IntersectionObserver(
    function (entries) {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
          entry.target.classList.add('card-visible');
        }
      });
    },
    { threshold: 0.1, rootMargin: '0px 0px -50px 0px' }
  );

  supportCards.forEach((card) => cardsObserver.observe(card));

  // انیمیشن ورود محتوای مودال
  function animateModalContent(modal) {
    const modalBody = modal.querySelector('.modal-body');
    if (!modalBody) return;
    const listItems = modalBody.querySelectorAll('.modal-content-list li');
    const buttons = modalBody.querySelectorAll('.modal-btn');

    listItems.forEach((item, index) => {
      item.style.opacity = '0';
      item.style.transform = 'translateX(20px)';
      setTimeout(() => {
        item.style.transition = 'all 0.3s ease';
        item.style.opacity = '1';
        item.style.transform = 'translateX(0)';
      }, 100 + index * 100);
    });

    buttons.forEach((button, index) => {
      button.style.opacity = '0';
      button.style.transform = 'translateY(20px)';
      setTimeout(() => {
        button.style.transition = 'all 0.3s ease';
        button.style.opacity = '1';
        button.style.transform = 'translateY(0)';
      }, 300 + index * 100);
    });
  }

  // مشاهده شدن مودال برای اجرای انیمیشن
  document.querySelectorAll('.modal').forEach((modal) => {
    const obs = new IntersectionObserver(
      function (entries) {
        entries.forEach((entry) => {
          if (entry.isIntersecting && entry.target.style.display === 'block') {
            animateModalContent(entry.target);
          }
        });
      },
      { threshold: 0.5 }
    );
    obs.observe(modal);
  });

  // --- تست ساده برای اطمینان از کارکرد دکمه‌ها ---
  document.addEventListener('DOMContentLoaded', function() {
    // تست کلیک روی دکمه‌های مودال
    setTimeout(() => {
      const allModalButtons = document.querySelectorAll('.modal-btn');
      console.log('Found modal buttons:', allModalButtons.length);
      
      allModalButtons.forEach((btn, index) => {
        const href = btn.getAttribute('href');
        const isPrimary = btn.classList.contains('modal-btn-primary');
        const isSecondary = btn.classList.contains('modal-btn-secondary');
        console.log(`Button ${index + 1}:`, {
          href: href,
          isPrimary: isPrimary,
          isSecondary: isSecondary,
          text: btn.textContent.trim()
        });
        
        // اضافه کردن event listener ساده برای تست
        btn.addEventListener('click', function(e) {
          console.log('Button clicked:', {
            href: this.getAttribute('href'),
            text: this.textContent.trim(),
            isPrimary: this.classList.contains('modal-btn-primary'),
            isSecondary: this.classList.contains('modal-btn-secondary')
          });
        });
      });
    }, 1000);
  });

  // --- هندل کلیک روی لینک‌ها ---
  // نکته مهم: فقط دکمه‌های Primary را intercept می‌کنیم؛ Secondary و سایر لینک‌ها رفتار طبیعی مرورگر را دارند.
  document.addEventListener('click', function (e) {
    const anchor = e.target.closest('a');
    if (!anchor) return;

    const isPrimary = anchor.classList.contains('modal-btn-primary');
    if (!isPrimary) return; // Secondary/other: هیچ دخالتی نکن

    const href = anchor.getAttribute('href') || '#';
    if (href === '#') { e.preventDefault(); return; }

    // fallback از data-fallback یا data-web یا fallback سراسری
    const fallbackUrl = anchor.getAttribute('data-fallback')
      || anchor.getAttribute('data-web')
      || DEFAULT_FALLBACK
      || '';

    e.preventDefault(); // فقط برای دکمه‌های Primary
    if (isDeepLink(href)) {
      openDeepLink(href, fallbackUrl, anchor);
    } else {
      navigateWithTarget(href, anchor);
    }
  });

  // --- اسکیما FAQ برای SEO ---
  const schema = {
    '@context': 'https://schema.org',
    '@type': 'FAQPage',
    mainEntity: [],
  };

  document.querySelectorAll('.modal').forEach((modal) => {
    const title = (modal.querySelector('.modal-title') || {}).textContent || '';
    const content = Array.from(
      modal.querySelectorAll('.modal-content-list li') || []
    )
      .map((li) => li.textContent)
      .join(' ');
    if (title) {
      schema.mainEntity.push({
        '@type': 'Question',
        name: title,
        acceptedAnswer: {
          '@type': 'Answer',
          text: content,
        },
      });
    }
  });

  const script = document.createElement('script');
  script.type = 'application/ld+json';
  script.textContent = JSON.stringify(schema);
  document.head.appendChild(script);
});
