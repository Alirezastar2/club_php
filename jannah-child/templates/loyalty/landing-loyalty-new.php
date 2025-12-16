
<?php $images = get_stylesheet_directory_uri() . '/templates/loyalty/assets/images/'; ?>
<?php $campbg = get_stylesheet_directory_uri() . '/templates/loyalty/assets/images/campaign/background/'; ?>
<?php $header = wp_is_mobile() ? 'mobile.jpg' : 'desktop.jpg'; ?>
<style>
body {
  font-family: 'IRANSansX', sans-serif !important;
  background: #ffffff;
  margin: 0;
  padding: 0;
}

.league-summary-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 32px;
  margin: 32px auto;
  direction: rtl;
  max-width: 1200px;
  background: #fff;
}

.league-card-box {
  flex: 1;
  min-width: 240px;
  max-width: 260px;
  border-radius: 16px;
  overflow: hidden;
  background: white;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
}

.league-card-header {
  padding: 16px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background-color: #f5f5f5;
  color: #000;
  font-weight: bold;
  font-size: 15px;
}

.league-card-header img {
  width: 28px;
  height: 28px;
  background: rgba(0, 0, 0, 0.05);
  padding: 4px;
  border-radius: 6px;
}

.league-card-body {
  list-style: none;
  padding: 16px;
  margin: 0;
  direction: rtl;
  font-size: 14px;
  color: #333;
}

.league-card-body li {
  margin-bottom: 12px;
  line-height: 1.8;
}

.video, video {
  display: block !important;
  margin-left: auto !important;
  margin-right: auto !important;
}

@media (max-width: 768px) {
  .league-summary-container {
    flex-direction: column;
    align-items: center;
    padding: 0 16px;
  }
}
.header-purple {
  background-color: #7B61FF;
  color: white;
}

.header-gold {
  background-color: #F7A500;
  color: white;
}

.header-silver {
  background-color: #B0B4BB;
  color: black;
}

.header-green {
  background-color: #00B069;
  color: white;
}

</style>



    <div class="container-fluid loyal-header" style="background-image: url(<?= $images . $header ?>);">
        <div class="row">
            <div class="col-md-12 loyal-img">
                <div class="loyal-head">
                    <h1>
                        راهنمای لیگ رانندگان اسنپ
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container loyal-body">
        <div class="row">
            <div class="col-md-12 cmp-loyalty">
                <p>
                    در لیگ رانندگان اسنپ، شما کاربران راننده باتوجه‌به استان محل فعالیت و بر اساس قیمت سفر،  علاوه بر درآمد، «اس‌پی» دریافت کرده و بسته به تعداد اس‌پی‌های ماه قبل خود در یکی از ۴ لیگ اسنپ قرار خواهید گرفت.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 camp-title">
                <h2>
                    راهنمای لیگ رانندگان اسنپ
                </h2>
            </div>
            <div class="col-md-12 loyal-description">
                <p>
                    در لیگ رانندگان اسنپ، شما کاربران راننده با هر سفر اسنپی، علاوه بر کسب درآمد، «اس‌پی» دریافت کرده و
                    بسته به تعداد اس‌پی‌های <strong> ماه قبل خود </strong> در یکی از ۴ لیگ اسنپ قرار خواهید گرفت.
                </p>
            </div>

            <div class="col-md-12">
                <step-progress :images="['<?= $images . 'svg/step-1.svg' ?>', '<?= $images . 'svg/step-2.svg' ?>', '<?= $images . 'svg/step-3.svg' ?>', '<?= $images . 'svg/step-4.svg' ?>', '<?= $images . 'svg/step-5.svg' ?>']"></step-progress>

                <set-interval></set-interval>
            </div>

            <div class="col-md-12 camp-title" style="margin-top: 50px;">
                <h2>
                    تعداد اس‌پی بر اساس استان محل فعالیت و قیمت سفر:
                </h2>
            </div>
            <div class="col-md-12">
                <table style="margin-top: 20px;">
                    <tr>
                        <th>شهر</th>
                        <th>یک اس‌پی برابر است با:</th>
                    </tr>
                    <tr>
                        <td>تهران</td>
                        <td>هر ۱۰ هزار تومان</td>
                    </tr>
                    <tr>
                        <td>البرز</td>
                        <td>هر ۸ هزار تومان</td>
                    </tr>
                    <tr>
                        <td>اصفهان</td>
                        <td>هر ۷ هزار تومان</td>
                    </tr>
                    <tr>
                        <td>فارس</td>
                        <td>هر ۷ هزار تومان</td>
                    </tr>
                    <tr>
                        <td>خراسان رضوی</td>
                        <td>هر ۶ هزار تومان</td>
                    </tr>
                    <tr>
                        <td>قم</td>
                        <td>هر ۷ هزار تومان</td>
                    </tr>
                    <tr>
                        <td>خوزستان</td>
                        <td>هر ۷ هزار تومان</td>
                    </tr>
                    <tr>
                        <td>آذربایجان شرقی</td>
                        <td>هر ۶ هزار تومان</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 loyal-bottom-description">
                <strong style="color: #0048d9;">نکته مهم:</strong>
                <br>
                <p>
                    توجه داشته باشید برای شمارش تعداد اس‌پی، قیمت سفر رُند به بالا در نظر گرفته می‌شود.
                </p>
            </div>

            <div class="col-md-12 loyal-bottom-description">
                <p>
                    به‌عنوان مثال در استان تهران، برای یک سفر با قیمت ۸۸ هزار تومان، تعداد ۹ اس‌پی محاسبه می‌شود یا در استان قم، برای یک سفر با قیمت ۱۵ هزار تومان، ۳ اس‌پی در نظر گفته می‌شود.
                </p>
            </div>

            <div style="margin-top: 50px;" class="col-md-12 loyal-bottom-description d-flex justify-content-center">
                <p>
                    در هر لیگ شما می‌توانید از جوایز و مزایایی مختص آن لیگ بهره‌مند شوید. این جوایز به‌راحتی از طریق
                    اپلیکیشن در دسترس شما قرار می‌گیرد.
                </p>
            </div>

            <div class="col-md-12 loyal-bottom-description d-flex justify-content-center">
                <p>
                    لیگ رانندگان اسنپ در استان‌های <strong>تهران، البرز، خراسان رضوی، اصفهان، فارس، خوزستان، قم و آذربایجان شرقی </strong> فعال است.
                </p>
            </div>

            <div class="col-md-12 loyal-bottom-description d-flex justify-content-center">
                <p>
                    باتوجه‌به فعالیت <strong> لیگ رانندگان در ۸ استان </strong>ذکرشده، لازم است سفرهایتان در <strong> همین ۸ استان </strong> باشد، در غیر این صورت <strong>لیگ برایتان غیرفعال</strong> خواهد شد.
                </p>
            </div>

            <!--<div class="col-md-12 row loyal-updated-row">-->
            <!--    <div class="col-md-12 loyal-updated-col">-->
            <!--        <a href="https://snapp.ir/driver-app/" class="loyal-updated-btn">-->
            <!--            به‌روزرسانی اپلیکیشن-->
            <!--        </a>-->
            <!--    </div>-->
            <!--</div>-->
            
            <!-- کارت‌های لیگ از لیگ برتر به سبز -->
<div class="league-summary-container">
  <!-- لیگ برتر -->
  <div class="league-card-box">
    <div class="league-card-header header-purple">
      <div>
        <div>لیگ برتر</div>
        <div style="font-weight: normal; font-size: 13px;">بیشتر از ۶۵۰۰ اس‌پی</div>
      </div>
      <img src="<?= $images ?>svg/step-4.svg" alt="icon">
    </div>
    <ul class="league-card-body">
      <li>یک میلیون تومان جایزه نقدی</li>
      <li>۱۶۰ لیتر بنزین معادل ۴۸۰ هزار تومان</li>
      <li> یک میلیون تومان بن خرید اسنپ‌شاپ</li>
     
    </ul>
  </div>

  <!-- لیگ طلایی -->
  <div class="league-card-box">
      <div class="league-card-header header-gold">
      <div>
        <div>لیگ طلایی</div>
        <div style="font-weight: normal; font-size: 13px;">بین ۴۰۰۰ تا ۶۵۰۰ اس‌پی</div>
      </div>
      <img src="<?= $images ?>svg/step-3.svg" alt="icon">
    </div>
    <ul class="league-card-body">
      <li>۸۰ لیتر بنزین معادل ۲۴۰ هزار تومان</li>
          <li>۵۰۰ هزار تومان بن خرید اسنپ‌شاپ</li>
      
      <li style="opacity: 0.3;">جایزه نقدی یک میلیون‌تومانی</li>
    </ul>
  </div>

  <!-- لیگ نقره‌ای -->
  <div class="league-card-box">
    <div class="league-card-header header-silver">
      <div>
        <div>لیگ نقره‌ای</div>
        <div style="font-weight: normal; font-size: 13px;">بین ۱۵۰۰ تا ۴۰۰۰ اس‌پی</div>
      </div>
      <img src="<?= $images ?>svg/step-2.svg" alt="icon">
    </div>
    <ul class="league-card-body">
      <li>۲۰ لیتر بنزین معادل ۶۰ هزار تومان</li>
      <li>۲۵۰ هزار تومان بن خرید اسنپ‌شاپ</li>
      <li style="opacity: 0.3;">جایزه نقدی یک میلیون‌تومانی</li>
    </ul>
  </div>

  <!-- لیگ سبز -->
  <div class="league-card-box">
   <div class="league-card-header header-green">
      <div>
        <div>لیگ سبز</div>
        <div style="font-weight: normal; font-size: 13px;">کمتر از ۱۵۰۰ اس‌پی</div>
      </div>
      <img src="<?= $images ?>svg/step-1.svg" alt="icon">
    </div>
    <ul class="league-card-body">
      <li>تسهیلات باشگاه رانندگان اسنپ</li>
      <li>۱۵۰ هزار تومان بن خرید اسنپ‌شاپ (حداقل خرید ٣٠٠  هزار تومان)</li>
      <li style="opacity: 0.3;">هزینه خرید بنزین</li>
      <li style="opacity: 0.3;">یک میلیون تومان جایزه نقدی</li>
      <li style="opacity: 0.3;">بن خرید اسنپ‌شاپ</li>

    </ul>
  </div>
</div>


  <!-- مثال بیرون از کارت -->
  <div class="text-end mt-3" >
    <p style="margin: 0   text-align: center;;">
      اگر در ماه‌های تیر و مرداد در لیگ برتر قرار بگیرید، در ابتدای ماه شهریور عنوان کاپیتانی به شما تعلق می‌گیرد و امکان دریافت وام ۴۰ میلیون‌تومانی یا جایزه نقدی ۴ میلیون‌تومانی را دارید.
    </p>
  </div>
</div>

<div class="col-md-12 ">
                <div class="loyal-benefit">

                    <div class="loyal-benefit-header">
                        <h2>جوایز و مزایای هر لیگ</h2>
                    </div>

                    <swiper-slider :images="['<?= $images . 'benefit/step-1.png' ?>', '<?= $images . 'benefit/step-2.png' ?>', '<?= $images . 'benefit/step-3.png' ?>', '<?= $images . 'benefit/step-4.png' ?>']" :icons="['<?= $images . 'benefit/icon/step-benf-1.svg' ?>', '<?= $images . 'benefit/icon/step-benf-2.svg' ?>', '<?= $images . 'benefit/icon/step-benf-3.svg' ?>', '<?= $images . 'benefit/icon/step-benf-4.svg' ?>']"></swiper-slider>

                    <p class="loyal-benefit-alert">
                        فرصت ثبت درخواست و استفاده از <strong style="color: black;">جایزه نقدی و بنزین</strong> تا روز <strong>دهم هر ماه</strong> است.
                    </p>

                   

                    <p class="loyal-benefit-alert">
                        فرصت ثبت درخواست <strong style="color: black;">جوایز اسنپ‌شاپ (لیگ نقره‌ای، طلایی و برتر)</strong> تا <strong>روز دهم هر ماه</strong> و مهلت استفاده از این جوایز تا <strong>پایان ماه</strong> است.
                    </p>
                        
                     <p class="loyal-benefit-alert">
                        فرصت ثبت درخواست <strong style="color: black;">  جایزه کاپیتانی  </strong> تا <strong>روز دهم هر ماه</strong> با ثبت درخواست داخل اپلیکیشن<strong> است.</strong> 
                    </p>
                    <p class="loyal-benefit-alert"> درصورتی که امتیاز کاربر راننده ۴.۷ باشد، از روز ۱۱ تا ۱۵ هر ماه جایزه نقدی کاپیتانی واریز می‌شود.</p>
                    
                    

                    <!-- <p class="loyal-benefit-alert">
                        فرصت ثبت درخواست <strong style="color: black;">جایزه کاپیتانی</strong> تا <strong>  روز دهم هر ماه با ثبت درخواست داخل اپلیکیشن  </strong>  است.
                    </p> -->
                  

                </div>
            </div>



<!-- استایل‌های موبایل واکنش‌گرا -->
<style>
.capitan-box {
  background-color: #f5f6f7;
  border-radius: 12px;
  padding: 16px;
}

.league-benefits-box {
  background-color: #ffffff;
  border-radius: 12px;
  padding: 16px;
}

/* موبایل: ستون عمودی */
@media (max-width: 768px) {
  .d-flex {
    flex-direction: column !important;
  }
}
</style>



<!-- ویدیو وسط‌چین -->
<div class="col-md-12 text-center mb-5">
    <video class="video" controls poster="https://club.snapp.ir/wp-content/uploads/2025/06/Video.jpg"
           style="width: 100%; max-width: 720px; border-radius: 10px;">
        <source src="https://club.snapp.ir/wp-content/uploads/2025/06/Cover.mp4" type="video/mp4">
        مرورگر شما از پخش ویدیو پشتیبانی نمی‌کند.
    </video>
</div>

</div>


<!-- Existing "نحوه فعالیت در لیگ رانندگان اسنپ" section -->
<div class="col-md-12 loyal-cta">
    <div class="loyal-cta-header">
        <h2>نحوه فعالیت در لیگ رانندگان اسنپ</h2>
    </div>
    <!-- ... rest of the existing code ... -->
</div>

<style>
    .loyal-video-section {
        background-color: #a2d2ff; /* رنگ یکنواخت به جای گرادیان */
        padding: 20px;
        border-radius: 10px;
        overflow: hidden;
    }
    .loyal-video video {
        border-radius: 10px;
        overflow: hidden;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
    }
    /* استایل ریسپانسیو برای موبایل */
    @media (max-width: 768px) {
        .loyal-video-section {
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 10px;
        }
        .loyal-video video {
            max-width: 100%; /* اطمینان از پر شدن عرض در موبایل */
            margin: 10px auto;
        }
        .loyal-video h2 {
            font-size: 1.2rem; /* کاهش اندازه فونت عنوان در موبایل */
            text-align: center;
        }
    }
</style>
                <div class="row">
                    <div class="col-md">
                        <div class="loyal-cta-body">
                            <!--<div class="loyal-cta-img">-->
                            <!--    <img src="<?= $images . 'cta/cta-1.png' ?>" alt="">-->
                            <!--</div>-->

    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 40px; margin: 70px auto; max-width: 1000px;">
  <!-- 🎁 روش دریافت جایزه -->
  <div style="flex: 1 1 400px; max-width: 480px; text-align: center;">
    <img src="https://club.snapp.ir/wp-content/themes/jannah-child/templates/loyalty/assets/images/cta/cta-1.png" alt="جایزه لیگ" style="width: 500px; margin-bottom: 20px;">
    <h3 style="font-size: 30px; font-weight: bold; margin-bottom: 10px;">روش دریافت جایزه هر لیگ</h3>
    <p style="font-size: 25px; line-height: 1.8; color: #333;">
      برای دریافت جوایز لیگ فعال خود، در صفحه اصلی اپلیکیشن گزینه منو (سه خط بالای اپلیکیشن) را لمس کرده و وارد لیگ رانندگان اسنپ شوید. در صورت داشتن شرط امتیاز حداقل ۴.۷ می‌توانید جایزه مورد نظرتان را انتخاب کرده و درخواست دهید.
    </p>
  </div>

  <!-- 💰 روش جمع‌کردن اس‌پی -->
  <div style="flex: 1 1 400px; max-width: 480px; text-align: center;">
    <img src="https://club.snapp.ir/wp-content/themes/jannah-child/templates/loyalty/assets/images/cta/cta-2.png" alt="جمع‌کردن اس‌پی" style="width: 500px; margin-bottom: 20px;">
    <h3 style="font-size: 30px; font-weight: bold; margin-bottom: 10px;">روش جمع‌کردن اس‌پی</h3>
    <p style="font-size: 25px; line-height: 1.8; color: #333;">
      اس‌پی‌های لیگ رانندگان اسنپ بر اساس قیمت سفر و با توجه به استان محل فعالیت به دست می‌آید.
    </p>
  </div>
</div>


                        </div>
                    </div>

                    <!--<div class="col-md-4">-->
                    <!--    <div class="loyal-cta-slider">-->
                    <!--        <swiper-cta :images="['<?= $images . 'cta/cta-slider-1.png' ?>', '<?= $images . 'cta/cta-slider-2.png' ?>', '<?= $images . 'cta/cta-slider-3.png' ?>', '<?= $images . 'cta/cta-slider-4.png' ?>']">-->
                    <!--        </swiper-cta>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
            <div style="max-width: 800px; margin: 60px auto; background: #F5F6F7; padding: 30px 20px; border-radius: 16px; box-shadow: 0 0 10px rgba(0,0,0,0.05); line-height: 2; font-size: 15px; color: #333;">
  <h2 style="font-size: 20px; font-weight: bold; margin-bottom: 20px; color: #7B61FF;">📜 قوانین لیگ رانندگان اسنپ</h2>

  <ul style="padding-right: 20px;">
    <li style="margin-bottom: 14px;">
      باتوجه‌به اینکه لیگ رانندگان اسنپ در ۸ استان تهران، البرز، خراسان رضوی، اصفهان، فارس، خوزستان، قم و آذربایجان شرقی فعال شده، لازم است سفرهایتان در همین ۸ استان باشد، در غیر این صورت لیگ برایتان غیرفعال خواهد شد.
    </li>
    <li style="margin-bottom: 14px;">
      کاربر راننده یک ماه فرصت دارد با انجام سفرهای اسنپی و بر اساس قیمت سفر، اس‌پی کسب کند و در ماه آینده در یکی از لیگ‌ها قرار گرفته و از جوایز آن لیگ استفاده کند.
    </li>
    <li style="margin-bottom: 14px;">
      اس‌پی‌های لیگ رانندگان اسنپ بر اساس قیمت سفر و با توجه به استان محل فعالیت به دست می‌آید.
    </li>
    <li style="margin-bottom: 14px;">
      لازمه قرارگرفتن در هر لیگ، کسب حدنصاب تعداد اس‌پی آن لیگ است.
    </li>
    <li style="margin-bottom: 14px;">
      داشتن حداقل امتیاز ۴.۷ برای دریافت جوایز لیگ فعال الزامی است. اگر امتیاز شما کمتر از ۴.۷ شود امکان استفاده از جوایز لیگ فعال خود را ندارید تا مجدداً به حدنصاب امتیاز برسید.
    </li>
    <li style="margin-bottom: 14px;">
      <strong>*</strong> امتیاز داخل اپلیکیشن، بر اساس امتیازدهی مسافران در ۱۰۰ سفر‌ اخیر شما محاسبه می‌شود.
    </li>
    <li>
      برای قرارگرفتن در جایگاه کاپیتان، لازم است سه ماه متوالی در لیگ برتر قرار بگیرید.
    </li>
  </ul>
</div>

            <div class="col-md-12 loyal-faq">
              
                <div class="loyal-faq-body">
                    <div class="loyal-accordion">
                        <accordion :itemsIcons=" [
                                '<?= $images . 'faq/icons/step-1.svg' ?>', '<?= $images . 'faq/icons/step-2.svg' ?>',
                                '<?= $images . 'faq/icons/step-3.svg' ?>', '<?= $images . 'faq/icons/step-4.svg' ?>
                                ']"></accordion>
                    </div>
                </div>
            </div>
            <!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>سؤالات پرتکرار</title>
  <style>
    body {
      font-family: 'Vazirmatn', sans-serif;
      background: #f7f7f9;
      margin: 0;
      padding: 2rem;
      direction: rtl;
    }
    .faq-section {
      max-width: 800px;
      margin: auto;
      background: white;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    h2 {
      text-align: center;
      color: #333;
    }
    .faq-item {
      margin-bottom: 1rem;
      border-radius: 0.5rem;
      overflow: hidden;
      border: 1px solid #ddd;
    }
    .faq-question {
      background-color: #F2F3F7;
      color: #333;
      border: none;
      padding: 1rem;
      width: 100%;
      text-align: right;
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .faq-question:hover {
      background-color: #e1e1f0;
    }
    .faq-answer {
      max-height: 0;
      overflow: hidden;
      background: #fff;
      padding: 0 1rem;
      transition: max-height 0.4s ease, padding 0.4s ease;
    }
    .faq-item.open .faq-answer {
      max-height: 300px;
      padding: 1rem;
    }
  </style>
</head>
<body>
  <section class="faq-section">
    <h2>سؤالات پرتکرار</h2>

    <div class="faq-item">
      <button class="faq-question">لیگ رانندگان اسنپ چیست؟</button>
      <div class="faq-answer"><p>لیگ رانندگان اسنپ طرحی است برای قدردانی از کاربران راننده فعال و فراهم‌کردن امکان استفاده از مزایایی فراتر از تسهیلات معمول باشگاه رانندگان. در این طرح، کاربران راننده بر اساس استان محل فعالیت و مبلغ سفر، «اس‌پی» دریافت کرده و با توجه به مجموع اس‌پی‌های ماه قبل، در یکی از لیگ‌های اسنپ قرار می‌گیرند و از جوایز ویژه‌ی همان لیگ بهره‌مند می‌شوند.</p></div>
    </div>

    <div class="faq-item">
      <button class="faq-question">اس‌پی چیست؟</button>
      <div class="faq-answer"><p>«اس‌پی» واحد امتیاز لیگ رانندگان اسنپ است. پس از انجام هر سفر، با توجه به مبلغ سفر و استان محل فعالیت، مقدار مشخصی اس‌پی به شما تعلق می‌گیرد. مجموع امتیازهای شما در پایان ماه، جایگاهتان را در لیگ مشخص کرده و میزان جوایز قابل دریافت را تعیین می‌کند.</p></div>
    </div>

    <div class="faq-item">
      <button class="faq-question">چطور وارد لیگ رانندگان اسنپ شوم و جایزه بگیرم؟</button>
      <div class="faq-answer"><p>اگر در یکی از ۸ استان فعال در لیگ رانندگان اسنپ (تهران، البرز، خراسان رضوی، اصفهان، فارس، خوزستان، قم و آذربایجان شرقی) فعالیت می‌کنید، یک ماه فرصت دارید با انجام سفرهای اسنپی، براساس قیمت سفر (قبل از کسر کمیسیون)، اس‌پی جمع‌آوری کنید. در پایان ماه، باتوجه‌‌به مجموع اس‌پی‌هایی که به‌دست آورده‌اید، در یکی از لیگ‌ها قرار می‌گیرید و می‌توانید از جوایز مربوط به همان لیگ استفاده کنید.</p></div>
    </div>

    <div class="faq-item">
      <button class="faq-question">چطور در لیگ رانندگان اس‌پی دریافت کنم؟</button>
      <div class="faq-answer"><p>چرخه کسب امتیاز در لیگ رانندگان یک‌ماهه است. به ازای هر سفر، براساس قیمت سفر (قبل از کسر کمیسیون) و استان محل فعالیتتان، به‌صورت خودکار اس‌پی دریافت می‌کنید. در پایان ماه، مجموع امتیازهای شما محاسبه شده و لیگ نهایی شما مشخص می‌شود. هرچه سفرهای بیشتری انجام دهید، مجموع امتیازهای دریافتی شما بیشتر خواهد شد و جایگاه بالاتری در لیگ رانندگان خواهید داشت.</p></div>
    </div>

    <div class="faq-item">
      <button class="faq-question">حداقل اس‌پی مورد نیاز برای هر لیگ چقدر است؟</button>
      <div class="faq-answer"><p>حداقل اس‌پی موردنیاز هر لیگ به این صورت است:</p>
        <ul>
          <li>لیگ سبز: کمتر از ۱۵۰۰ اس‌پی</li>
          <li>لیگ نقره‌ای: بین ۱۵۰۰ تا ۴۰۰۰ اس‌پی</li>
          <li>لیگ طلایی: بین ۴۰۰۰ تا ۶۵۰۰ اس‌پی</li>
          <li>لیگ برتر: بیشتر از ۶۵۰۰ اس‌پی</li>
        </ul>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question">چرا لیگ من تغییر کرده است؟</button>
      <div class="faq-answer"><p>جایگاه شما در لیگ رانندگان به‌صورت ماهانه محاسبه می‌شود و ابتدای هر ماه باتوجه‌به اس‌پی‌هایی که در ماه قبل دریافت کرده‌اید، وارد یکی از لیگ‌های سبز، نقره‌ای، طلایی و برتر می‌شوید.</p></div>
    </div>

    <div class="faq-item">
      <button class="faq-question">چقدر فرصت دارم از جوایز لیگ رانندگان هر ماه استفاده کنم؟</button>
      <div class="faq-answer"><p>فرصت ثبت درخواست و استفاده از جایزه نقدی و بنزین تا روز دهم هر ماه است. فرصت ثبت درخواست جایزه اسنپ‌شاپ (لیگ نقره‌ای، طلایی و برتر) تا روز دهم هر ماه و مهلت استفاده از این جوایز تا پایان ماه است. فرصت ثبت درخواست جایزه کاپیتانی نیز تا روز دهم هر ماه انجام می‌شود. همچنین جایزه نقدی کاپیتانی بین روزهای ۱۱ تا ۱۵ همان ماه واریز خواهد شد. توجه داشته باشید برای فعال شدن جوایز، امتیاز شما در اپلیکیشن رانندگان اسنپ باید حداقل ۴.۷ باشد.</p></div>
    </div>

    <div class="faq-item">
      <button class="faq-question">چطور می‌توانم از جوایز لیگ رانندگان اسنپ استفاده کنم؟</button>
      <div class="faq-answer">
        <ol>
          <li>وارد اپلیکیشن رانندگان اسنپ شوید.</li>
          <li>روی سه خط افقی بالای صفحه (سمت راست) بزنید و وارد بخش لیگ فعال خود شوید.</li>
          <li>مشاهده جوایز لیگ را انتخاب کنید.</li>
          <li>برای هر جایزه، درخواست ثبت کنید.</li>
        </ol>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question">چطور می‌توانم جوایزی را که درخواستشان را ثبت کرده‌ام ببینم؟</button>
      <div class="faq-answer"><p>برای مشاهده جوایزی که هر ماه درخواست داده‌اید کافی است وارد اپلیکیشن رانندگان اسنپ شده و به بخش لیگ رانندگان بروید. سپس روی گزینه «مشاهده جوایز دریافتی» بزنید تا فهرست تمام جایزه‌های فعال‌شده ماه فعلی‌تان نمایش داده شود. اگر هنوز از کدهای تخفیف خود استفاده نکرده‌اید، می‌توانید از همین بخش به آن‌ها دسترسی داشته باشید. توجه داشته باشید که فرصت ثبت درخواست بنزین و کد تخفیف اسنپ‌شاپ تا روز دهم ماه و مهلت استفاده از آن‌ها تا پایان همان ماه خواهد بود.</p></div>
    </div>

    <div class="faq-item">
      <button class="faq-question">در صورت بروز هرگونه مشکل و سوال از چه طریقی اقدام کنم؟</button>
      <div class="faq-answer"><p>سؤالات یا مشکلات احتمالی را از طریق ثبت درخواست در اپلیکیشن رانندگان اسنپ یا از طریق تماس با تیم پشتیبانی اسنپ مطرح کنید.</p></div>
    </div>

    <div class="faq-item">
      <button class="faq-question">چقدر بعد از ثبت درخواست جوایزم را دریافت می‌کنم؟</button>
      <div class="faq-answer"><p>هزینه خرید بنزین حداکثر یک روز پس از ثبت درخواست، به اعتبار اسنپی‌تان در اپلیکیشن رانندگان اسنپ اضافه می‌شود. کد تخفیف را هم در لحظه ثبت درخواست، می‌توانید دریافت کنید. برای استفاده از کدهای تخفیف فعالتان می‌توانید از بخش «مشاهده جوایز دریافتی» به آن‌ها دسترسی داشته باشید.</p></div>
    </div>

    <div class="faq-item">
      <button class="faq-question">چطور از کد تخفیف اسنپ‌شاپ استفاده کنم؟</button>
      <div class="faq-answer">
        <ul>
          <li>کد تخفیف فقط با شماره فعال حساب راننده شما در اسنپ قابل استفاده است.</li>
          <li>مهلت درخواست کد تخفیف تا روز دهم هر ماه است.</li>
          <li>فرصت استفاده از کد تا پایان همان ماه شمسی است.</li>
          <li>در صورت باقی‌بودن مهلت و عدم اعمال کد، از بخش پشتیبانی درخواست ثبت کنید.</li>
        </ul>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question">هنوز از سقف کد تخفیف اسنپ‌شاپ استفاده نکرده‌ام. می‌توانم دوباره با همان کد، خرید کنم؟</button>
      <div class="faq-answer"><p>چنانچه یک‌بار از کد تخفیف خود استفاده کرده‌اید این کد دیگر قابل‌استفاده نیست. برای استفاده از کد تخفیف اسنپ‌شاپ، لازم است همه خریدهایتان را در یک نوبت انجام دهید. توجه داشته باشید مهلت ثبت درخواست کد تخفیف اسنپ‌شاپ تا روز دهم هر ماه و فرصت استفاده از آن تا پایان همان ماه شمسی است.</p></div>
    </div>

    <div class="faq-item">
      <button class="faq-question">جایگاه کاپیتان چیست و چگونه می‌توانم کاپیتان شوم؟</button>
      <div class="faq-answer"><p>جایگاه کاپیتان، ویژه کاربران راننده فعالی است که سه ماه متوالی در لیگ برتر قرار بگیرند. به طور مثال، اگر در ماه‌های تیر، مرداد و شهریور در لیگ برتر قرار بگیرید، در ابتدای ماه مهر کاپیتان می‌شوید. تا زمانی که در ماه‌های بعد نیز لیگ برتری بمانید، جایگاه کاپیتانی شما تثبیت می‌شود.</p></div>
    </div>

    <div class="faq-item">
      <button class="faq-question">وام کاپیتانی چیست و چگونه می‌توانم درخواست دهم؟</button>
      <div class="faq-answer">
        <ul>
          <li>جایزه نقدی ۴ میلیون تومانی</li>
          <li>وام قرض‌الحسنه ۴۰ میلیون تومانی بانک رسالت با بازپرداخت ۱۲ ماهه</li>
        </ul>
        <p>اعطای امتیاز دریافت وام توسط لیگ رانندگان انجام می‌شود و نهایی‌شدن آن منوط به فرآیندهای بانکی است.</p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question">چرا جوایز لیگ رانندگانم غیرفعال است؟</button>
      <div class="faq-answer"><p>در بازه زمانی ۱ تا ۱۰ هر ماه، فقط جوایز لیگی که در آن هستید برایتان فعال می‌شود. ابتدا مطمئن شوید که لیگ درست را انتخاب کرده‌اید. اگر با وجود انتخاب لیگ درست هنوز جوایز غیرفعال هستند، ممکن است به دلایل زیر باشد:</p>
        <ul>
          <li>امتیاز کمتر از ۴.۷: جوایز زمانی فعال می‌شوند که امتیازتان در اپلیکیشن رانندگان به حد نصاب ۴.۷ برسد.</li>
          <li>نقض قوانین اسنپ: بعضی از کاربران راننده به دلیل نقض قوانین اسنپ ممکن است امکان مشاهده لیگ و جوایز را نداشته باشند.</li>
        </ul>
        <p>به محض برطرف شدن این موارد و حفظ عملکردتان در ماه بعد، جوایز دوباره برای شما فعال خواهند شد.</p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question">چه سفرهای بین‌استانی شامل اس‌اپی می‌شود؟</button>
      <div class="faq-answer"><p>اس‌پی به سفرهای بین‌استانی تعلق می‌گیرد که مبدأ آن‌ها در شهرهای تحت پوشش لیگ رانندگان (هشت شهر فعال) باشد. توجه داشته باشید حداکثر امتیاز دریافتی برای هر سفر بین‌استانی ۵۰ اس‌پی است.</p></div>
    </div>

  </section>
  <script>
    document.querySelectorAll('.faq-question').forEach(btn => {
      btn.addEventListener('click', () => {
        btn.parentElement.classList.toggle('open');
      });
    });
  </script>
</body>
</html>

            <div class="col-md-12 loyal-comments">
                <?php
                /**
                 * TieLabs/before_post_components hook.
                 *
                 * @hooked tie_after_post_entry_ad - 5
                 */
                do_action('TieLabs/before_post_components');
                ?>

                <div class="post-components">

                    <?php
                    /**
                     * TieLabs/post_components hook.
                     *
                     * @hooked tie_post_about_author - 10
                     * @hooked tie_post_newsletter - 20
                     * @hooked tie_post_next_prev - 30
                     * @hooked tie_related_posts - 40
                     * @hooked tie_post_comments - 50
                     * @hooked tie_related_posts - 60
                     */
                    do_action('TieLabs/post_components');
                    ?>

                </div><!-- .post-components /-->

                <?php
                /**
                 * TieLabs/after_post_components hook.
                 */
                do_action('TieLabs/after_post_components');
                ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>