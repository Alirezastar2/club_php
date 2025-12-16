<?php
/*
Template Name: Khalafi Benefit Landing
*/
if (!defined('ABSPATH')) { exit; }

get_header();

// enqueue CSS specific to this landing
wp_enqueue_style(
    'khalafi-benefit-landing-css',
    get_stylesheet_directory_uri() . '/landings_assets/css/khalafi-benefit-landing.css',
    [],
    '1.0.0'
);
?>

<main class="khalafi-benefit-landing" role="main" aria-labelledby="headline" dir="rtl">
  <section class="hero" aria-label="کد تخفیف خلافی خودرو">
    <picture>
      <source media="(max-width: 767px)" srcset="https://club.snapp.ir/wp-content/uploads/2025/11/Khalafi-Benefit-2.svg" sizes="100vw">
      <img src="https://club.snapp.ir/wp-content/uploads/2025/11/Khalafi-Benefit-2.svg" alt="نحوه استفاده از کد تخفیف خلافی خودرو" loading="eager" decoding="async" />
    </picture>
  </section>

  <section class="content" aria-label="دستورالعمل‌ها">
    <h1 class="content-title">نحوه استفاده از کد تخفیف خلافی خودرو</h1>
    <ul class="content-list">
      <li>در صفحه اول اپلیکیشن ،رانندگان روی آیکون سه خط افقی بالای صفحه سمت راست بزنید.</li>
      <li>وارد بخش کارپی شوید و پلاک خود را ثبت کنید.</li>
      <li>در مرحله بعد گزینه خلافی «خودرو» را انتخاب کنید.</li>
      <li>روی دکمه «ادامه» بزنید در صفحه تأیید اطلاعات، کد تخفیف را وارد کنید و با زدن روی دکمه «پرداخت» خلافی خودرو را <strong>رایگان</strong> استعلام بگیرید.</li>
    </ul>
  </section>

  <section class="cta" aria-label="دعوت به ورود">
    <p class="cta-text">برای شروع خرید به اپلیکیشن رانندگان برگردید</p>
  </section>
</main>

<?php
get_footer();
?>

