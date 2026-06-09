<?php
// ۱. لود کردن وردپرس و امنیت (۳ پوشه عقب‌تر)
$wp_root = dirname(__DIR__, 3);
$wp_load = $wp_root . '/wp-load.php';

if (file_exists($wp_load)) {
    require_once $wp_load;
} else {
    die('Cannot find wp-load.php');
}

if (!defined('VANTI_PATH')) {
    define('VANTI_PATH', __DIR__);
}

// فقط مدیر سایت دسترسی داشته باشد
if (!function_exists('current_user_can') || !current_user_can('manage_options')) {
    die('Access denied');
}

$log_file = VANTI_PATH . '/storage/vanti.log';

// قابلیت پاک کردن لاگ‌ها
if (isset($_GET['clear']) && $_GET['clear'] == '1') {
    if (file_exists($log_file)) {
        file_put_contents($log_file, '');
    }
    header('Location: ' . strtok($_SERVER["REQUEST_URI"], '?'));
    exit;
}

// ۲. خواندن و پردازش خطاهای PHP
$logs = [];
if (file_exists($log_file) && filesize($log_file) > 0) {
    // خواندن برعکس فایل (نمایش جدیدترین خطاها در ابتدا)
    $lines = array_reverse(file($log_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));

    foreach ($lines as $line) {
        // جدا کردن تاریخ از متن خطا
        if (preg_match('/^\[([^\]]+)\]\s+(.*)$/', $line, $matches)) {
            $time = $matches[1];
            $message = $matches[2];
            $type = 'INFO';

            // تشخیص هوشمند نوع خطا برای استایل‌دهی
            if (stripos($message, 'Fatal error') !== false || stripos($message, 'Uncaught') !== false) {
                $type = 'FATAL';
            } elseif (stripos($message, 'Warning') !== false) {
                $type = 'WARNING';
            } elseif (stripos($message, 'Notice') !== false) {
                $type = 'NOTICE';
            } elseif (stripos($message, 'Deprecated') !== false) {
                $type = 'DEPRECATED';
            }

            $logs[] = ['time' => $time, 'type' => $type, 'message' => $message];
        } else {
            $logs[] = ['time' => '---', 'type' => 'RAW', 'message' => $line];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>VANTI Debugger</title>
    <style>
        body { font-family: Tahoma, sans-serif; background: #0f172a; color: #e2e8f0; padding: 20px; margin: 0; font-size: 14px; }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #334155; padding-bottom: 15px; margin-bottom: 20px; }
        .btn-clear { background: #ef4444; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 12px; }
        .btn-clear:hover { background: #dc2626; }
        .log-item { background: #1e293b; padding: 12px; margin-bottom: 8px; border-radius: 6px; border-right: 5px solid #64748b; display: flex; flex-direction: column; gap: 5px; }
        .log-meta { display: flex; gap: 15px; font-size: 11px; color: #94a3b8; font-family: monospace; }
        .badge { padding: 2px 6px; border-radius: 3px; font-weight: bold; text-transform: uppercase; }
        .msg { font-family: monospace; white-space: pre-wrap; word-break: break-all; color: #cbd5e1; direction: ltr; text-align: left; }

        /* رنگ‌بندی خطاها */
        .badge-FATAL { background: #fee2e2; color: #991b1b; }
        .log-FATAL { border-right-color: #ef4444; background: #2d1a1a; }
        .badge-WARNING { background: #fef3c7; color: #92400e; }
        .log-WARNING { border-right-color: #f59e0b; background: #2d241a; }
        .badge-NOTICE { background: #e0f2fe; color: #075985; }
        .log-NOTICE { border-right-color: #0ea5e9; }
        .badge-DEPRECATED { background: #f3e8ff; color: #6b21a8; }
        .badge-INFO { background: #e2e8f0; color: #334155; }
        .no-logs { text-align: center; color: #94a3b8; padding: 40px; font-size: 16px; }
    </style>
</head>
<body>

<div class="header">
    <h2>پنل عیب‌یابی پوسته VANTI</h2>
    <?php if (!empty($logs)): ?>
        <a href="?clear=1" class="btn-clear">پاک کردن کل لاگ‌ها</a>
    <?php endif; ?>
</div>

<?php if (empty($logs)): ?>
    <div class="no-logs">✨ هیچ خطایی ثبت نشده است. پروژه مثل ساعت کار می‌کند!</div>
<?php else: ?>
    <div>
        <?php foreach ($logs as $log): ?>
            <div class="log-item log-<?php echo $log['type']; ?>">
                <div class="log-meta">
                    <span class="badge badge-<?php echo $log['type']; ?>"><?php echo $log['type']; ?></span>
                    <span>⏱ <?php echo $log['time']; ?></span>
                </div>
                <div class="msg"><?php echo htmlspecialchars($log['message']); ?></div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

</body>
</html>