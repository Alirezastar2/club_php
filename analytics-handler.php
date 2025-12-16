<?php
/**
 * پردازشگر آمار پلیرها
 */

// نمایش خطاها
error_reporting(E_ALL);
ini_set('display_errors', 1);

// فایل ذخیره آمار
$analytics_file = 'player_analytics_data.json';

// پردازش درخواست‌های POST
if (isset($_POST['action']) && $_POST['action'] === 'save_click' && isset($_POST['data'])) {
    $clickData = json_decode($_POST['data'], true);
    if ($clickData) {
        $existing_data = [];
        if (file_exists($analytics_file)) {
            $existing_data = json_decode(file_get_contents($analytics_file), true) ?: [];
        }
        $existing_data[] = $clickData;
        file_put_contents($analytics_file, json_encode($existing_data, JSON_UNESCAPED_UNICODE));
        echo "SUCCESS";
        exit;
    }
}

echo "ERROR";
?>

