<?php
/*
Template Name: Internet Benefit Landing
*/
if (!defined('ABSPATH')) { exit; }

get_header();

// enqueue CSS specific to this landing
wp_enqueue_style(
    'internet-benefit-landing-css',
    get_stylesheet_directory_uri() . '/landings_assets/css/internet-benefit-landing.css',
    [],
    '1.0.0'
);
?>

<main class="internet-benefit-landing" role="main" aria-labelledby="headline" dir="rtl">
  <section class="hero" aria-label="بسته اینترنت رایگان">
    <picture>
      <source media="(max-width: 767px)" srcset="https://club.snapp.ir/wp-content/uploads/2025/11/Internet-Benefit-2.svg" sizes="100vw">
      <img src="https://club.snapp.ir/wp-content/uploads/2025/11/Internet-Benefit-2.svg" alt="نحوه استفاده از کد تخفیف بسته اینترنت" loading="eager" decoding="async" />
    </picture>
  </section>

  <section class="content" aria-label="دستورالعمل‌ها">
    <h1 class="content-title">نحوه استفاده از کد تخفیف بسته اینترنت</h1>
    <ul class="content-list">
      <li>در صفحه اول اپلیکیشن رانندگان، روی آیکون سه خط افقی بالای صفحه (سمت راست) بزنید.</li>
      <li>گزینه «بیشتر» (سه نقطه سمت چپ) را انتخاب کنید و وارد بخش «شارژ و اینترنت» شوید.</li>
      <li>بسته اینترنت ۵ گیگابایتی یک ماهه را انتخاب کنید.</li>
      <li>روی دکمه «ادامه» بزنید؛ در صفحه تأیید اطلاعات پرداخت، کد تخفیف خود را وارد کنید و در نهایت گزینه «پرداخت» را انتخاب کنید تا بسته اینترنت <strong>رایگان</strong> برای شما فعال شود.</li>
    </ul>
  </section>

  <section class="cta" aria-label="دعوت به ورود">
    <p class="cta-text">برای شروع خرید به اپلیکیشن رانندگان برگردید</p>
  </section>
</main>

<?php
get_footer();
?>

