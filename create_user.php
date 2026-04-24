<?php
header('Content-Type: application/json; charset=utf-8');

// 🔧 ساخت پوشه data
if(!is_dir(__DIR__.'/data')) {
    mkdir(__DIR__.'/data', 0777, true);
    chmod(__DIR__.'/data', 0777);
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    // حالت ساخت کاربر جدید
    $username = trim($_POST['username'] ?? '');
    if(empty($username) || !preg_match('/^[a-zA-Z0-9_-]{3,20}$/', $username)) {
        echo json_encode(['success'=>false,'message'=>'❌ نام 3-20 کاراکتر: حروف،عدد،_,-']);
        exit;
    }

    $dir = __DIR__.'/data/'.$username;
    if(is_dir($dir)) {
        echo json_encode(['success'=>false,'message'=>'❌ کاربر '.$username.' وجود داره']);
        exit;
    }

    // ساخت پوشه
    mkdir($dir, 0777, true);
    chmod($dir, 0777);

    // 🔥 فایل index.php (GET=سفید+track | POST=track+JSON)
    $indexFile = '<?php
// 🔥 AUTOMATIC VISIT TRACKER - GET & POST
header("Content-Type: text/html; charset=utf-8");

$statsFile = __DIR__."/stats.json";
$ip = $_SERVER["REMOTE_ADDR"] ?? "unknown";
$userAgent = substr($_SERVER["HTTP_USER_AGENT"] ?? "", 0, 100);
$date = date("Y-m-d H:i:s");
$week = date("Y-W");

// 📊 ثبت آمار بازدید (هر بار باز شدن)
$stats = json_decode(file_get_contents($statsFile) ?: "{}", true);
$stats["visits"][] = [
    "ip" => $ip,
    "userAgent" => $userAgent,
    "date" => $date,
    "week" => $week,
    "method" => $_SERVER["REQUEST_METHOD"] ?? "GET"
];
$stats["total"] = count($stats["visits"]);

// 📈 آمار امروز (24 ساعت اخیر)
$todayCount = count(array_filter($stats["visits"], function($v) {
    return strtotime($v["date"]) >= strtotime(date("Y-m-d 00:00:00"));
}));
$stats["today"] = $todayCount;

// 📊 آمار هفته جاری
$weekCount = count(array_filter($stats["visits"], function($v) {
    return $v["week"] == $week;
}));
$stats["thisWeek"] = $weekCount;

// 👥 IP های منحصر به فرد
$uniqueIPs = array_unique(array_column($stats["visits"], "ip"));
$stats["uniqueIPs"] = count($uniqueIPs);

// 📉 نمودار روزانه (7 روز)
$dailyData = []; $dailyLabels = [];
for($i = 6; $i >= 0; $i--) {
    $checkDate = date("Y-m-d", strtotime("-$i days"));
    $count = count(array_filter($stats["visits"], function($v) use ($checkDate) {
        return strpos($v["date"], $checkDate) === 0;
    }));
    $dailyLabels[] = date("j", strtotime($checkDate));
    $dailyData[] = $count;
}
$stats["dailyData"] = $dailyData;
$stats["dailyLabels"] = $dailyLabels;

// 📈 نمودار هفتگی (4 هفته)
$weeklyData = []; $weeklyLabels = [];
for($i = 3; $i >= 0; $i--) {
    $checkWeek = date("Y-W", strtotime("-$i weeks"));
    $count = count(array_filter($stats["visits"], function($v) use ($checkWeek) {
        return $v["week"] == $checkWeek;
    }));
    $weeklyLabels[] = "هفته " . ($i + 1);
    $weeklyData[] = $count;
}
$stats["weeklyData"] = $weeklyData;
$stats["weeklyLabels"] = $weeklyLabels;

file_put_contents($statsFile, json_encode($stats, JSON_UNESCAPED_UNICODE));

// 🔥 اگر POST بود → JSON برگردون
if($_SERVER["REQUEST_METHOD"] === "POST") {
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode([
        "success" => true,
        "message" => "✅ آمار ثبت شد",
        "total" => $stats["total"],
        "today" => $stats["today"]
    ]);
    exit;
}

// 🔥 GET = صفحه سفید خالی
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tracker</title>
    <style>body{margin:0;padding:0;background:#000;height:100vh;overflow:hidden;}</style>
</head>
<body></body>
</html>';

    file_put_contents($dir.'/index.php', $indexFile);
    chmod($dir.'/index.php', 0777);

    // فایل stats.json
    $initialStats = [
        "total" => 0, "today" => 0, "thisWeek" => 0, "uniqueIPs" => 0,
        "dailyData" => [0,0,0,0,0,0,0], "dailyLabels" => ["1","2","3","4","5","6","7"],
        "weeklyData" => [0,0,0,0], "weeklyLabels" => ["1","2","3","4"],
        "visits" => []
    ];
    file_put_contents($dir.'/stats.json', json_encode($initialStats, JSON_UNESCAPED_UNICODE));
    chmod($dir.'/stats.json', 0777);

    echo json_encode([
        'success' => true,
        'message' => '✅ کاربر <strong>'.$username.'</strong> ساخته شد!',
        'tracker_url' => 'data/'.$username.'/index.php'
    ]);
    exit;
}

// GET = لیست کاربران
$users = [];
if(is_dir(__DIR__.'/data')) {
    $dirs = array_diff(scandir(__DIR__.'/data'), ['.', '..']);
    foreach($dirs as $dir) {
        if(is_dir(__DIR__.'/data/'.$dir) && file_exists(__DIR__.'/data/'.$dir.'/stats.json')) {
            $stats = json_decode(file_get_contents(__DIR__.'/data/'.$dir.'/stats.json'), true);
            $users[] = [
                'name' => $dir,
                'total' => $stats['total'] ?? 0,
                'url' => 'data/'.$dir.'/index.php'
            ];
        }
    }
}
echo json_encode(['success'=>true,'users'=>$users]);
?>
