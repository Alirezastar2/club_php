<?php
/*
Template Name: Kids_Day_Landing
*/
if (!defined('ABSPATH')) { exit; }

get_header();
// enqueue CSS directly for this template if theme doesn't handle it
wp_enqueue_style(
	'child-day-css',
	get_stylesheet_directory_uri() . '/landings_assets/css/child-day.css',
	[],
	'1.0.1'
);
?>

<!-- CSS inline برای جلوگیری از فلیکر - در head -->
<style>
body { background: #248A4A !important; color: #ffffff !important; }
.child-day-landing { background: #248A4A !important; }
html { background: #248A4A !important; }
/* اطمینان از نمایش آیکون‌های تزئینی */
.decor-right, .decor-right-2, .decor-right-3 { 
  position: absolute !important; 
  z-index: 5 !important; 
  display: block !important; 
}
.decor-right { top: 40% !important; right: 10px !important; }
.decor-right-2 { top: 70% !important; left: 10px !important; }
.decor-right-3 { top: 80% !important; right: 10px !important; }
/* نوار پیشرفت پلیر - اجباری برای نمایش واضح در لایو */
.player-progress{ background:#ffffff !important; height:6px !important; border-radius:999px !important; margin-top:2px !important; display:block !important; overflow:hidden; position:relative; z-index:10002; }
.player-progress>.bar{ background:#22a5ff !important; height:100% !important; width:0%; position:absolute; left:0; top:0; bottom:0; }
 /* چسباندن خط زیرِ ردیف دکمه‌ها */
 .player-row{ padding-bottom:8px !important; }
 .player-progress{ margin-top:0 !important; height:4px !important; }
 /* تضمین نمایش خط با کنتراست بالاتر */
 .player-card .player-progress{ background: rgba(255,255,255,0.9) !important; box-shadow: 0 0 0 1px rgba(0,0,0,0.08) inset !important; }
 .player-card .player-progress>.bar{ background: #2fb4ff !important; }
 /* تنظیمات مخصوص موبایل برای audio controls */
 @media (max-width: 768px) {
   .player-card audio[controls] {
     display: block !important;
     width: 100% !important;
     margin-top: 10px !important;
     background: rgba(255,255,255,0.1) !important;
     border-radius: 8px !important;
   }
   /* تضمین نمایش پلیر در موبایل */
   .player-card {
     display: flex !important;
     visibility: visible !important;
     opacity: 1 !important;
     position: relative !important;
     z-index: 99999 !important;
     pointer-events: auto !important;
     touch-action: manipulation !important;
   }
   
   /* تضمین کلیک‌پذیری دکمه‌ها */
   .player-card .player-btn {
     pointer-events: auto !important;
     touch-action: manipulation !important;
     z-index: 100000 !important;
     position: relative !important;
   }
 }
        /* فقط در این لندینگ: منوی موبایل پنهان، منوی دسکتاپ نمایش */
        @media (max-width: 767px){
          /* عدم نمایش منوی بالای سایت در موبایل فقط برای این لندینگ */
          .site-header,
          .main-nav-wrapper,
          #main-nav,
          .main-menu-wrapper,
          .menu-components-wrap,
          .mobile-header-components,
          .header-layout-1-logo { display: none !important; }
          .main-nav-wrapper { height: 0 !important; overflow: hidden !important; }
        }
        @media (min-width: 768px){
          .site-header .main-nav,
          .site-header .desktop-menu { display: block !important; }
        }
</style>

<!-- Force mobile/WebView button background (highest priority in page) -->
<style>
.child-day-landing .upload-cta .upload-btn,
.child-day-landing .upload-cta .upload-btn:link,
.child-day-landing .upload-cta .upload-btn:visited,
.child-day-landing .upload-cta .upload-btn:hover,
.child-day-landing .upload-cta .upload-btn:active{ 
  background:#1BB8FF !important; 
  color:#FFF !important; 
  display:block !important; 
  width:100% !important; 
  min-height:48px !important; 
  padding:12px 16px !important; 
  border-radius:12px !important; 
  text-decoration:none !important; 
  -webkit-appearance:none !important; 
  appearance:none !important; 
  -webkit-tap-highlight-color: transparent;
}
</style>

<!-- CSS مستقیماً برای اطمینان از لود شدن -->
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/landings_assets/css/child-day.css'; ?>" type="text/css" media="all" />

<main class="child-day-landing" role="main" aria-labelledby="headline">
	<section class="child-day-hero">
		<div class="hero-banner" aria-hidden="true">
			<picture>
				<!-- موبایل -->
					<source media="(max-width: 767px)" srcset="https://club.snapp.ir/wp-content/uploads/2025/10/Visual.png" sizes="100vw">
				<!-- دسکتاپ -->
					<source media="(min-width: 768px)" srcset="https://club.snapp.ir/wp-content/uploads/2025/10/Desktop-Banner.png" sizes="100vw">
					<img src="https://club.snapp.ir/wp-content/uploads/2025/10/Desktop-Banner.png" alt="" loading="eager" decoding="async" />
			</picture>
		</div>
		
		<p class="child-desc">مامان و بابای مهربون، توی این صفحه ۷ شب، ۷ تا قصه‌ گفته می‌شه. هر شب باید قصه‌ی جدید رو برای کودک عزیز و خلاقتون پخش کنین، کمکش کنین معما رو حل کنه و در نهایت روز هفتم، نقاشی‌ای که از نقشه‌ی «شلغم‌رود» کشیده رو توی همین صفحه آپلود کنین تا بتونه توی قرعه‌کشی شرکت کنه. ۱۰ تا جایزه‌ی جذاب، در انتظار ۱۰ تا کودکیه که کامل‌ترین نقاشی رو برامون بفرستن.</p>
		<p class="child-cta">آماده‌این؟ برای شروع «مقدمه» رو همراه با کودکتون بشنوین.</p>
		<div class="decor-right" aria-hidden="true">
			<img src="https://club.snapp.ir/wp-content/uploads/2025/10/01.svg" alt="" />
		</div>
		<div class="decor-right-2" aria-hidden="true">
			<img src="https://club.snapp.ir/wp-content/uploads/2025/10/5.svg" alt="" />
		</div>
		<div class="decor-right-3" aria-hidden="true">
			<img src="https://club.snapp.ir/wp-content/uploads/2025/10/Moon.svg" alt="" />
		</div>
		<!-- آیکون 04 موقتاً مخفی شد -->
		<!-- <div class="decor-right-2" aria-hidden="true">
			<img src="https://club.snapp.ir/wp-content/uploads/2025/10/04.svg" alt="" />
		</div> -->
	</section>
	
	<!-- پلیر مقدمه -->
	<section class="player-card" dir="rtl" aria-label="پلیر مقدمه">
		<div class="player-row">
			<div class="player-title">مقدمه</div>
			<div class="player-actions">
				<button class="player-btn fav" aria-label="علاقه‌مندی"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/Like-none.svg" alt="" width="20" height="20"/></button>
				<button class="player-btn play" id="playBtn" aria-label="پخش/توقف"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/play-Circle.svg" alt="" width="20" height="20"/></button>
				<button class="player-btn download" id="downloadBtn" aria-label="دانلود"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/import.svg" alt="" width="20" height="20"/></button>
			</div>
		</div>
		<!-- نوار پیشرفت به جای خط جداکننده -->
		<div class="player-progress" id="progress">
			<div class="bar" id="bar"></div>
		</div>
		<div class="player-times"><span id="curTime">00:00</span><span id="durTime">00:00</span></div>
		<audio id="audio" preload="auto" crossorigin="anonymous" playsinline webkit-playsinline src="https://club.snapp.ir/wp-content/uploads/2025/10/E00.mp3"></audio>
	</section>
	
    <!-- کارت‌های قصه‌ها -->
    <!-- قصه اول: پلیر به جای قفل (بدون تایمر بالایش) -->
    <section class="player-card" dir="rtl" aria-label="پلیر قصه اول">
        <div class="player-row">
            <div class="player-title">قصه‌ی اول</div>
            <div class="player-actions">
                <button class="player-btn fav" aria-label="علاقه‌مندی"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/Like-none.svg" alt="" width="20" height="20"/></button>
                <button class="player-btn play" aria-label="پخش/توقف"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/play-Circle.svg" alt="" width="20" height="20"/></button>
                <button class="player-btn download" aria-label="دانلود"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/import.svg" alt="" width="20" height="20"/></button>
            </div>
        </div>
        <!-- نوار پیشرفت به جای خط جداکننده -->
        <div class="player-progress" id="progress2">
            <div class="bar" id="bar2"></div>
        </div>
        <div class="player-times"><span id="curTime2">00:00</span><span id="durTime2">00:00</span></div>
        <audio id="audio2" preload="auto" crossorigin="anonymous" playsinline webkit-playsinline src="https://club.snapp.ir/wp-content/uploads/2025/10/E1.mp3"></audio>
    </section>
    
	<!-- قصه دوم: پلیر جدید -->
	<section class="player-card" dir="rtl" aria-label="پلیر قصه دوم">
		<div class="player-row">
			<div class="player-title">قصه‌ی دوم</div>
			<div class="player-actions">
				<button class="player-btn fav" aria-label="علاقه‌مندی"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/Like-none.svg" alt="" width="20" height="20"/></button>
				<button class="player-btn play" aria-label="پخش/توقف"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/play-Circle.svg" alt="" width="20" height="20"/></button>
				<button class="player-btn download" aria-label="دانلود"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/import.svg" alt="" width="20" height="20"/></button>
			</div>
		</div>
		<!-- نوار پیشرفت به جای خط جداکننده -->
		<div class="player-progress" id="progress3">
			<div class="bar" id="bar3"></div>
		</div>
		<div class="player-times"><span id="curTime3">00:00</span><span id="durTime3">00:00</span></div>
		<audio id="audio3" preload="auto" crossorigin="anonymous" playsinline webkit-playsinline src="https://club.snapp.ir/wp-content/uploads/2025/10/E2.mp3"></audio>
	</section>
	<!-- قصه سوم: پلیر جدید -->
	<section class="player-card" dir="rtl" aria-label="پلیر قصه سوم">
		<div class="player-row">
			<div class="player-title">قصه‌ی سوم</div>
			<div class="player-actions">
				<button class="player-btn fav" aria-label="علاقه‌مندی"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/Like-none.svg" alt="" width="20" height="20"/></button>
				<button class="player-btn play" aria-label="پخش/توقف"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/play-Circle.svg" alt="" width="20" height="20"/></button>
				<button class="player-btn download" aria-label="دانلود"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/import.svg" alt="" width="20" height="20"/></button>
			</div>
		</div>
		<!-- نوار پیشرفت به جای خط جداکننده -->
		<div class="player-progress" id="progress4">
			<div class="bar" id="bar4"></div>
		</div>
		<div class="player-times"><span id="curTime4">00:00</span><span id="durTime4">00:00</span></div>
		<audio id="audio4" preload="auto" crossorigin="anonymous" playsinline webkit-playsinline src="https://club.snapp.ir/wp-content/uploads/2025/10/E3.mp3"></audio>
	</section>
     <!-- قصه چهارم: پلیر جدید -->
     <section class="player-card" dir="rtl" aria-label="پلیر قصه چهارم">
         <div class="player-row">
             <div class="player-title">قصه‌ی چهارم</div>
             <div class="player-actions">
                 <button class="player-btn fav" aria-label="علاقه‌مندی"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/Like-none.svg" alt="" width="20" height="20"/></button>
                 <button class="player-btn play" aria-label="پخش/توقف"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/play-Circle.svg" alt="" width="20" height="20"/></button>
                 <button class="player-btn download" aria-label="دانلود"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/import.svg" alt="" width="20" height="20"/></button>
             </div>
         </div>
         <!-- نوار پیشرفت به جای خط جداکننده -->
         <div class="player-progress" id="progress5">
             <div class="bar" id="bar5"></div>
         </div>
         <div class="player-times"><span id="curTime5">00:00</span><span id="durTime5">00:00</span></div>
         <audio id="audio5" preload="auto" crossorigin="anonymous" playsinline webkit-playsinline src="https://club.snapp.ir/wp-content/uploads/2025/10/E4.mp3"></audio>
     </section>
     
    <!-- قصه پنجم: پلیر جدید -->
    <section class="player-card" dir="rtl" aria-label="پلیر قصه پنجم">
        <div class="player-row">
            <div class="player-title">قصه‌ی پنجم</div>
            <div class="player-actions">
                <button class="player-btn fav" aria-label="علاقه‌مندی"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/Like-none.svg" alt="" width="20" height="20"/></button>
                <button class="player-btn play" aria-label="پخش/توقف"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/play-Circle.svg" alt="" width="20" height="20"/></button>
                <button class="player-btn download" aria-label="دانلود"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/import.svg" alt="" width="20" height="20"/></button>
            </div>
        </div>
        <!-- نوار پیشرفت به جای خط جداکننده -->
        <div class="player-progress" id="progress6">
            <div class="bar" id="bar6"></div>
        </div>
        <div class="player-times"><span id="curTime6">00:00</span><span id="durTime6">00:00</span></div>
        <audio id="audio6" preload="auto" crossorigin="anonymous" playsinline webkit-playsinline src="https://club.snapp.ir/wp-content/uploads/2025/10/E5.mp3"></audio>
    </section>
    
	<!-- قصه ششم: پلیر جدید -->
	<section class="player-card" dir="rtl" aria-label="پلیر قصه ششم">
		<div class="player-row">
			<div class="player-title">قصه‌ی ششم</div>
			<div class="player-actions">
				<button class="player-btn fav" aria-label="علاقه‌مندی"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/Like-none.svg" alt="" width="20" height="20"/></button>
				<button class="player-btn play" aria-label="پخش/توقف"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/play-Circle.svg" alt="" width="20" height="20"/></button>
				<button class="player-btn download" aria-label="دانلود"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/import.svg" alt="" width="20" height="20"/></button>
			</div>
		</div>
		<!-- نوار پیشرفت به جای خط جداکننده -->
		<div class="player-progress" id="progress7">
			<div class="bar" id="bar7"></div>
		</div>
		<div class="player-times"><span id="curTime7">00:00</span><span id="durTime7">00:00</span></div>
		<audio id="audio7" preload="auto" crossorigin="anonymous" playsinline webkit-playsinline src="https://club.snapp.ir/wp-content/uploads/2025/10/E6.mp3"></audio>
	</section>
    <!-- تایمر شمارش معکوس: بالای قصه هفتم -->
    <!--
    <div class="countdown-wrap">
        <div class="countdown" data-countdown data-target-time="18:00">
            <span class="dot"></span>
            <span class="time">00:00:00</span>
        </div>
        <div class="countdown-text">منتظر قصه بعدی باشید!</div>
    </div>
    -->
    
    <!-- قصه هفتم: پلیر جدید -->
    <section class="player-card" dir="rtl" aria-label="پلیر قصه هفتم">
        <div class="player-row">
            <div class="player-title">قصه‌ی هفتم</div>
            <div class="player-actions">
                <button class="player-btn fav" aria-label="علاقه‌مندی"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/Like-none.svg" alt="" width="20" height="20"/></button>
                <button class="player-btn play" aria-label="پخش/توقف"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/play-Circle.svg" alt="" width="20" height="20"/></button>
                <button class="player-btn download" aria-label="دانلود"><img src="https://club.snapp.ir/wp-content/uploads/2025/10/import.svg" alt="" width="20" height="20"/></button>
		</div>
		</div>
        <!-- نوار پیشرفت به جای خط جداکننده -->
        <div class="player-progress" id="progress8">
            <div class="bar" id="bar8"></div>
		</div>
        <div class="player-times"><span id="curTime8">00:00</span><span id="durTime8">00:00</span></div>
        <audio id="audio8" preload="auto" crossorigin="anonymous" playsinline webkit-playsinline src="https://club.snapp.ir/wp-content/uploads/2025/10/E7.mp3"></audio>
	</section>

	<!-- CTA آپلود نقاشی: زیر قصه هفتم -->
	<section class="upload-cta" dir="rtl" aria-label="ارسال نقاشی">
		<p class="upload-text">حالا که نقشه‌ی «شلغم‌رود» کامل شده، نقاشی‌تون رو برامون بفرستین.</p>
		<a id="uploadBtn" class="upload-btn" href="https://snapp.porsline.ir/s/8eCXGgS" rel="noopener" target="_blank">ارسال نقاشی</a>
	</section>
</main>

<!-- اسکریپت‌های مورد نیاز -->
<script src="<?php echo esc_url( get_stylesheet_directory_uri() . '/landings_assets/js/countdown.js' ); ?>"></script>

<!-- سیستم آمارگیری پلیرها - نسخه مستقل -->
<script>
// سیستم آمار پلیرها - نسخه مستقل
(function() {
    'use strict';
    
    // تنظیمات
    const ANALYTICS_CONFIG = {
        endpoint: '/analytics-handler.php',
        debug: true
    };
    
    // کلاس اصلی ردیابی
    class PlayerAnalyticsStandalone {
        constructor() {
            this.sessionId = this.generateSessionId();
            this.init();
        }
        
        // تولید شناسه جلسه
        generateSessionId() {
            return 'session_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
        }
        
        // مقداردهی اولیه
        init() {
            this.bindEvents();
            if (ANALYTICS_CONFIG.debug) {
                console.log('Player Analytics Standalone initialized with session:', this.sessionId);
            }
        }
        
        // اتصال رویدادها
        bindEvents() {
            // ردیابی کلیک‌های دکمه پخش
            document.addEventListener('click', (e) => {
                if (e.target.closest('.player-btn.play')) {
                    this.trackPlayClick(e.target.closest('.player-card'));
                }
            });
            
            // ردیابی کلیک‌های دکمه دانلود
            document.addEventListener('click', (e) => {
                if (e.target.closest('.player-btn.download')) {
                    this.trackDownloadClick(e.target.closest('.player-card'));
                }
            });
            
            // ردیابی کلیک‌های دکمه علاقه‌مندی
            document.addEventListener('click', (e) => {
                if (e.target.closest('.player-btn.fav')) {
                    this.trackFavoriteClick(e.target.closest('.player-card'));
                }
            });
            
            // ردیابی شروع پخش صدا
            document.addEventListener('play', (e) => {
                if (e.target.tagName === 'AUDIO' && e.target.closest('.player-card')) {
                    this.trackAudioPlay(e.target.closest('.player-card'));
                }
            });
            
            // ردیابی توقف پخش صدا
            document.addEventListener('pause', (e) => {
                if (e.target.tagName === 'AUDIO' && e.target.closest('.player-card')) {
                    this.trackAudioPause(e.target.closest('.player-card'));
                }
            });
        }
        
        // ردیابی کلیک دکمه پخش
        trackPlayClick(playerCard) {
            const playerData = this.extractPlayerData(playerCard);
            this.recordClick('play_button', playerData);
        }
        
        // ردیابی کلیک دکمه دانلود
        trackDownloadClick(playerCard) {
            const playerData = this.extractPlayerData(playerCard);
            this.recordClick('download_button', playerData);
        }
        
        // ردیابی کلیک دکمه علاقه‌مندی
        trackFavoriteClick(playerCard) {
            const playerData = this.extractPlayerData(playerCard);
            this.recordClick('favorite_button', playerData);
        }
        
        // ردیابی شروع پخش صدا
        trackAudioPlay(playerCard) {
            const playerData = this.extractPlayerData(playerCard);
            this.recordClick('audio_play', playerData);
        }
        
        // ردیابی توقف پخش صدا
        trackAudioPause(playerCard) {
            const playerData = this.extractPlayerData(playerCard);
            this.recordClick('audio_pause', playerData);
        }
        
        // استخراج اطلاعات پلیر
        extractPlayerData(playerCard) {
            const title = playerCard.querySelector('.player-title')?.textContent?.trim() || 'نامشخص';
            const audio = playerCard.querySelector('audio');
            const audioSrc = audio?.src || audio?.currentSrc || '';
            const audioDuration = audio?.duration || 0;
            
            return {
                title: title,
                audioSrc: audioSrc,
                audioDuration: audioDuration,
                timestamp: new Date().toISOString(),
                userAgent: navigator.userAgent,
                screenResolution: `${screen.width}x${screen.height}`,
                viewportSize: `${window.innerWidth}x${window.innerHeight}`,
                isMobile: window.innerWidth <= 768,
                referrer: document.referrer,
                url: window.location.href
            };
        }
        
        // ثبت کلیک
        recordClick(action, playerData) {
            const clickId = this.generateClickId();
            const clickData = {
                id: clickId,
                sessionId: this.sessionId,
                action: action,
                playerData: playerData,
                timestamp: new Date().toISOString()
            };
            
            // ارسال به سرور
            this.sendToServer(clickData);
            
            if (ANALYTICS_CONFIG.debug) {
                console.log('Player click tracked:', clickData);
            }
        }
        
        // تولید شناسه کلیک
        generateClickId() {
            return 'click_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
        }
        
        // ارسال به سرور
        sendToServer(clickData) {
            const formData = new FormData();
            formData.append('action', 'save_click');
            formData.append('data', JSON.stringify(clickData));
            
            fetch(ANALYTICS_CONFIG.endpoint, {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            })
            .then(response => response.text())
            .then(data => {
                if (ANALYTICS_CONFIG.debug) {
                    console.log('Analytics data sent successfully');
                }
            })
            .catch(error => {
                console.error('Failed to send analytics data:', error);
            });
        }
    }
    
    // مقداردهی اولیه
    document.addEventListener('DOMContentLoaded', function() {
        window.playerAnalyticsStandalone = new PlayerAnalyticsStandalone();
    });
    
})();
</script>

<!-- غیرفعال کردن اسکریپت‌های تداخل‌کننده -->
<script>
// فقط حذف jQuery event handlers قدیمی
if (window.jQuery) {
  jQuery(document).ready(function($) {
    $('.player-btn').off('click touchstart touchend');
    $('audio').off('play pause timeupdate loadstart canplay');
  });
}
</script>

<!-- پلیر ما -->
<script src="<?php echo esc_url( get_stylesheet_directory_uri() . '/landings_assets/js/child-player.js' ); ?>"></script>
<script>
// ست کردن لینک دکمه آپلود در صورت وجود متغیر سراسری
(function(){
  var btn = document.getElementById('uploadBtn');
  if (btn && (!btn.getAttribute('href') || btn.getAttribute('href') === '#')) {
    var target = (window && window.UPLOAD_URL) ? window.UPLOAD_URL : '#';
    btn.setAttribute('href', target);
  }
})();
</script>

 <!-- اسکریپت موبایل برای حل مشکل کلیک -->
 <script>
 document.addEventListener('DOMContentLoaded', function() {
   var isMobile = window.innerWidth <= 768;
   
   if (isMobile) {
     console.log('Mobile detected - applying touch fixes');
     
     // حذف همه event listener های قدیمی
     var allPlayBtns = document.querySelectorAll('.player-btn.play');
     allPlayBtns.forEach(function(btn) {
       // حذف event listener های قدیمی
       btn.replaceWith(btn.cloneNode(true));
     });
     
     // اضافه کردن event listener های جدید
     setTimeout(function() {
       var newPlayBtns = document.querySelectorAll('.player-btn.play');
       newPlayBtns.forEach(function(btn) {
         // تنظیمات CSS اجباری
         btn.style.pointerEvents = 'auto !important';
         btn.style.touchAction = 'manipulation !important';
         btn.style.zIndex = '999999 !important';
         btn.style.position = 'relative !important';
         btn.style.display = 'block !important';
         btn.style.visibility = 'visible !important';
         btn.style.opacity = '1 !important';
         
         // event listener برای کلیک
         btn.addEventListener('click', function(e) {
           console.log('Mobile play button clicked');
           e.preventDefault();
           e.stopPropagation();
           e.stopImmediatePropagation();
           
           var audio = btn.closest('.player-card').querySelector('audio');
           var playImg = btn.querySelector('img');
           
           if (audio) {
             console.log('Audio found:', audio.src);
             
             // تغییر آیکون قبل از پخش
             if (audio.paused) {
               // تغییر به pause
               if (playImg) {
                 var src = playImg.getAttribute('src') || '';
                 var lastSlash = src.lastIndexOf('/');
                 var dir = lastSlash > -1 ? src.slice(0, lastSlash + 1) : 'https://club.snapp.ir/wp-content/uploads/2025/10/';
                 playImg.src = dir + 'pause-Circle.svg';
               }
               btn.setAttribute('aria-pressed', 'true');
               
               // نمایش کنترل‌های بومی
               audio.setAttribute('controls', 'controls');
               audio.style.display = 'block';
               audio.style.width = '100%';
               audio.style.marginTop = '10px';
               audio.style.background = 'rgba(255,255,255,0.1)';
               audio.style.borderRadius = '8px';
               audio.style.padding = '8px';
               audio.style.border = '1px solid rgba(255,255,255,0.2)';
               audio.style.zIndex = '999999';
               
               // تلاش برای پخش
               audio.play().then(function() {
                 console.log('Audio playing successfully');
               }).catch(function(error) {
                 console.error('Audio play failed:', error);
                 // برگشت آیکون در صورت شکست
                 if (playImg) {
                   var src = playImg.getAttribute('src') || '';
                   var lastSlash = src.lastIndexOf('/');
                   var dir = lastSlash > -1 ? src.slice(0, lastSlash + 1) : 'https://club.snapp.ir/wp-content/uploads/2025/10/';
                   playImg.src = dir + 'play-Circle.svg';
                 }
                 btn.setAttribute('aria-pressed', 'false');
                 alert('برای پخش صدا، روی دکمه پخش در کنترل‌های صوتی کلیک کنید');
               });
             } else {
               // توقف و تغییر آیکون
               audio.pause();
               if (playImg) {
                 var src = playImg.getAttribute('src') || '';
                 var lastSlash = src.lastIndexOf('/');
                 var dir = lastSlash > -1 ? src.slice(0, lastSlash + 1) : 'https://club.snapp.ir/wp-content/uploads/2025/10/';
                 playImg.src = dir + 'play-Circle.svg';
               }
               btn.setAttribute('aria-pressed', 'false');
             }
           }
         }, { capture: true, passive: false });
         
         // event listener برای لمس
         btn.addEventListener('touchstart', function(e) {
           console.log('Mobile touch start on play button');
           e.preventDefault();
           e.stopPropagation();
           e.stopImmediatePropagation();
         }, { capture: true, passive: false });
         
         btn.addEventListener('touchend', function(e) {
           console.log('Mobile touch end on play button');
           e.preventDefault();
           e.stopPropagation();
           e.stopImmediatePropagation();
           
           // شبیه‌سازی کلیک
           btn.click();
         }, { capture: true, passive: false });
       });
     }, 500);
   }
 });
 </script>

<?php
get_footer();
?>


