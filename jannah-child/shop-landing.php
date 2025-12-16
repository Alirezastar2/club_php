<?php
/*
Template Name: Shop Landing
*/
if (!defined('ABSPATH')) { exit; }

get_header();

// enqueue CSS specific to this landing
wp_enqueue_style(
    'shop-landing-css',
    get_stylesheet_directory_uri() . '/landings_assets/css/shop-landing.css',
    [],
    '1.0.0'
);
?>

<main class="shop-landing" role="main" aria-labelledby="headline" dir="rtl">
  <section class="hero" aria-label="بنر تخفیف پاییز">
    <picture>
      <source media="(max-width: 767px)" srcset="https://club.snapp.ir/wp-content/uploads/2025/10/Shop.png" sizes="100vw">
      <img src="https://club.snapp.ir/wp-content/uploads/2025/10/Shop.png" alt="تخفیف‌ریزان پاییز اسنپ‌شاپ" loading="eager" decoding="async" />
    </picture>
  </section>

  <section class="cta" aria-label="دعوت به ورود">
    <a class="cta-btn" href="https://l.snpp.link/shop-loyalty" rel="noopener" target="_blank">ورود به اسنپ‌شاپ</a>
  </section>
</main>

<?php
get_footer();
?>


