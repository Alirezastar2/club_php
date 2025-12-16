<?php
/**
 * تست سیستم آمار
 */

// نمایش خطاها
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>تست سیستم آمار</h1>";

// بررسی فایل آمار
$analytics_file = 'player_analytics_data.json';

echo "<h2>بررسی فایل آمار:</h2>";
if (file_exists($analytics_file)) {
    echo "<p>✅ فایل آمار موجود است</p>";
    echo "<p>مسیر: " . realpath($analytics_file) . "</p>";
    echo "<p>حجم: " . filesize($analytics_file) . " بایت</p>";
    
    $content = file_get_contents($analytics_file);
    $data = json_decode($content, true);
    
    if ($data) {
        echo "<p>✅ فایل JSON معتبر است</p>";
        echo "<p>تعداد رکوردها: " . count($data) . "</p>";
        
        if (count($data) > 0) {
            echo "<h3>نمونه داده:</h3>";
            echo "<pre>" . print_r($data[0], true) . "</pre>";
        }
    } else {
        echo "<p>❌ فایل JSON معتبر نیست</p>";
        echo "<p>محتوای فایل:</p>";
        echo "<pre>" . htmlspecialchars($content) . "</pre>";
    }
} else {
    echo "<p>❌ فایل آمار موجود نیست</p>";
    echo "<p>مسیر جستجو: " . realpath('.') . "/" . $analytics_file . "</p>";
}

// تست پردازشگر آمار
echo "<h2>تست پردازشگر آمار:</h2>";
if (file_exists('analytics-handler.php')) {
    echo "<p>✅ پردازشگر آمار موجود است</p>";
} else {
    echo "<p>❌ پردازشگر آمار موجود نیست</p>";
}

// تست فایل آمار در مسیر تم
echo "<h2>تست فایل آمار در مسیر تم:</h2>";
if (file_exists('jannah-child/analytics.php')) {
    echo "<p>✅ فایل آمار در مسیر تم موجود است</p>";
    
    // تست فایل JSON در مسیر تم
    if (file_exists('jannah-child/player_analytics_data.json')) {
        echo "<p>✅ فایل JSON در مسیر تم موجود است</p>";
    } else {
        echo "<p>❌ فایل JSON در مسیر تم موجود نیست</p>";
    }
} else {
    echo "<p>❌ فایل آمار در مسیر تم موجود نیست</p>";
}

echo "<hr>";
echo "<h2>دستورات تست:</h2>";
echo "<p>1. <a href='test-analytics.php'>تست این صفحه</a></p>";
echo "<p>2. <a href='analytics-handler.php'>تست پردازشگر</a></p>";
echo "<p>3. <a href='jannah-child/analytics.php'>تست فایل آمار</a></p>";
?>
