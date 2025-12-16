<?php

/**
 * Template Name: Landing Gheseran
 * Landing page for Gheseran competition
 */
?>
<?php get_header(); ?>

<style>
/* Hide menu/navigation for Gheseran landing page - Comprehensive */
header,
.site-header,
.header-wrapper,
.main-nav-wrapper,
#main-nav,
.main-menu-wrapper,
.menu-components-wrap,
.mobile-header-components,
.header-layout-1-logo,
.main-nav,
.desktop-menu,
.mobile-nav,
.mobile-toggle,
.off-canvas,
.off-canvas-trigger,
nav.main-nav,
header.site-header,
#site-header,
.header-area,
.header-main,
.header-inner,
.navbar,
.navigation,
.menu,
.menu-item,
.menu-wrapper,
.header-menu,
.site-navigation,
.main-navigation,
.header-nav,
nav,
header > *,
body > header,
body > .site-header,
body > .header-wrapper {
  display: none !important;
  visibility: hidden !important;
  opacity: 0 !important;
  height: 0 !important;
  width: 0 !important;
  overflow: hidden !important;
  margin: 0 !important;
  padding: 0 !important;
  position: absolute !important;
  left: -9999px !important;
}

.main-nav-wrapper,
.header-wrapper,
.site-header {
  height: 0 !important;
  min-height: 0 !important;
  max-height: 0 !important;
  overflow: hidden !important;
  margin: 0 !important;
  padding: 0 !important;
}

/* Remove any body padding that might be added for header */
body.admin-bar .gheseran-landing,
body.logged-in .gheseran-landing {
  padding-top: 0 !important;
  margin-top: 0 !important;
}

/* Ensure no spacing from header */
body {
  padding-top: 0 !important;
  margin-top: 0 !important;
}
</style>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/landings_assets/css/gheseran-landing.css">

<div class="gheseran-landing">
    <!-- Hero Section -->
    <div class="gheseran-hero">
        <div class="hero-banner">
            <img src="https://club.snapp.ir/wp-content/uploads/2025/12/gheseran-H-1.svg" alt="قصه‌ران" />
        </div>
     
    </div>

    <!-- Introduction Section -->
    <div class="gheseran-intro">
        <p class="intro-text">
            باشگاه رانندگان اسنپ با هدف اهمیت بخشیدن به استعدادهای شما کاربران راننده که علاقه‌مند به خاطره گفتن، نوشتن قصه یا گویندگی و آواز خواندن هستید، مسابقه‌ی سه‌گانه‌یی «قصه‌ران» را برگزار می‌کند. سه اثر برتر هر بخش به انتخاب خود شما برگزیده شده و جوایز ویژه دریافت خواهند کرد.
        </p>
    </div>

    <!-- Competition Sections -->
    <div class="competition-sections">
        <div class="section-title-image">
            <img src="https://club.snapp.ir/wp-content/uploads/2025/12/Asset-11.svg" alt="بخشهای مسابقه" />
        </div>

        <div class="sections-icons">
            <div class="section-icon-item">
                <img src="https://club.snapp.ir/wp-content/uploads/2025/12/میکروفون.svg" alt="خوانندگی یا گویندگی" />
            </div>
            <div class="section-icon-item">
                <img src="https://club.snapp.ir/wp-content/uploads/2025/12/دفتر.svg" alt="نوشتن" />
            </div>
            <div class="section-icon-item">
                <img src="https://club.snapp.ir/wp-content/uploads/2025/12/گویندگی.svg" alt="خاطره‌گویی" />
            </div>
        </div>

        <div class="sections-grid">
            <!-- Section 1: Singing/Narration -->
            <div class="section-card">
                <h3 class="section-card-title">خوانندگی یا گویندگی</h3>
                <p class="section-card-desc">
                    در این بخش برای شرکت در مسابقه خوانندگی، ترانه مورد نظر خودتان را اجرا کنید و برای شرکت در مسابقه گویندگی، متن انتخابی خودتان را بازخوانی کنید.
                </p>
            </div>

            <!-- Section 2: Storytelling -->
            <div class="section-card">
                <h3 class="section-card-title">خاطره‌گویی</h3>
                <p class="section-card-desc">
                    خاطره‌هایتان از سفرها یا تجربه‌های اسنپی را در قالب فایل صوتی ۱ تا ۲ دقیقه‌ای ضبط و ارسال کنید.
                </p>
            </div>

            <!-- Section 3: Writing -->
            <div class="section-card">
                <h3 class="section-card-title">نوشتن</h3>
                <p class="section-card-desc">
                    داستان خود را در قالب متنی کوتاه (حداکثر ۲۰۰ کلمه) و بر اساس یکی از تصاویر زیر بنویسید و ارسال کنید.
                </p>
                <div class="writing-prompt">
                    <p class="prompt-text">
                        <strong>شروع قصه:</strong> امروز که بین سفرهام داشتم استراحت می‌کردم، درست همون لحظه......
                    </p>
                </div>
                <div class="writing-images">
                    <div class="writing-image-item">
                        <img src="https://club.snapp.ir/wp-content/uploads/2025/12/Rectangle-2.svg" alt="تصویر ۱" />
                    </div>
                    <div class="writing-image-item">
                        <img src="https://club.snapp.ir/wp-content/uploads/2025/12/Rectangle-3.svg" alt="تصویر ۲" />
                    </div>
                    <div class="writing-image-item">
                        <img src="https://club.snapp.ir/wp-content/uploads/2025/12/Rectangle-4.svg" alt="تصویر ۳" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Prizes Section -->
    <div class="prizes-section">
        <div class="section-title-image">
            <img src="https://club.snapp.ir/wp-content/uploads/2025/12/Asset-9.svg" alt="جوایز مسابقه" />
        </div>
        <div class="prizes-content">
            <p class="prizes-text">
                برای سه نفر برگزیده هر بخش:
            </p>
            <div class="prize-list">
                <div class="prize-item">
                    <span class="prize-rank">نفرات اول:</span>
                    <span class="prize-amount"><span class="prize-number">۵</span> <span class="prize-million">میلیون</span> <span class="prize-toman">تومان</span></span>
                </div>
                <div class="prize-item">
                    <span class="prize-rank">نفرات دوم:</span>
                    <span class="prize-amount"><span class="prize-number">۳</span> <span class="prize-million">میلیون</span> <span class="prize-toman">تومان</span></span>
                </div>
                <div class="prize-item">
                    <span class="prize-rank">نفرات سوم:</span>
                    <span class="prize-amount"><span class="prize-number">۲</span> <span class="prize-million">میلیون</span> <span class="prize-toman">تومان</span></span>
                </div>
            </div>
            <p class="prizes-additional">
                علاوه بر جوایز نقدی، آثار برگزیده در رسانه‌های رسمی باشگاه رانندگان منتشر خواهند شد.
            </p>
        </div>
        <div class="trophies-visual">
            <img src="https://club.snapp.ir/wp-content/uploads/2025/12/Winner-4.svg" alt="جوایز" />
        </div>
    </div>

    <!-- Rules Section -->
    <div class="rules-section">
        <div class="section-title-image">
            <img src="https://club.snapp.ir/wp-content/uploads/2025/12/Frame-2608567.svg" alt="قوانین و مقررات" />
        </div>
        <div class="rules-content">
            <ul class="rules-list">
                <li>آثار ارسالی باید در چارچوب قوانین کشور و دارای کیفیت مناسب باشند.</li>
                <li>امکان شرکت در هر سه بخش مسابقه برای تمامی کاربران راننده وجود دارد.</li>
            </ul>
        </div>
    </div>

    <!-- Submission Section -->
    <div class="submission-section">
        <div class="section-title-image">
            <img src="https://club.snapp.ir/wp-content/uploads/2025/12/Frame-2608566.svg" alt="نحوه ارسال آثار" />
        </div>
        <div class="submission-content">
            <p class="submission-text">
                برای شرکت در هر یک از بخش‌ها، اثر خود را تا تاریخ <strong>۲۲ دی ۱۴۰۴</strong> از طریق راه‌های زیر ارسال کنید:
            </p>
            <div class="submission-buttons">
                <a href="https://snapp.porsline.ir/s/gesseran" target="_blank" class="submission-btn btn-direct">
                    ارسال مستقیم
                </a>
                <a href="https://t.me/clubsnapp_bot" target="_blank" class="submission-btn btn-telegram">
                    ارسال در تلگرام
                </a>
            </div>
            <p class="results-announcement">
                <strong>زمان اعلام نتایج:</strong> اوایل بهمن ۱۴۰۴
            </p>
        </div>
    </div>

    <!-- Closing Message -->
    <div class="closing-message">
        <p class="closing-text">شما هم دعوتید به قصه‌ران</p>
        <p class="closing-subtext">منتظر شنیدن و خواندن روایت‌های شما هستیم.</p>
    </div>
</div>

<script>
// Force hide menu/navigation after page load
(function() {
  function hideMenu() {
    var selectors = [
      'header',
      '.site-header',
      '.header-wrapper',
      '.main-nav-wrapper',
      '#main-nav',
      '.main-menu-wrapper',
      '.menu-components-wrap',
      '.mobile-header-components',
      '.header-layout-1-logo',
      '.main-nav',
      '.desktop-menu',
      '.mobile-nav',
      '.mobile-toggle',
      '.off-canvas',
      '.off-canvas-trigger',
      'nav.main-nav',
      'header.site-header',
      '#site-header',
      '.header-area',
      '.header-main',
      '.header-inner',
      '.navbar',
      '.navigation',
      '.menu',
      '.menu-wrapper',
      '.header-menu',
      '.site-navigation',
      '.main-navigation',
      '.header-nav'
    ];
    
    selectors.forEach(function(selector) {
      var elements = document.querySelectorAll(selector);
      elements.forEach(function(el) {
        if (el) {
          el.style.display = 'none';
          el.style.visibility = 'hidden';
          el.style.opacity = '0';
          el.style.height = '0';
          el.style.width = '0';
          el.style.overflow = 'hidden';
          el.style.margin = '0';
          el.style.padding = '0';
          el.style.position = 'absolute';
          el.style.left = '-9999px';
        }
      });
    });
    
    // Remove body padding-top
    document.body.style.paddingTop = '0';
    document.body.style.marginTop = '0';
  }
  
  // Run immediately
  hideMenu();
  
  // Run after DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', hideMenu);
  }
  
  // Run after page is fully loaded
  window.addEventListener('load', hideMenu);
  
  // Run after a short delay to catch any late-loading elements
  setTimeout(hideMenu, 100);
  setTimeout(hideMenu, 500);
  setTimeout(hideMenu, 1000);
})();
</script>

<?php get_footer(); ?>