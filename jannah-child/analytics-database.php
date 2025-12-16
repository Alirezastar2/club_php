<?php
/*
Template Name: Analytics Database
*/

// نمایش خطاها
error_reporting(E_ALL);
ini_set('display_errors', 1);

// تنظیمات پایگاه داده
$db_config = [
    'host' => 'localhost',
    'dbname' => 'your_database_name',
    'username' => 'your_username',
    'password' => 'your_password'
];

// اتصال به پایگاه داده
try {
    $pdo = new PDO(
        "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset=utf8mb4",
        $db_config['username'],
        $db_config['password'],
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
        ]
    );
} catch (PDOException $e) {
    die("خطا در اتصال به پایگاه داده: " . $e->getMessage());
}

// ایجاد جدول آمار (اگر وجود ندارد)
$create_table_sql = "
CREATE TABLE IF NOT EXISTS player_analytics (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    click_id VARCHAR(100) UNIQUE NOT NULL,
    session_id VARCHAR(100) NOT NULL,
    action VARCHAR(50) NOT NULL,
    player_title VARCHAR(255) NOT NULL,
    audio_src TEXT,
    audio_duration DECIMAL(10,2) DEFAULT 0,
    user_agent TEXT,
    screen_resolution VARCHAR(50),
    viewport_size VARCHAR(50),
    is_mobile BOOLEAN DEFAULT FALSE,
    referrer TEXT,
    url TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_session (session_id),
    INDEX idx_action (action),
    INDEX idx_player (player_title),
    INDEX idx_created (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

try {
    $pdo->exec($create_table_sql);
} catch (PDOException $e) {
    die("خطا در ایجاد جدول: " . $e->getMessage());
}

// پردازش درخواست‌های POST
if (isset($_POST['action']) && $_POST['action'] === 'save_click' && isset($_POST['data'])) {
    $clickData = json_decode($_POST['data'], true);
    if ($clickData) {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO player_analytics 
                (click_id, session_id, action, player_title, audio_src, audio_duration, 
                 user_agent, screen_resolution, viewport_size, is_mobile, referrer, url)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE
                action = VALUES(action),
                player_title = VALUES(player_title)
            ");
            
            $stmt->execute([
                $clickData['id'],
                $clickData['sessionId'],
                $clickData['action'],
                $clickData['playerData']['title'],
                $clickData['playerData']['audioSrc'],
                $clickData['playerData']['audioDuration'],
                $clickData['playerData']['userAgent'],
                $clickData['playerData']['screenResolution'],
                $clickData['playerData']['viewportSize'],
                $clickData['playerData']['isMobile'] ? 1 : 0,
                $clickData['playerData']['referrer'],
                $clickData['playerData']['url']
            ]);
            
            echo "SUCCESS";
            exit;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
            exit;
        }
    }
}

// دریافت آمار
try {
    // آمار کلی
    $total_clicks = $pdo->query("SELECT COUNT(*) as count FROM player_analytics")->fetch()['count'];
    $unique_sessions = $pdo->query("SELECT COUNT(DISTINCT session_id) as count FROM player_analytics")->fetch()['count'];
    $mobile_clicks = $pdo->query("SELECT COUNT(*) as count FROM player_analytics WHERE is_mobile = 1")->fetch()['count'];
    $desktop_clicks = $pdo->query("SELECT COUNT(*) as count FROM player_analytics WHERE is_mobile = 0")->fetch()['count'];
    
    // آمار بر اساس نوع عمل
    $action_stats = $pdo->query("
        SELECT action, COUNT(*) as count 
        FROM player_analytics 
        GROUP BY action 
        ORDER BY count DESC
    ")->fetchAll();
    
    // آمار بر اساس پلیر
    $player_stats = $pdo->query("
        SELECT player_title, COUNT(*) as count 
        FROM player_analytics 
        GROUP BY player_title 
        ORDER BY count DESC
    ")->fetchAll();
    
    // آخرین کلیک‌ها
    $recent_clicks = $pdo->query("
        SELECT action, player_title, is_mobile, created_at 
        FROM player_analytics 
        ORDER BY created_at DESC 
        LIMIT 10
    ")->fetchAll();
    
} catch (PDOException $e) {
    die("خطا در دریافت آمار: " . $e->getMessage());
}

?>
<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>آمار پلیرها - نسخه پایگاه داده</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>آمار پلیرها - نسخه پایگاه داده</h1>
            <p>گزارش کامل کلیک‌ها و تعاملات کاربران (پشتیبانی از میلیون‌ها کلیک)</p>
        </div>
        
        <!-- آمار کلی -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3><?php echo number_format($total_clicks); ?></h3>
                <p>تعداد کل کلیک‌ها</p>
            </div>
            <div class="stat-card">
                <h3><?php echo number_format($unique_sessions); ?></h3>
                <p>جلسات منحصر به فرد</p>
            </div>
            <div class="stat-card">
                <h3><?php echo number_format($mobile_clicks); ?></h3>
                <p>کلیک‌های موبایل</p>
            </div>
            <div class="stat-card">
                <h3><?php echo number_format($desktop_clicks); ?></h3>
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
                    <?php foreach ($action_stats as $stat): ?>
                    <tr>
                        <td><?php echo esc_html($stat['action']); ?></td>
                        <td><?php echo number_format($stat['count']); ?></td>
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
                    <?php foreach ($player_stats as $stat): ?>
                    <tr>
                        <td><?php echo esc_html($stat['player_title']); ?></td>
                        <td><?php echo number_format($stat['count']); ?></td>
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
                    <?php foreach ($recent_clicks as $click): ?>
                    <tr>
                        <td><?php echo esc_html($click['created_at']); ?></td>
                        <td><?php echo esc_html($click['player_title']); ?></td>
                        <td><?php echo esc_html($click['action']); ?></td>
                        <td><?php echo $click['is_mobile'] ? 'موبایل' : 'دسکتاپ'; ?></td>
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

