<?php

namespace VANTI\Providers;

use VANTI\Core\ServiceProvider;
use VANTI\Theme\Setup;

class ThemeProvider extends ServiceProvider
{
    /**
     * ثبت خدمات (در صورت نیاز به کانتینر)
     */
    public function register(): void
    {
        // فعلاً نیازی به ریجستر اختصاصی نداریم
    }

    /**
     * اجرای تنظیمات پوسته
     */
    public function boot(): void
    {
        /**
         * نکته مهم: از آنجایی که کلاس Application ما خودش متد boot پرووایدرها را
         * روی اکشن 'after_setup_theme' وردپرس اجرا می‌کند، نیازی به نوشتن اکشن مجدد نیست
         * و کدهای تنظیمات قالب مستقیماً همین‌جا اجرا می‌شوند.
         */
//        $setup = new Setup();
//        $setup->init();
        (new Setup())->init();
    }
}