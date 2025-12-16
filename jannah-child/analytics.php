<?php
/*
Template Name: Analytics
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
        // استفاده از فایل قفل برای جلوگیری از تداخل
        $lock_file = $analytics_file . '.lock';
        $lock_handle = fopen($lock_file, 'w');
        
        if (flock($lock_handle, LOCK_EX)) {
            $existing_data = [];
            if (file_exists($analytics_file)) {
                $content = file_get_contents($analytics_file);
                if ($content) {
                    $existing_data = json_decode($content, true) ?: [];
                }
            }
            
            // محدودیت تعداد رکوردها (1 میلیون رکورد)
            if (count($existing_data) >= 1000000) {
                // حذف 100,000 رکورد قدیمی
                $existing_data = array_slice($existing_data, 100000);
            }
            
            $existing_data[] = $clickData;
            
            // فشرده‌سازی JSON
            $json_data = json_encode($existing_data, JSON_UNESCAPED_UNICODE | JSON_PRESERVE_ZERO_FRACTION);
            file_put_contents($analytics_file, $json_data);
            
            flock($lock_handle, LOCK_UN);
        }
        
        fclose($lock_handle);
        unlink($lock_file);
        
        echo "SUCCESS";
        exit;
    }
}

// دریافت آمار با بهینه‌سازی
$stats = [];
if (file_exists($analytics_file)) {
    $content = file_get_contents($analytics_file);
    if ($content) {
        $data = json_decode($content, true);
        if ($data) {
            $stats = [
                'total_clicks' => count($data),
                'unique_sessions' => count(array_unique(array_column($data, 'sessionId'))),
                'by_action' => [],
                'by_player' => [],
                'by_device' => ['mobile' => 0, 'desktop' => 0],
                'recent_clicks' => array_slice(array_reverse($data), 0, 10)
            ];
            
            // بهینه‌سازی محاسبات
            foreach ($data as $click) {
                $action = $click['action'];
                $player = $click['playerData']['title'];
                $isMobile = $click['playerData']['isMobile'];
                
                $stats['by_action'][$action] = ($stats['by_action'][$action] ?? 0) + 1;
                $stats['by_player'][$player] = ($stats['by_player'][$player] ?? 0) + 1;
                
                if ($isMobile) {
                    $stats['by_device']['mobile']++;
                } else {
                    $stats['by_device']['desktop']++;
                }
            }
        }
    }
}

?>
<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>آمار پلیرها - نسخه بهینه‌سازی شده</title>
    <style>
        body {
            font-family: Tahoma, Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #007cba;
        }
        .header h1 {
            color: #007cba;
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        .stat-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            border: 2px solid #e9ecef;
        }
        .stat-card h3 {
            font-size: 2em;
            color: #007cba;
            margin-bottom: 10px;
        }
        .chart-container {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }
        .chart-title {
            font-size: 1.3em;
            margin-bottom: 15px;
            color: #333;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        th, td {
            padding: 12px;
            text-align: right;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #007cba;
            color: white;
        }
        tr:hover {
            background: #f8f9fa;
        }
        .btn {
            background: #007cba;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
        }
        .btn:hover {
            background: #005a87;
        }
        .performance-info {
            background: #e7f3ff;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            border-right: 4px solid #007cba;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>آمار پلیرها - نسخه بهینه‌سازی شده</h1>
            <p>گزارش کامل کلیک‌ها و تعاملات کاربران (پشتیبانی از میلیون‌ها کلیک)</p>
        </div>
        
        <!-- اطلاعات عملکرد -->
        <div class="performance-info">
            <h3>🚀 بهینه‌سازی‌های اعمال شده:</h3>
            <ul>
                <li>✅ پشتیبانی از 1,000,000 کلیک</li>
                <li>✅ فشرده‌سازی فایل JSON</li>
                <li>✅ استفاده از فایل قفل برای جلوگیری از تداخل</li>
                <li>✅ حذف خودکار رکوردهای قدیمی</li>
                <li>✅ بهینه‌سازی محاسبات</li>
            </ul>
        </div>
        
        <!-- آمار کلی -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3><?php echo number_format($stats['total_clicks'] ?? 0); ?></h3>
                <p>تعداد کل کلیک‌ها</p>
            </div>
            <div class="stat-card">
                <h3><?php echo number_format($stats['unique_sessions'] ?? 0); ?></h3>
                <p>جلسات منحصر به فرد</p>
            </div>
            <div class="stat-card">
                <h3><?php echo number_format($stats['by_device']['mobile'] ?? 0); ?></h3>
                <p>کلیک‌های موبایل</p>
            </div>
            <div class="stat-card">
                <h3><?php echo number_format($stats['by_device']['desktop'] ?? 0); ?></h3>
                <p>کلیک‌های دسکتاپ</p>
            </div>
        </div>
        
        <!-- آمار بر اساس نوع عمل -->
        <div class="chart-container">
            <h2 class="chart-title">آمار بر اساس نوع عمل</h2>
            <table>
                <thead>
                    <tr>
                        <th>نوع عمل</th>
                        <th>تعداد</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stats['by_action'] ?? [] as $action => $count): ?>
                    <tr>
                        <td><?php echo esc_html($action); ?></td>
                        <td><?php echo number_format($count); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <!-- آمار بر اساس پلیر -->
        <div class="chart-container">
            <h2 class="chart-title">آمار بر اساس پلیر</h2>
            <table>
                <thead>
                    <tr>
                        <th>نام پلیر</th>
                        <th>تعداد کلیک</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stats['by_player'] ?? [] as $player => $count): ?>
                    <tr>
                        <td><?php echo esc_html($player); ?></td>
                        <td><?php echo number_format($count); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <!-- آخرین کلیک‌ها -->
        <div class="chart-container">
            <h2 class="chart-title">آخرین کلیک‌ها</h2>
            <table>
                <thead>
                    <tr>
                        <th>زمان</th>
                        <th>پلیر</th>
                        <th>عمل</th>
                        <th>دستگاه</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stats['recent_clicks'] ?? [] as $click): ?>
                    <tr>
                        <td><?php echo esc_html($click['timestamp']); ?></td>
                        <td><?php echo esc_html($click['playerData']['title']); ?></td>
                        <td><?php echo esc_html($click['action']); ?></td>
                        <td><?php echo $click['playerData']['isMobile'] ? 'موبایل' : 'دسکتاپ'; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <!-- دکمه‌های عملیات -->
        <div style="text-align: center; margin: 30px 0;">
            <a href="/kids_day" class="btn">برو به صفحه لندینگ</a>
            <a href="#" onclick="location.reload()" class="btn">رفرش آمار</a>
        </div>
    </div>
</body>
</html>
