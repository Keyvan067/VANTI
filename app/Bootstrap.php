<?php

use VANTI\Core\Application;
use VANTI\Providers\AssetsProvider;
use VANTI\Providers\ThemeProvider;
use VANTI\Providers\WooCommerceProvider;

// ۱. لود کردن خودکار کلاس‌ها توسط کامپوزر (Autoloader)
// چون این فایل در پوشه app قرار دارد، یک پوشه عقب می‌رویم تا به vendor برسیم.
if (file_exists(dirname(__DIR__) . '/vendor/autoload.php')) {
    require_once dirname(__DIR__) . '/vendor/autoload.php';
}

// ۲. تعریف ثابت‌های عمومی و کاربردی قالب
if (!defined('VANTI_DIR_PATH')) {
    define('VANTI_DIR_PATH', dirname(__DIR__));
}
if (!defined('VANTI_DIR_URI')) {
    define('VANTI_DIR_URI', get_template_directory_uri());
}

// ۳. گرفتن نمونه اصلی اپلیکیشن (Singleton)
$app = Application::getInstance();

/**
 * ۴. لیست تمام پرووایدرهای قالب
 * هر پرووایدر جدیدی که می‌سازی (مثل ووکامرس، منوها، تنظیمات ادمین و...)
 * را باید به این آرایه اضافه کنی تا به صورت خودکار توسط سیستم بوت شود.
 */
$providers = [
    AssetsProvider::class,
    ThemeProvider::class,
    WooCommerceProvider::class, // پرووایدر جدید ووکامرس اضافه شد
];

// ۵. روشن کردن موتور قالب و اجرای چرخه حیات پرووایدرها
$app->run($providers);