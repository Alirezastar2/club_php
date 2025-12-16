<?php

/**
 * Template Name: main page2
 */

defined('ABSPATH') || exit; // Exit if accessed directly

date_default_timezone_set("Asia/Tehran");

require_once get_stylesheet_directory() . '/inc/jdf.php';

get_header();
$service_type = (isset($_GET['st']) && $_GET['st'] == 'box') ? 'box' : 'cab';

$cities = [
    'آذربایجان شرقی' => [
        'تبریز' => 'https://club.snapp.ir/page/tabriz/',
        'مراغه' => 'https://club.snapp.ir/page/maraghe/',
    ],
    'آذربایجان غربی' => [
        'ارومیه' => 'https://club.snapp.ir/page/urmia/',
        'خوی' => 'https://club.snapp.ir/page/khoy/',
    ],
    'اردبیل' => [
        'اردبیل' => 'https://club.snapp.ir/page/ardabil/',
    ],
    'اصفهان' => [
        'اصفهان' => 'https://club.snapp.ir/page/isfahan/',
        'کاشان' => 'https://club.snapp.ir/page/kashan/',
    ],
    'البرز' => [
        'کرج' => 'https://club.snapp.ir/page/karaj/',
    ],
    'بوشهر' => [
        'بوشهر' => 'https://club.snapp.ir/page/bushehr/',
    ],
    'تهران' => [
        'تهران' => 'https://club.snapp.ir/page/tehran/',
    ],
    'خراسان جنوبی' => [
        'بیرجند' => 'https://club.snapp.ir/page/khorasan_jonoobi/',
    ],
    'خراسان رضوی' => [
        'مشهد' => 'https://club.snapp.ir/page/khorasan-razavi/',
        'سبزوار' => 'https://club.snapp.ir/page/khorasan-razavi/',
        'نیشابور' => 'https://club.snapp.ir/page/khorasan-razavi/',
        'قوچان' => 'https://club.snapp.ir/page/khorasan-razavi/',
        'تربت حیدریه' => 'https://club.snapp.ir/page/khorasan-razavi/',
    ],
    'خراسان شمالی' => [
        'بجنورد' => 'https://club.snapp.ir/page/khorasan-shomali/',
    ],
    'خوزستان' => [
        'اهواز' => 'https://club.snapp.ir/page/ahwaz/',
        'مراغه' => 'https://club.snapp.ir/page/maraghe/',
    ],
    'زنجان' => [
        'زنجان' => 'https://club.snapp.ir/page/zanjaan/',
    ],
    'سمنان' => [
        'سمنان' => 'https://club.snapp.ir/page/semnan/',
    ],
    'سیستان و بلوچستان' => [
        'زاهدان' => 'https://club.snapp.ir/page/sistan/',
    ],
    'فارس' => [
        'شیراز' => 'https://club.snapp.ir/page/shiraz/',
        'مرودشت' => 'https://club.snapp.ir/page/marvdasht/',
    ],
    'قزوین' => [
        'قزوین' => 'https://club.snapp.ir/page/qazvin/',
    ],
    'قم' => [
        'قم' => 'https://club.snapp.ir/page/qom/',
    ],
    'کرمان' => [
        'کرمان' => 'https://club.snapp.ir/page/kerman/',
        'سیرجان' => 'https://club.snapp.ir/page/sirjan/',
    ],
    'کرمانشاه' => [
        'کرمانشاه' => 'https://club.snapp.ir/page/kermanshah/',
    ],
    'کهگیلویه و بویراحمد' => [
        'یاسوج' => 'https://club.snapp.ir/page/yasouj/',
    ],
    'گلستان' => [
        'گرگان' => 'https://club.snapp.ir/page/gorgan/',
        'گنبد کاووس' => 'https://club.snapp.ir/page/gonbade_kabous/',
    ],
    'گیلان' => [
        'رشت' => 'https://club.snapp.ir/page/gilan/',
    ],
    'لرستان' => [
        'خرم آباد' => 'https://club.snapp.ir/page/lorestan/',
    ],
    'مازندران' => [
        'ساری' => 'https://club.snapp.ir/page/mazandaran/',
        'بابل' => 'https://club.snapp.ir/page/mazandaran/',
        'قائمشهر' => 'https://club.snapp.ir/page/mazandaran/',
    ],
    'مرکزی' => [
        'اراک' => 'https://club.snapp.ir/page/arak/',
    ],
    'هرمزگان' => [
        'بندرعباس' => 'https://club.snapp.ir/page/bandar_abbas/',
        'کیش' => 'https://club.snapp.ir/page/kish/',
    ],
    'همدان' => [
        'همدان' => 'https://club.snapp.ir/page/hamedan/',
    ],
    'یزد' => [
        'یزد' => 'https://club.snapp.ir/page/yazd/',
    ],
];

if ($service_type == 'box') {
    $bg_by_st = 'bg-driver_app_success';
    $slider = get_field('slider-box', 'option');

    // Slider
    // $slider = [
    //     [
    //         'desktop_img' => 'https://club.snapp.ir/wp-content/uploads/2024/05/Bord-desktop-slide-scaled.jpg',
    //         'mobile_img' => 'https://club.snapp.ir/wp-content/uploads/2024/05/Bord-mobile-slide.jpg',
    //         'url' => 'https://club.snapp.ir/bordbordbigcampaign/?utm_source=DriversClub&utm_medium=ClubSlideBanner&utm_campaign=BordBord_StartLP11May2024'
    //     ],
    //     [
    //         'desktop_img' => 'https://club.snapp.ir/wp-content/uploads/2023/02/20230111-sliderBox-Kayako-lp-scaled.jpg',
    //         'mobile_img' => 'https://club.snapp.ir/wp-content/uploads/2023/02/20230111-sliderBox-Kayako-mp.jpg',
    //         'url' => 'https://club.snapp.ir/online_support/',
    //     ],
    //     [
    //         'desktop_img' => 'https://club.snapp.ir/wp-content/uploads/2023/01/sliderBox-laerning-lp-scaled.jpg',
    //         'mobile_img' => 'https://club.snapp.ir/wp-content/uploads/2023/01/sliderBox-laerning-mp.jpg',
    //         'url' => 'https://club.snapp.ir/snapp-box-training-center/',
    //     ],
    //     [
    //         'desktop_img' => 'https://club.snapp.ir/wp-content/uploads/2023/01/sliderBox-radio-lp-scaled.jpg',
    //         'mobile_img' => 'https://club.snapp.ir/wp-content/uploads/2023/01/sliderBox-radio-mp.jpg',
    //         'url' => 'https://club.snapp.ir/radio-box/',
    //     ],
    //     [
    //         'desktop_img' => 'https://club.snapp.ir/wp-content/uploads/2023/07/20230111-sliderBox-Insta-lp-scaled.jpg',
    //         'mobile_img' => 'https://club.snapp.ir/wp-content/uploads/2023/07/20230111-sliderBox-Insta-mp.jpg',
    //         'url' => 'instagram://user?username=drivers.snappbox',
    //     ],
    //     [
    //         'desktop_img' => 'https://club.snapp.ir/wp-content/uploads/2023/06/slider-telegram-box-1-scaled.jpg',
    //         'mobile_img' => 'https://club.snapp.ir/wp-content/uploads/2023/06/20230618-sliderBox-telegram-mp.jpg',
    //         'url' => 'tg://resolve?domain=snappbox_drivers',
    //     ],
    //     [
    //         'desktop_img' => 'https://club.snapp.ir/wp-content/uploads/2023/06/20230618-sliderBox-Aparat-lp--scaled.jpg',
    //         'mobile_img' => 'https://club.snapp.ir/wp-content/uploads/2023/06/20230618-sliderBox-Aparat-mp.jpg',
    //         'url' => 'https://www.aparat.com/SNAPP_DRIVERS',
    //     ],
    //     [
    //         'desktop_img' => 'https://club.snapp.ir/wp-content/uploads/2023/01/sliderBox-tv-lp-scaled.jpg',
    //         'mobile_img' => 'https://club.snapp.ir/wp-content/uploads/2023/01/sliderBox-tv-mp.jpg',
    //         'url' => 'https://club.snapp.ir/category/snappbox/boxvideo/',
    //     ],
    // ];

    // Top Icons
    $top_icons = [
        [
            'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/support_agent.svg',
            'text' => 'خدمات غیرحضوری',
            'url' => 'https://club.snapp.ir/online_support/',
        ],
        [
            'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/academy_vendor.svg',
            'text' => 'آکادمی تامین‌کنندگان',
            'url' => 'https://club.snapp.ir/vendor-academy/seller-form-guide',
        ],
        [
            'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/school.svg',
            'text' => 'مرکز آموزش',
            'url' => 'https://club.snapp.ir/snapp-box-training-center/',
        ],
        [
            'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/radio.svg',
            'text' => 'رادیو باکس',
            'url' => 'https://club.snapp.ir/radio-box/',
        ],
        [
            'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/driver.svg',
            'text' => 'ثبت نام راننده جدید اسنپ',
            'url' => 'https://club.snapp.ir/map-spot/',
        ],
    ];

    // Bottom Icons
    $bottom_icons = [
        [
            'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/car&motor.svg',
            'text' => 'تسهیلات خودرو و موتور',
            'url' => '#',
        ],
        [
            'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/doctor.svg',
            'text' => 'تسهیلات درمانی',
            'url' => '#',
        ],
        [
            'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/phone_android.svg',
            'text' => 'تسهیلات رفاهی',
            'url' => '#',
        ],
    ];

    // Banners
    $banners = get_field('banner_home_box', 'option');

    // SnappGram
    $snappgram = [
        'title' => 'باکس‌گرام',
        'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/boxGram.png',
        'cat' => 'box',
        'desc' => 'شبکه اختصاصی سایت باشگاه رانندگان',
        'showAllLink' => site_url() . '/snappgram?st=box',
    ];

    // News
    $news = [
        'title' => 'اخبار اسنپ‌باکس',
        'cat' => 'box-news',
        'showAllLink' => 'https://club.snapp.ir/category/box-news/',
    ];

    // TV
    $tv = [
        'title' => 'تی‌وی باکس',
        'cat' => 'tv-box',
        'showAllLink' => 'https://club.snapp.ir/category/tv-box/',
    ];

    // Video Snapp
    $video = [
        'title' => 'ویدیو اسنپ باکس',
        'cat' => 'boxvideo',
        'showAllLink' => 'https://club.snapp.ir/category/boxvideo',
    ];

    // last blog
    $last_blog = [
        'title' => 'آخرین مقالات',
        'cat' => 'snappbox-bikers-drivers-training',
        'showAllLink' => 'https://club.snapp.ir/category/snappbox-bikers-drivers-training/',
    ];

    // Offers
    $offers = [
        'title' => 'تخفیف‌های باکس کلاب',
        'cities' => [
            ['name' => 'تهران', 'slug' => 'tehran-box'],
            ['name' => 'کرج', 'slug' => 'box_karaj'],
            ['name' => 'شیراز', 'slug' => 'box_shiraz'],
            ['name' => 'اصفهان', 'slug' => 'box_esfahan'],
            ['name' => 'اهواز', 'slug' => 'box_ahwaz'],
        ],
        'default_city' => 'tehran-box',
        'showAllLink' => '',
    ];

    // App Download
    $app_dl = [
        'image' => 'https://club.snapp.ir/wp-content/uploads/2023/02/Box-Dl.png',
        'title' => 'دانلود آخرین نسخه اپلیکیشن کاربران موتورسوار و راننده اسنپ باکس',
        'desc' => 'با دریافت جدیدترین نسخه اپلیکیشن کاربران موتورسوار و راننده از آخرین و به‌روزترین ویژگی ها بهره مند شوید.',
        'android' => 'https://snapp-box.com/driverapp',
    ];
} else {
    $bg_by_st = 'bg-driver_app_primary_medium';
    
    // Slider
    $slider = get_field('slider-cab', 'option');

    // Top Icons
    $top_icons = [
        [
            'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/support_agent.svg',
            'text' => 'خدمات غیرحضوری',
            'url' => 'https://club.snapp.ir/online_support/',
        ],
        [
            'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/academy_vendor.svg',
            'text' => 'آکادمی تامین‌کنندگان',
            'url' => 'https://club.snapp.ir/vendor-academy/seller-form-guide',
        ],
        [
            'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/school.svg',
            'text' => 'مرکز آموزش',
            'url' => 'https://club.snapp.ir/training-center/',
        ],
        [
            'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/radio.svg',
            'text' => 'رادیو اسنپ',
            'url' => 'https://club.snapp.ir/radio-snapp/',
        ],
        [
            'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/driver.svg',
            'text' => 'ثبت نام راننده جدید اسنپ',
            'url' => 'https://club.snapp.ir/map-spot/',
        ],
    ];

    // Bottom Icons
    $bottom_icons = [
        [
            'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/car_services.svg',
            'text' => 'تسهیلات خودرویی',
            'url' => 'https://club.snapp.ir/category/on-the-road-services/',
        ],
        [
            'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/doctor.svg',
            'text' => 'تسهیلات درمانی',
            'url' => 'https://club.snapp.ir/category/medical-services/',
        ],
        [
            'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/phone_android.svg',
            'text' => 'تسهیلات رفاهی',
            'url' => 'https://club.snapp.ir/category/off-the-road/',
        ],
    ];

    // Banners
    $banners = get_field('banner_home_cab', 'option');

    // SnappGram
    $snappgram = [
        'title' => 'اسنپ‌گرام',
        'icon' => SCL_LANDINGS_ASSETS . '/images/mainpage_img/snappGram.png',
        'cat' => 'cab',
        'desc' => 'شبکه اختصاصی سایت باشگاه رانندگان',
        'showAllLink' => site_url() . '/snappgram?st=cab',
    ];

    // News
    $news = [
        'title' => 'اخبار اسنپ',
        'cat' => 'news',
        'showAllLink' => 'https://club.snapp.ir/category/news/',
    ];

    // TV
    $tv = [
        'title' => 'تی‌وی اسنپ',
        'cat' => 'tv-snapp',
        'showAllLink' => 'https://club.snapp.ir/category/tv-snapp/',
    ];

    // Video Snapp
    $video = [
        'title' => 'ویدیو اسنپ',
        'cat' => 'video',
        'showAllLink' => 'https://club.snapp.ir/category/video',
    ];

    // last blog
    $last_blog = [
        'title' => 'آخرین مقالات',
        'cat' => 'snapp-drivers-training',
        'showAllLink' => 'https://club.snapp.ir/snapp-drivers-training/',
    ];

    // Offers
    $offers = [
        'title' => 'تخفیف‌های باشگاه رانندگان',
        'cities' => [
            ['name' => 'تهران', 'slug' => 'tehran'],
            ['name' => 'کرج', 'slug' => 'karaj'],
            ['name' => 'شیراز', 'slug' => 'shiraz'],
            ['name' => 'اصفهان', 'slug' => 'isfahan'],
            ['name' => 'اهواز', 'slug' => 'ahwaz'],
        ],
        'default_city' => 'tehran',
        'showAllLink' => '',
    ];

    // App Download
    $app_dl = [
        'image' => 'https://club.snapp.ir/wp-content/uploads/2023/02/Cab-Dl.png',
        'title' => 'دانلود آخرین نسخه اپلیکیشن کاربران راننده اسنپ',
        'desc' => 'با دریافت جدیدترین نسخه اپلیکیشن کاربران راننده از آخرین و به‌روزترین ویژگی‌ها بهره مند شوید.',
        'android' => 'https://club.snapp.ir/download/',
        'ios' => 'https://club.snapp.ir/download/',
    ];
}

?>

<div class="max-w-full overflow-hidden my-8">
    <div class="container">
        <!-- Select CAB - Box -->
        <div class="flex bg-driver_bg_gray rounded-full text-center">
            <a class="flex-1 text-14 rounded-full py-3 lg:py-5 <?= $service_type == 'cab' ? 'bg-driver_app_primary text-white' : ''; ?>" href="?st=cab">
                <i class="fa fa-car" aria-hidden="true"></i>
                اسنپ رانندگان
            </a>
            <a class="flex-1 text-14 rounded-full py-3 lg:py-5 <?= $service_type == 'box' ? 'bg-driver_app_success text-white' : ''; ?>" href="?st=box">
                <i class="fa fa-motorcycle" aria-hidden="true"></i>
                اسنپ باکس
            </a>
        </div>
        <!-- /Select CAB - Box -->

        <!-- Slider -->
        <div class="mt-8 mb-12 lg:mb-16 rounded-lg relative">
            <div dir="rtl" class="swiper_slider first_slider">
                <div class="swiper-wrapper">
                    <?php foreach ($slider as $slide) : ?>
                        <?php if ($slide['active_slider']) : ?>
                            <div class="swiper-slide slider_items">
                                <a href="<?= $slide['url'] ?>">
                                    <img src="<?= $slide['desktop_img'] ?>" class="hidden lg:block rounded-lg" alt="">
                                    <img src="<?= $slide['mobile_img'] ?>" class="block lg:hidden rounded-lg" alt="">
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next swiper-button-next_slider"></div>
                <div class="swiper-button-prev swiper-button-prev_slider"></div>
            </div>
            <div class="swiper-pagination swiper-pagination_slider"></div>
        </div>
        <!-- /Slider -->

        <!-- Top Boxes -->


        <div dir="rtl" class="slide-container swiper text-center" style="padding-bottom:0;">
            <div class="slide-content" id="top_boxes">
                <div class="card-wrapper swiper-wrapper" id="" style="margin: 40px 0;">
                    <?php foreach ($top_icons as $key => $top_icon) : ?>
                        <a href="<?= $top_icon['url'] ?>" class="swiper-slide">
                            <img src="<?= $top_icon['icon'] ?>" class="w-12 lg:w-14 p-2 lg:p-3 h-12 lg:h-14 rounded-2xl mx-auto mb-2 <?= $bg_by_st ?> <?= $key == 2 ? 'btn-glowing-train' : ''; ?>">
                            <span class="text-11">
                                <?= $top_icon['text'] ?>
                            </span>
                        </a>
                    <?php endforeach; ?>
                    <!--<div class="swiper-button-next swiper-navBtn" id="button_next_tbc"></div>-->
                    <!--<div class="swiper-button-prev swiper-navBtn" id="button_prev_tbc"></div>-->
                    <!--<div class="swiper-pagination" id="top_boxes_pagination"></div>-->
                </div>

            </div>
        </div>


        <!-- /Top Boxes -->
    </div>

    <!-- Cities Services -->
    <div class="bg-driver_bg_gray mt-8 py-6 pr-4">
        <div class="lg:container">
            <!-- Heading -->
            <div class="flex justify-between">
                <h4 class="font-bold text-16 self-center"><?= $offers['title'] ?></h4>
                <a href="<?= $offers['showAllLink'] ?>" class="text-14 text-driver_app_primary_medium self-center pl-4 hidden">
                    <span class="ml-1">مشاهده همه</span>
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
            </div>
            <!-- /Heading -->

            <!-- Content -->
            <?php
            $nonce = wp_create_nonce("city_contract_filter");
            $link = admin_url('admin-ajax.php?action=city_contract_filter&nonce=' . $nonce);
            ?>
            <div class="my-4 relative">
                <div class="relative w-full overflow-auto whitespace-nowrap">

                    <span class="text-16 inline-block">شهر شما:</span>

                    <?php foreach ($offers['cities'] as $city) : ?>
                        <a href="<?= $link ?>" data-nonce="<?= $nonce ?>" data-city_name="<?= $city['slug'] ?>" class="city_contract text-14 inline-block py-2 px-4 ml-1 rounded-full border-gray-300 border-2 cursor-pointer" <?= ($city['slug'] == "tehran" || $city['slug'] == "tehran-box") ? 'style="color: white; background-color: rgb(62, 166, 91);"' : ''; ?>><?= $city['name'] ?></a>
                    <?php endforeach; ?>

                    <?php if ($service_type != 'box') : ?>
                        <span id="otheCities_BTN" class="text-14 cursor-pointer inline-block py-2 px-4 rounded-full bg-driver_app_success text-white">سایر
                            شهرها...</span>
                    <?php endif; ?>


                    <!-- The Modal -->
                    <div id="otherCities_Modal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="border-b-2 mb-4" style="height: 20%;">
                                <span class="close">&times;</span>
                                <h5>انتخاب شهر</h5>
                                <input type="text" id="cities_search" class="block w-full rounded-lg bg-driver_bg_gray py-2 px-4 my-4" placeholder="جستجو در شهرها">
                            </div>

                            <ul class="flex flex-col cities_list">
                                <?php foreach ($cities as $city => $subcit) : ?>
                                    <li class="border-b py-4 city_dd"><a href="#" class="">
                                            <?= $city ?>
                                        </a></li>
                                    <ul class="hidden bg-driver_bg_gray">
                                        <?php foreach ($subcit as $subcity => $subcity_link) : ?>
                                            <li class="py-4 pr-8">
                                                <a href="<?= $subcity_link ?>"><?= $subcity ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div dir="rtl" class="slide-container swiper">
                <div class="slide-content" id="contracts_carosoul">
                    <div class="card-wrapper swiper-wrapper" id="contracts">
                        <?php
                        $contracts_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 5,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'post_tag',
                                    'field' => 'slug',
                                    'terms' => $offers['default_city'],
                                ),
                            ),
                        );

                        $contracts_query = new WP_Query($contracts_args);

                        // Get the current city from the selected city in the filter
                        $current_city_slug = isset($_GET['city']) ? $_GET['city'] : $offers['default_city'];
                        $current_city_name = '';
                        foreach ($offers['cities'] as $city) {
                            if ($city['slug'] === $current_city_slug) {
                                $current_city_name = $city['name'];
                                break;
                            }
                        }
                        if (!$current_city_name) {
                            $current_city_name = 'تهران';
                        }

                        $tag = get_term_by('slug', $current_city_slug, 'post_tag');

                        if ($contracts_query->have_posts()) : ?>
                            <?php while ($contracts_query->have_posts()) :
                                $contracts_query->the_post();

                                $text_cart_discount = get_field('cart_text_group', get_the_ID())['text_cart_discount'];
                                $snp_discount_code = get_post_meta(get_the_ID(), 'snp_discount_code', true);
                                $discount_code = $text_cart_discount ?? $snp_discount_code;
                                $discount_code = $discount_code ?? "";
                                $class_discount = !$discount_code ? "hidden" : "";

                                $subtitle = get_field('subtitle_group', get_the_ID())['subtitle'];
                                $club_subtitle_meta_box = get_post_meta(get_the_ID(), 'club_subtitle_meta_box', true);
                                $club_subtitle = $subtitle ?? $club_subtitle_meta_box;
                                $club_subtitle = $club_subtitle ?? "";

                            ?>
                                <a href="<?php the_permalink(); ?>" class="item bg-white rounded-xl shadow-md swiper-slide" style="height:auto;">
                                    <img class="w-full rounded-t-xl" src="<?= the_post_thumbnail_url() ?>" alt="">
                                    <div class="p-4 snp-driver-cart">
                                        <h3 class="text-14 mb-2">
                                            <?php the_title(); ?>
                                        </h3>
                                        <p><?= $club_subtitle ?></p>
                                    </div>

                                    <div class="flex justify-between border-t px-4 py-3">
                                        <span class="bg-driver_app_success text-14 text-white px-4 py-1 rounded-lg <?= $class_discount ?>">
                                            <?= $discount_code ?>
                                        </span>
                                        <span class="text-t_gray60 text-12 self-center contract_card_city_name">تهران</span>
                                    </div>
                                </a>
                        <?php endwhile;
                        endif; ?>
                        <a href="<?= get_tag_link($tag->term_id) ?>" class="item bg-white rounded-xl shadow-md swiper-slide" style="height: auto;">
                            <div style="text-align: center;position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
                                <i class="fas fa-arrow-circle-left block mb-4" style="font-size: 3rem; color: #3DA65C;"></i>
                                <span class="text-16 block">مشاهده همه خدمات</span>
                                <span class="text-14 block">شهر <?= $current_city_name ?></span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-button-next swiper-navBtn" id="button_next_ccp"></div>
                <div class="swiper-button-prev swiper-navBtn" id="button_prev_ccp"></div>
                <div class="swiper-pagination" id="cities_contract_pagination"></div>
            </div>
            <!-- /Content -->
        </div>
    </div>
    <!-- /Cities Services -->

    <div class="container">
        <!-- Snapp News -->
        <div class="my-8">
            <!-- Heading -->
            <div class="flex justify-between">
                <h4 class="font-bold text-16 self-center"><?= $news['title'] ?></h4>
                <a href="<?= $news['showAllLink'] ?>" class="text-14 text-driver_app_primary_medium  self-center">
                    <span class="ml-1">مشاهده همه</span>
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
            </div>
            <!-- /Heading -->

            <!-- Content -->
            <div dir="rtl" class="slide-container swiper">
                <div class="slide-content" id="snappnews_carosoul">
                    <div class="card-wrapper swiper-wrapper">
                        <?php
                        $news_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 5,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'slug',
                                    'terms' => $news['cat'],
                                ),
                            ),
                        );

                        $news_query = new WP_Query($news_args);

                        if ($news_query->have_posts()) : ?>
                            <?php while ($news_query->have_posts()) :
                                $news_query->the_post();
                            ?>
                                <a href="<?php the_permalink(); ?>">
                                    <div class="item bg-white rounded-xl shadow-md w-3/4 swiper-slide" style="height:auto;">
                                        <img class="w-full rounded-t-xl" src="<?php the_post_thumbnail_url(); ?>" alt="">
                                        <div class="py-4 px-3 whitespace-normal">
                                            <h3 class="text-14 mb-2">
                                                <?php the_title(); ?>
                                            </h3>
                                            <p class="text-12 text-justify leading-5 text-t_gray60">
                                                <?= wp_trim_words(get_the_content(), 12, '...') ?>
                                            </p>
                                        </div>

                                        <div class="flex justify-between px-3 py-2">
                                            <span class="text-10 text-t_gray38">
                                                <?php the_date(); ?>
                                            </span>
                                            <a href="<?php the_permalink(); ?>" class="text-driver_app_primary_medium text-12">
                                                ادامه مطلب
                                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                        <?php endwhile;
                        endif; ?>
                    </div>

                    <div class="swiper-button-next swiper-navBtn" id="button_next_scp"></div>
                    <div class="swiper-button-prev swiper-navBtn" id="button_prev_scp"></div>
                    <div class="swiper-pagination" id="snappnews_carosoul_pagination"></div>
                </div>
            </div>
            <!-- /Content -->
        </div>
        <!-- /Snapp News -->
        <!-- Banners -->
        <?php if ($service_type != 'box') : ?>
            <div dir="rtl" class="slide-container swiper">
                <div class="slide-content" id="banners_carosoul">
                    <div class="card-wrapper swiper-wrapper">
                        <a href="https://snappcarfix.com/category/117/24/24" class="swiper-slide">
                            <img class="mx-auto rounded-lg" src="<?= SCL_LANDINGS_ASSETS ?>/images/mainpage_img/20240123-Carfix-4banner-01.jpg" alt="">
                        </a>
                        <a href="https://snappcarfix.com/category/117/85/85/" class="swiper-slide">
                            <img class="mx-auto rounded-lg" src="<?= SCL_LANDINGS_ASSETS ?>/images/mainpage_img/20230123-Carfix-4banner-02.jpg" alt="">
                        </a>
                        <a href="https://snappcarfix.com/category/117/1/1/" class="swiper-slide">
                            <img class="mx-auto rounded-lg" src="<?= SCL_LANDINGS_ASSETS ?>/images/mainpage_img/20230123-Carfix-4banner-03.jpg" alt="">
                        </a>
                        <a href="https://snappcarfix.com/" class="swiper-slide">
                            <img class="mx-auto rounded-lg" src="<?= SCL_LANDINGS_ASSETS ?>/images/mainpage_img/20230123-Carfix-4banner-04.jpg" alt="">
                        </a>
                    </div>
                </div>

                <div class="swiper-pagination" id="banners_pagination"></div>
            </div>
        <?php endif; ?>
        <!-- /Banners -->

        <!-- Banner -->
        <div class="flex justify-between gap-4 lg:my-16">
            <div class="mx-auto">
                <a href="<?= $banners[0]['url'] ?>">
                    <img src="<?= $banners[0]['banner_img']['url'] ?>" class="rounded-lg" alt="<?= $banners[0]['banner_img']['alt'] ?>">
                </a>
            </div>
            <div class="hidden lg:block">
                <a href="<?= $banners[1]['url'] ?>">
                    <img src="<?= $banners[1]['banner_img']['url'] ?>" class="rounded-lg" alt="<?= $banners[1]['banner_img']['alt'] ?>">
                </a>
            </div>
        </div>
        <!-- /Banner -->

        <!-- Snapp Last Blog -->
        <div class="my-8">
            <!-- Heading -->
            <div class="flex justify-between">
                <h4 class="font-bold text-16 self-center"><?= $last_blog['title'] ?></h4>
                <a href="<?= $last_blog['showAllLink'] ?>" class="text-14 text-driver_app_primary_medium self-center">
                    <span class="ml-1">مشاهده همه</span>
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
            </div>
            <!-- /Heading -->

            <!-- Content -->
            <div dir="rtl" class="slide-container swiper">
                <div class="slide-content" id="snappblog_carosoul">
                    <div class="card-wrapper swiper-wrapper">
                        <?php
                        $current_date = current_time('Y-m-d');
                        $six_days_ago = date('Y-m-d', strtotime('-6 days', strtotime($current_date)));

                        $blogs_args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            // 'date_query' => array(
                            //     'after' => $six_days_ago,
                            //     'before' => $current_date,
                            //     'inclusive' => true,
                            // ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'slug',
                                    'terms' => $last_blog['cat'],
                                ),
                            ),
                            'posts_per_page' => 12,
                        );

                        $blogs_query = new WP_Query($blogs_args);

                        if ($blogs_query->have_posts()) :
                            while ($blogs_query->have_posts()) :
                                $blogs_query->the_post(); ?>
                                <a href="<?php the_permalink() ?>" class="item bg-white rounded-xl shadow-md w-3/4 swiper-slide" style="height:auto;">
                                    <img class="w-full rounded-t-xl" src="<?php the_post_thumbnail_url() ?>" alt="">
                                    <div class="py-4 px-3 whitespace-normal">
                                        <h3 class="text-16">
                                            <?php the_title() ?>
                                        </h3>
                                    </div>

                                    <div class="flex justify-between px-3 py-2">
                                        <span class="text-10 text-t_secondary">
                                            <?= get_the_date(); ?>
                                        </span>
                                    </div>
                                </a>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            ?>
                            <div class="text-center">
                                <p>هیچ پستی یافت نشد</p>
                            </div>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>

                <div class="swiper-button-next swiper-navBtn" id="button_next_svp_blog"></div>
                <div class="swiper-button-prev swiper-navBtn" id="button_prev_svp_blog"></div>
                <div class="swiper-pagination" id="snappblog_pagination"></div>
            </div>
            <!-- /Content -->
        </div>
        <!-- /Snapp Last Blog -->

        <!-- Snapp TV -->

        <!-- /Snapp TV -->

        <!-- Banner -->
        <div class="flex justify-between lg:my-16 gap-4">
            <div class="mx-auto">
                <a href="<?= $banners[2]['url'] ?>">
                    <img src="<?= $banners[2]['banner_img']['url'] ?>" class="rounded-lg" alt="<?= $banners[2]['banner_img']['alt'] ?>">
                </a>
            </div>
            <div class="hidden lg:block">
                <a href="<?= $banners[3]['url'] ?>">
                    <img src="<?= $banners[3]['banner_img']['url'] ?>" class="rounded-lg" alt="<?= $banners[3]['banner_img']['alt'] ?>">
                </a>
            </div>
        </div>
        <!-- /Banner -->

        <!-- Boxes -->
        <div class="flex text-center my-8 lg:my-16 <?= $service_type == 'box' ? 'hidden' : ''; ?>">
            <?php foreach ($bottom_icons as $bottom_icon) : ?>
                <a href="<?= $bottom_icon['url'] ?>" class="flex-1">
                    <img src="<?= $bottom_icon['icon'] ?>" class="w-12 lg:w-14 p-2 lg:p-3 h-12 lg:h-14 <?= $bg_by_st ?> rounded-2xl mx-auto mb-2">
                    <span class="text-11">
                        <?= $bottom_icon['text'] ?>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
        <!-- /Boxes -->

        <!-- Banner -->
        <div class="flex justify-center lg:hidden">
            <div class="mx-auto">
                <a href="<?= $banners['banner2']['url'] ?>">
                    <img src="<?= $banners['banner2']['image_url'] ?>" class="rounded-lg" alt="">
                </a>
            </div>
        </div>
        <!-- /Banner -->

        <!-- Snapp Video -->
        <div class="my-8">
            <!-- Heading -->
            <div class="flex justify-between">
                <h4 class="font-bold text-16 self-center"><?= $video['title'] ?></h4>
                <a href="<?= $video['showAllLink'] ?>" class="text-14 text-driver_app_primary_medium self-center">
                    <span class="ml-1">مشاهده همه</span>
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
            </div>
            <!-- /Heading -->

            <!-- Content -->
            <div dir="rtl" class="slide-container swiper">
                <div class="slide-content" id="snappvideo_carosoul">
                    <div class="card-wrapper swiper-wrapper">
                        <?php
                        $news_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 5,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'slug',
                                    'terms' => $video['cat'],
                                ),
                            ),
                        );

                        $news_query = new WP_Query($news_args);

                        if ($news_query->have_posts()) : ?>
                            <?php while ($news_query->have_posts()) :
                                $news_query->the_post(); ?>
                                <a href="<?php the_permalink() ?>" class="item bg-white rounded-xl shadow-md w-3/4 swiper-slide" style="height:auto;">
                                    <img class="w-full rounded-t-xl" src="<?php the_post_thumbnail_url() ?>" alt="">
                                    <div class="py-4 px-3 whitespace-normal">
                                        <h3 class="text-16">
                                            <?php the_title() ?>
                                        </h3>
                                    </div>

                                    <div class="flex justify-between px-3 py-2">
                                        <span class="text-10 text-t_secondary">
                                            <?= get_the_date(); ?>
                                        </span>
                                    </div>
                                </a>
                        <?php endwhile;
                        endif; ?>
                    </div>
                </div>

                <div class="swiper-button-next swiper-navBtn" id="button_next_svp"></div>
                <div class="swiper-button-prev swiper-navBtn" id="button_prev_svp"></div>
                <div class="swiper-pagination" id="snappvideo_pagination"></div>
            </div>
            <!-- /Content -->
        </div>
        <!-- /Snapp Video -->

        <!-- MapSpot Banner -->
        <div class="flex justify-between gap-4 my-8 lg:hidden">
            <div class="mx-auto">
                <a href="<?= $banners['banner4']['url'] ?>">
                    <img src="<?= $banners['banner4']['image_url'] ?>" class="rounded-lg" alt="">
                </a>
            </div>
        </div>
        <!-- /MapSpot Banner -->
    </div>

    <!--++++++++++++++++++++++++++++++++++++++++++++++ app download block-->
    <div class="bg-driver_bg_gray py-4">
        <div class="container app_download_section my-5 flex items-center flex-col justify-center px-4 md:px-40 md:grid md:grid-cols-2 md:gap-2 md:place-content-center">
            <div class="flex justify-end">
                <img class="h-72 md:h-full md:h-auto" src="<?= $app_dl['image'] ?>" alt="">
            </div>
            <div class="">
                <h2 class="font-extrabold text-2xl text-center
                 md:text-right my-2 dark:text-stone-300 md:mb-20 md:text-3xl"><?= $app_dl['title'] ?></h2>
                <p class="text-justify md:text-lg"><?= $app_dl['desc'] ?></p>
                <div class="flex flex-row gap-5 w-full md:w-96 items-center justify-between mt-5">
                    <a class="w-full h-10 bg-stone-300 dark:bg-secondary-500 dark:text-white text-secondary-500 rounded-lg font-medium text-sm flex items-center justify-center gap-2 shadow px-2 android_dl" href="<?= $app_dl['android'] ?>" target="_blank"><i class="fab fa-android"></i>اپلیکیشن ویژه
                        اندروید</a>
                    <?php if ($service_type != 'box') : ?>
                        <a class="w-full h-10 bg-stone-300 dark:bg-secondary-500 dark:text-white text-secondary-500 rounded-lg font-medium text-sm flex items-center justify-center gap-2 shadow px-2 ios_dl" href="<?= $app_dl['ios'] ?>" target="_blank"><i class="fab fa-apple"></i>اپلیکیشن ویژه
                            iOS</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!--++++++++++++++++++++++++++++++++++++++++++++++ end of app download block-->
</div>

<?php
get_footer();
?>