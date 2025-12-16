<?php
/**
 * Template Name: Online Support-new
 * Template Post Type: page
 * 
 * صفحه پشتیبانی آنلاین باشگاه رانندگان اسنپ
 * این صفحه شامل منوهای مختلف است که با کلیک روی هر کدام، مودال مربوطه باز می‌شود
 */
defined('ABSPATH') || exit; // Exit if accessed directly

// لود کردن فایل‌های CSS و JS
function enqueue_online_support_assets() {
    // @phpstan-ignore-next-line
    $css_path = get_stylesheet_directory() . '/landings_assets/css/online-support-new.css';
    // @phpstan-ignore-next-line
    $js_path  = get_stylesheet_directory() . '/landings_assets/js/online-support.js';
    $css_ver  = file_exists($css_path) ? filemtime($css_path) : null;
    $js_ver   = file_exists($js_path) ? filemtime($js_path) : null;

    // @phpstan-ignore-next-line
    wp_enqueue_style(
        'online-support-css',
        // @phpstan-ignore-next-line
        get_stylesheet_directory_uri() . '/landings_assets/css/online-support-new.css',
        array(),
        $css_ver
    );

    // @phpstan-ignore-next-line
    wp_enqueue_script(
        'online-support-js',
        // @phpstan-ignore-next-line
        get_stylesheet_directory_uri() . '/landings_assets/js/online-support.js',
        array('jquery'),
        $js_ver,
        true
    );
}
// @phpstan-ignore-next-line
add_action('wp_enqueue_scripts', 'enqueue_online_support_assets');

// @phpstan-ignore-next-line
get_header();

// Helper to build icon URLs from WordPress uploads (spaces -> hyphens, collapse multiple hyphens)
function uploads_icon_url($originalFilename) {
    $base = 'https://club.snapp.ir/wp-content/uploads/2025/08';
    $sanitized = trim($originalFilename);
    // replace any whitespace with hyphen
    $sanitized = preg_replace('/\s+/', '-', $sanitized);
    // collapse multiple hyphens into one
    $sanitized = preg_replace('/-+/', '-', $sanitized);
    return $base . '/' . $sanitized;
}

// Helper for theme icon fallback
function theme_icon_url($filename) {
    // @phpstan-ignore-next-line
    return get_stylesheet_directory_uri() . '/Icon_Kayako/' . $filename;
}

// تنظیمات صفحه
$page_title = 'خدمات پشتیبانی، حالا در اپلیکیشن شما';
$page_description = 'کاربر راننده عزیز، می‌توانید برخی فعالیت‌هایی که پیش از این، از طریق صفحه خدمات غیرحضوری برایشان درخواست ثبت می‌کردید را به طور مستقیم در اپلیکیشن کاربر راننده اسنپ و اسنپ باکس انجام دهید. در ادامه فهرست این خدمات و مسیر دسترسی به آنها را مشاهده می‌کنید.';

// منوهای اصلی
$main_menus = [
    [
        'id' => 'profile-contact',
        'icon' => uploads_icon_url('profile.svg'),
        'fallback_icon' => theme_icon_url('profile.svg'),
        'title' => 'تغییر عکس پروفایل',
        'color' => '#3DA65C',
        'color_light' => '#4CAF50',
        'type' => 'svg'
    ],
    [
        'id' => 'mobile-number',
        'icon' => uploads_icon_url('Change mobile number.svg'),
        'fallback_icon' => theme_icon_url('Change mobile number.svg'),
        'title' => 'تغییر شماره موبایل',
        'color' => '#FF6B35',
        'color_light' => '#FF8A65',
        'type' => 'svg'
    ],
    [
        'id' => 'documents',
        'icon' => uploads_icon_url('Completion of documents.svg'),
        'fallback_icon' => theme_icon_url('Completion of documents.svg'),
        'title' => 'تکمیل مدارک',
        'color' => '#4A90E2',
        'color_light' => '#64B5F6',
        'type' => 'svg'
    ],
    [
        'id' => 'service-change',
        'icon' => uploads_icon_url('User service change.svg'),
        'fallback_icon' => theme_icon_url('User service change.svg'),
        'title' => 'تغییر سرویس کاربری',
        'color' => '#9B59B6',
        'color_light' => '#BA68C8',
        'type' => 'svg'
    ],
    [
        'id' => 'status-register',
        'icon' => uploads_icon_url('Registration of disability status.svg'),
        'fallback_icon' => theme_icon_url('Registration of disability status.svg'),
        'title' => 'ثبت وضعیت معلولیت',
        'color' => '#27AE60',
        'color_light' => '#66BB6A',
        'type' => 'svg'
    ],
    [
        'id' => 'unpaid-fare',
        'icon' => uploads_icon_url('Unpaid rent.svg'),
        'fallback_icon' => theme_icon_url('Unpaid rent.svg'),
        'title' => 'کرایه پرداخت نشده',
        'color' => '#E74C3C',
        'color_light' => '#EF5350',
        'type' => 'svg'
    ],
    [
        'id' => 'lost-items',
        'icon' => uploads_icon_url('Objects left in the car.svg'),
        'fallback_icon' => theme_icon_url('Objects left in the car.svg'),
        'title' => 'اشیاء جامانده در خودرو',
        'color' => '#F39C12',
        'color_light' => '#FFB74D',
        'type' => 'svg'
    ],
    [
        'id' => 'app-support',
        'icon' => uploads_icon_url('In-app support.svg'),
        'fallback_icon' => theme_icon_url('In-app support.svg'),
        'title' => 'پشتیبانی داخل اپلیکیشن',
        'color' => '#3498DB',
        'color_light' => '#42A5F5',
        'type' => 'svg'
    ]
];

// منوهای اسنپ باکس
$snappbox_menus = [
    [
        'id' => 'snappbox-profile-contact',
        'icon' => uploads_icon_url('Change profile picture-box.svg'),
        'fallback_icon' => theme_icon_url('Change profile picture-box.svg'),
        'title' => 'تغییر عکس پروفایل',
        'color' => '#3DA65C',
        'color_light' => '#4CAF50',
        'type' => 'svg'
    ],
    [
        'id' => 'snappbox-mobile-number',
        'icon' => uploads_icon_url('Changing the mobile number - box.svg'),
        'fallback_icon' => theme_icon_url('Changing the mobile number - box.svg'),
        'title' => 'تغییر شماره موبایل',
        'color' => '#FF6B35',
        'color_light' => '#FF8A65',
        'type' => 'svg'
    ],
    [
        'id' => 'snappbox-documents',
        'icon' => uploads_icon_url('Completion of documents - box.svg'),
        'fallback_icon' => theme_icon_url('Completion of documents - box.svg'),
        'title' => 'تکمیل مدارک',
        'color' => '#4A90E2',
        'color_light' => '#64B5F6',
        'type' => 'svg'
    ],
    [
        'id' => 'snappbox-service-change',
        'icon' => uploads_icon_url('Change user service-box.svg'),
        'fallback_icon' => theme_icon_url('Change user service-box.svg'),
        'title' => 'تغییر سرویس کاربری',
        'color' => '#9B59B6',
        'color_light' => '#BA68C8',
        'type' => 'svg'
    ],
    [
        'id' => 'snappbox-app-support',
        'icon' => uploads_icon_url('Support inside the application-box.svg'),
        'fallback_icon' => theme_icon_url('Support inside the application-box.svg'),
        'title' => 'پشتیبانی داخل برنامه',
        'color' => '#3498DB',
        'color_light' => '#42A5F5',
        'type' => 'svg'
    ]
];

// محتوای مودال‌ها
$modal_contents = [
    'profile-contact' => [
        'title' => 'تغییر عکس پروفایل',
        'icon' => uploads_icon_url('profile.svg'),
        'fallback_icon' => theme_icon_url('profile.svg'),
        'color' => '#FFFFFF',
        'color_light' => '#FFFFFF',
        'type' => 'svg',
                        'content' => [
                    '۱. در صفحه اول اپلیکیشن روی گزینه <strong>سه خط</strong> بالا سمت راست بزنید.',
                    '۲. روی تصویر پروفایلتان زده و گزینه «<strong>ویرایش</strong>» را انتخاب کنید.',
                    '۳. روی علامت <strong>قلم کنار عکس پروفایل</strong> بزنید و عکس سلفی بگیرید.'
                ],
                        'primary_button' => 'ورود به اپلیکیشن',
                        'primary_button_link' => 'https://l.snpp.link/profile',
                        'secondary_button' => 'آموزش مرحله به مرحله',
                        'secondary_button_link' => 'https://l.snpp.link/snapp-profile'
    ],
    'mobile-number' => [
        'title' => 'تغییر شماره موبایل',
        'icon' => uploads_icon_url('Change mobile number.svg'),
        'fallback_icon' => theme_icon_url('Change mobile number.svg'),
        'color' => '#FFFFFF',
        'color_light' => '#FFFFFF',
        'type' => 'svg',
        'content' => [
            '۱. وارد اپلیکیشن اسنپ شوید',
            '۲. به بخش تنظیمات بروید',
            '۳. روی "تغییر شماره موبایل" کلیک کنید',
            '۴. شماره جدید را وارد کنید',
            '۵. کد تایید را وارد کنید',
            '۶. تغییرات را تایید کنید'
        ],
        'primary_button' => 'ورود به اپلیکیشن',
        'primary_button_link' => 'https://l.snpp.link/profile',
        'secondary_button' => 'آموزش مرحله به مرحله',
        'secondary_button_link' => 'https://l.snpp.link/snapp-mobile'
    ],
    'documents' => [
        'title' => 'تکمیل مدارک',
        'icon' => uploads_icon_url('Completion of documents.svg'),
        'fallback_icon' => theme_icon_url('Completion of documents.svg'),
        'color' => '#FFFFFF',
        'color_light' => '#FFFFFF',
        'type' => 'svg',
        'content' => [
            'برای تکمیل مدارک خود:',
            '1. وارد اپلیکیشن اسنپ شوید',
            '2. به بخش "مدارک" بروید',
            '3. مدارک ناقص را شناسایی کنید',
            '4. عکس مدارک را آپلود کنید',
            '5. منتظر تایید بمانید'
        ],
        'primary_button' => 'ورود به اپلیکیشن',
        'primary_button_link' => 'https://l.snpp.link/profile',
        'secondary_button' => 'آموزش مرحله به مرحله',
        'secondary_button_link' => 'https://l.snpp.link/snapp-documents'
    ],
    'service-change' => [
        'title' => 'تغییر سرویس کاربری',
        'icon' => uploads_icon_url('User service change.svg'),
        'fallback_icon' => theme_icon_url('User service change.svg'),
        'color' => '#FFFFFF',
        'color_light' => '#FFFFFF',
        'type' => 'svg',
        'content' => [
            'برای تغییر سرویس کاربری:',
            '1. وارد اپلیکیشن اسنپ شوید',
            '2. به بخش "تنظیمات سرویس" بروید',
            '3. سرویس مورد نظر را انتخاب کنید',
            '4. شرایط جدید را مطالعه کنید',
            '5. تغییرات را تایید کنید'
        ],
        'primary_button' => 'ورود به اپلیکیشن',
        'primary_button_link' => 'https://l.snpp.link/profile',
        'secondary_button' => 'آموزش مرحله به مرحله',
        'secondary_button_link' => 'https://l.snpp.link/snapp-vehicle'
    ],
    'status-register' => [
        'title' => 'ثبت وضعیت معلولیت',
        'icon' => uploads_icon_url('Registration of disability status.svg'),
        'fallback_icon' => theme_icon_url('Registration of disability status.svg'),
        'color' => '#FFFFFF',
        'color_light' => '#FFFFFF',
        'type' => 'svg',
        'content' => [
            'برای ثبت وضعیت معلولیت:',
            '1. وارد اپلیکیشن اسنپ شوید',
            '2. به بخش "وضعیت" بروید',
            '3. وضعیت معلولیت را انتخاب کنید',
            '4. جزئیات را تکمیل کنید',
            '5. وضعیت را ذخیره کنید'
        ],
        'primary_button' => 'ورود به اپلیکیشن',
        'primary_button_link' => 'https://l.snpp.link/profile',
        'secondary_button' => 'آموزش مرحله به مرحله',
        'secondary_button_link' => 'https://l.snpp.link/snapp-specifications'
    ],
    'unpaid-fare' => [
        'title' => 'کرایه پرداخت نشده',
        'icon' => uploads_icon_url('Unpaid rent.svg'),
        'fallback_icon' => theme_icon_url('Unpaid rent.svg'),
        'color' => '#FFFFFF',
        'color_light' => '#FFFFFF',
        'type' => 'svg',
        'content' => [
            'برای پیگیری کرایه پرداخت نشده:',
            '1. وارد اپلیکیشن اسنپ شوید',
            '2. به بخش "پرداخت‌ها" بروید',
            '3. کرایه پرداخت نشده را انتخاب کنید',
            '4. جزئیات سفر را بررسی کنید',
            '5. درخواست پیگیری ثبت کنید'
        ],
        'primary_button' => 'ورود به اپلیکیشن',
        'primary_button_link' => 'https://l.snpp.link/support',
        'secondary_button' => 'آموزش مرحله به مرحله',
        'secondary_button_link' => 'https://l.snpp.link/snapp-payment'
    ],
    'lost-items' => [
        'title' => 'اشیاء جامانده در خودرو',
        'icon' => uploads_icon_url('Objects left in the car.svg'),
        'fallback_icon' => theme_icon_url('Objects left in the car.svg'),
        'color' => '#FFFFFF',
        'color_light' => '#FFFFFF',
        'type' => 'svg',
        'content' => [
            'برای گزارش اشیاء جامانده:',
            '1. وارد اپلیکیشن اسنپ شوید',
            '2. به بخش "سفرهای اخیر" بروید',
            '3. سفر مورد نظر را انتخاب کنید',
            '4. روی "گزارش اشیاء جامانده" کلیک کنید',
            '5. جزئیات را وارد کنید'
        ],
        'primary_button' => 'ورود به اپلیکیشن',
        'primary_button_link' => 'https://l.snpp.link/support',
        'secondary_button' => 'آموزش مرحله به مرحله',
        'secondary_button_link' => 'https://l.snpp.link/passenger-left'
    ],
    'app-support' => [
        'title' => 'پشتیبانی داخل اپلیکیشن',
        'icon' => uploads_icon_url('In-app support.svg'),
        'fallback_icon' => theme_icon_url('In-app support.svg'),
        'color' => '#FFFFFF',
        'color_light' => '#FFFFFF',
        'type' => 'svg',
        'content' => [
            'برای دریافت پشتیبانی:',
            '1. وارد اپلیکیشن اسنپ شوید',
            '2. به بخش "پشتیبانی" بروید',
            '3. موضوع مورد نظر را انتخاب کنید',
            '4. مشکل خود را توضیح دهید',
            '5. درخواست را ارسال کنید'
        ],
        'primary_button' => 'ورود به اپلیکیشن',
        'primary_button_link' => 'https://l.snpp.link/mainpage',
        'secondary_button' => 'آموزش مرحله به مرحله',
        'secondary_button_link' => 'https://l.snpp.link/snapp-support'
    ],
    // مودال‌های اسنپ باکس
    'snappbox-profile-contact' => [
        'title' => 'تغییر عکس پروفایل',
        'icon' => uploads_icon_url('Change profile picture-box.svg'),
        'fallback_icon' => theme_icon_url('Change profile picture-box.svg'),
        'color' => '#FFFFFF',
        'color_light' => '#FFFFFF',
        'type' => 'svg',
        'content' => [
            '۱. در صفحه اول اپلیکیشن روی گزینه <strong>سه خط</strong> بالا سمت راست بزنید.',
            '۲. روی تصویر پروفایلتان زده و گزینه «<strong>ویرایش</strong>» را انتخاب کنید.',
            '۳. روی علامت <strong>قلم کنار عکس پروفایل</strong> بزنید و عکس سلفی بگیرید.'
        ],
        'primary_button' => 'ورود به اپلیکیشن',
        'primary_button_link' => 'https://l.snpp.link/box-app-profile',
        'secondary_button' => 'آموزش مرحله به مرحله',
        'secondary_button_link' => 'https://l.snpp.link/box-profile'
    ],
    'snappbox-mobile-number' => [
        'title' => 'تغییر شماره موبایل',
        'icon' => uploads_icon_url('Changing the mobile number - box.svg'),
        'fallback_icon' => theme_icon_url('Changing the mobile number - box.svg'),
        'color' => '#FFFFFF',
        'color_light' => '#FFFFFF',
        'type' => 'svg',
        'content' => [
            '۱. وارد اپلیکیشن اسنپ شوید',
            '۲. به بخش تنظیمات بروید',
            '۳. روی "تغییر شماره موبایل" کلیک کنید',
            '۴. شماره جدید را وارد کنید',
            '۵. کد تایید را وارد کنید',
            '۶. تغییرات را تایید کنید'
        ],
        'primary_button' => 'ورود به اپلیکیشن',
        'primary_button_link' => 'https://l.snpp.link/box-app-mobile',
        'secondary_button' => 'آموزش مرحله به مرحله',
        'secondary_button_link' => 'https://l.snpp.link/box-mobile'
    ],
    'snappbox-documents' => [
        'title' => 'تکمیل مدارک',
        'icon' => uploads_icon_url('Completion of documents - box.svg'),
        'fallback_icon' => theme_icon_url('Completion of documents - box.svg'),
        'color' => '#FFFFFF',
        'color_light' => '#FFFFFF',
        'type' => 'svg',
        'content' => [
            'برای تکمیل مدارک خود:',
            '1. وارد اپلیکیشن اسنپ شوید',
            '2. به بخش "مدارک" بروید',
            '3. مدارک ناقص را شناسایی کنید',
            '4. عکس مدارک را آپلود کنید',
            '5. منتظر تایید بمانید'
        ],
        'primary_button' => 'ورود به اپلیکیشن',
        'primary_button_link' => 'https://l.snpp.link/box-app-license',
        'secondary_button' => 'آموزش مرحله به مرحله',
        'secondary_button_link' => 'https://l.snpp.link/box-document'
    ],
    'snappbox-service-change' => [
        'title' => 'تغییر سرویس کاربری',
        'icon' => uploads_icon_url('Change user service-box.svg'),
        'fallback_icon' => theme_icon_url('Change user service-box.svg'),
        'color' => '#FFFFFF',
        'color_light' => '#FFFFFF',
        'type' => 'svg',
        'content' => [
            'برای تغییر سرویس کاربری:',
            '1. وارد اپلیکیشن اسنپ شوید',
            '2. به بخش "تنظیمات سرویس" بروید',
            '3. سرویس مورد نظر را انتخاب کنید',
            '4. شرایط جدید را مطالعه کنید',
            '5. تغییرات را تایید کنید'
        ],
        'primary_button' => 'ورود به اپلیکیشن',
        'primary_button_link' => 'https://l.snpp.link/box-app-vehicle',
        'secondary_button' => 'آموزش مرحله به مرحله',
        'secondary_button_link' => 'https://l.snpp.link/box-vehicle'
    ],
    'snappbox-app-support' => [
        'title' => 'پشتیبانی داخل برنامه',
        'icon' => uploads_icon_url('Support inside the application-box.svg'),
        'fallback_icon' => theme_icon_url('Support inside the application-box.svg'),
        'color' => '#FFFFFF',
        'color_light' => '#FFFFFF',
        'type' => 'svg',
        'content' => [
            'برای دریافت پشتیبانی:',
            '1. وارد اپلیکیشن اسنپ شوید',
            '2. به بخش "پشتیبانی" بروید',
            '3. موضوع مورد نظر را انتخاب کنید',
            '4. مشکل خود را توضیح دهید',
            '5. درخواست را ارسال کنید'
        ],
        'primary_button' => 'ورود به اپلیکیشن',
        'primary_button_link' => 'https://l.snpp.link/box-app-support',
        'secondary_button' => 'آموزش مرحله به مرحله',
        'secondary_button_link' => 'https://l.snpp.link/box-support'
    ]
];

?>

<div class="online-support-page">
    <div class="support-container">
        <!-- هدر جدید مطابق فیگما -->
        <div class="support-header">
            <div class="support-header-content">
                <div class="support-header-icon">
                    <img src="<?php echo uploads_icon_url('20220703-Kayako 1.svg'); ?>" alt="پشتیبانی آنلاین" class="svg-icon" onerror="this.onerror=null;this.src='<?php echo theme_icon_url('20220703-Kayako 1.svg'); ?>';">
                </div>
                <h1><?php echo $page_title; ?></h1>
                <p><?php echo $page_description; ?></p>
                <p class="support-note">توجه داشته باشید برای مواردی که همچنان نیاز به «ثبت درخواست» در بخش خدمات غیرحضوری دارند، می‌توانید از لینک انتهای این صفحه اقدام کنید.</p>
            </div>
        </div>

        <!-- عنوان اسنپ -->
        <div class="support-header" style="background: transparent; box-shadow: none; border: none; margin: 0; padding: 26px 0;">
            <div class="support-header-content" style="text-align: right; margin: 0; padding: 0 24px 0 24px;">
                <h1 style="color: var(--text-black, #404040); text-align: right; font-family: IRANSansX; font-size: 19px; font-style: normal; font-weight: 500; line-height: 171.022%; letter-spacing: 0.029px; margin: 0; padding: 0;">اسنپ</h1>
            </div>
        </div>

        <!-- گرید منوهای اصلی -->
        <div class="support-grid" style="margin-bottom: 0;">
            <?php foreach ($main_menus as $menu): ?>
                <div class="support-card"
                     data-modal="<?php echo $menu['id']; ?>"
                     style="--card-color: <?php echo $menu['color']; ?>; --card-color-light: <?php echo $menu['color_light']; ?>">
                    <div class="support-card-icon">
                        <?php if ($menu['type'] === 'svg'): ?>
                            <img src="<?php echo $menu['icon']; ?>" alt="<?php echo $menu['title']; ?>" class="svg-icon" onerror="this.onerror=null;this.src='<?php echo isset($menu['fallback_icon']) ? $menu['fallback_icon'] : $menu['icon']; ?>';">
                        <?php else: ?>
                            <i class="<?php echo $menu['icon']; ?>"></i>
                        <?php endif; ?>
                    </div>
                    <div class="support-card-content">
                        <h3 class="support-card-title"><?php echo $menu['title']; ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- بخش اسنپ باکس -->
<div class="online-support-page" style="margin-top: 0; padding-top: 0;">
    <div class="support-container">
        <div class="support-header" style="background: transparent; box-shadow: none; border: none; margin: 0; padding: 26px 0;">
            <div class="support-header-content" style="text-align: right; margin: 0; padding: 0 24px 0 24px;">
                <h1 style="color: var(--text-black, #404040); text-align: right; font-family: IRANSansX; font-size: 19px; font-style: normal; font-weight: 500; line-height: 171.022%; letter-spacing: 0.029px; margin: 0; padding: 0;">اسنپ باکس</h1>
            </div>
        </div>

        <!-- گرید منوهای اسنپ باکس -->
        <div class="support-grid" style="margin-bottom: 0;">
            <?php foreach ($snappbox_menus as $menu): ?>
                <div class="support-card"
                     data-modal="<?php echo $menu['id']; ?>"
                     style="--card-color: <?php echo $menu['color']; ?>; --card-color-light: <?php echo $menu['color_light']; ?>">
                    <div class="support-card-icon">
                        <?php if ($menu['type'] === 'svg'): ?>
                            <img src="<?php echo $menu['icon']; ?>" alt="<?php echo $menu['title']; ?>" class="svg-icon" onerror="this.onerror=null;this.src='<?php echo isset($menu['fallback_icon']) ? $menu['fallback_icon'] : $menu['icon']; ?>';">
                        <?php else: ?>
                            <i class="<?php echo $menu['icon']; ?>"></i>
                        <?php endif; ?>
                    </div>
                    <div class="support-card-content">
                        <h3 class="support-card-title"><?php echo $menu['title']; ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- باکس اطلاع‌رسانی/لینک ثبت درخواست (پس از اسنپ باکس) -->
        <section class="post-grid-info-box" aria-labelledby="post-grid-info-title">
            <div class="info-box">
                <div class="info-box-header">
                    <h2 id="post-grid-info-title" class="info-box-title">اسنپ و اسنپ‌باکس</h2>
                    <p class="info-box-subtitle">فهرست موضوعات زیر را از طریق «ثبت درخواست» در بخش خدمات غیرحضوری پیگیری کنید:</p>
                </div>
                <ul class="info-box-list">
                    <li>عدم تطابق اطلاعات</li>
                    <li>غیرفعالی پلاک تکراری</li>
                    <li>احراز هویت</li>
                    <li>فیش واریز جریمه</li>
                    <li>گواهی عدم سوءپیشینه</li>
                    <li>تکمیل نقص مدارک (در زمان غیرفعالی)</li>
                    <li>غیرفعالی بازدید خودرو</li>
                    <li>اصلاح قرارداد</li>
                    <li>تغییر وسیله نقلیه (ویژه اسنپ‌باکس)</li>
                </ul>
                <div class="info-box-actions">
                    <a class="info-box-btn" href="https://esupport-ticket.snapp.ir/login" target="_blank" rel="noopener">ثبت درخواست</a>
                </div>
            </div>
        </section>
        
    </div>

</div>

<!-- مودال‌ها -->
<?php foreach ($modal_contents as $modal_id => $modal_data): ?>
    <div id="modal-<?php echo $modal_id; ?>" class="modal" data-modal="<?php echo $modal_id; ?>">
        <div class="modal-content">
            <div class="modal-header" style="--modal-color: <?php echo $modal_data['color']; ?>; --modal-color-light: <?php echo $modal_data['color_light']; ?>;">
                <span class="modal-close">&times;</span>
                <h2 class="modal-title"><?php echo $modal_data['title']; ?></h2>
                <div class="modal-icon">
                    <?php if ($modal_data['type'] === 'svg'): ?>
                        <img src="<?php echo $modal_data['icon']; ?>" alt="<?php echo $modal_data['title']; ?>" class="svg-icon" onerror="this.onerror=null;this.src='<?php echo isset($modal_data['fallback_icon']) ? $modal_data['fallback_icon'] : $modal_data['icon']; ?>';">
                    <?php else: ?>
                        <i class="<?php echo $modal_data['icon']; ?>"></i>
                    <?php endif; ?>
                </div>
            </div>
            <div class="modal-body">
                <ul class="modal-content-list">
                    <?php foreach ($modal_data['content'] as $item): ?>
                        <li><?php echo $item; ?></li>
                    <?php endforeach; ?>
                </ul>
                <div class="modal-buttons">
                    <?php if (isset($modal_data['primary_button_link'])): ?>
                        <a href="<?php echo $modal_data['primary_button_link']; ?>" class="modal-btn modal-btn-primary"><?php echo $modal_data['primary_button']; ?></a>
                    <?php else: ?>
                        <a href="#" class="modal-btn modal-btn-primary"><?php echo $modal_data['primary_button']; ?></a>
                    <?php endif; ?>
                    <?php if (isset($modal_data['secondary_button_link'])): ?>
                        <a href="<?php echo $modal_data['secondary_button_link']; ?>" class="modal-btn modal-btn-secondary"><?php echo $modal_data['secondary_button']; ?></a>
                    <?php else: ?>
                        <a href="#" class="modal-btn modal-btn-secondary"><?php echo $modal_data['secondary_button']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>



<?php
// @phpstan-ignore-next-line
get_footer();
?>