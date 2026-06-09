<?php

namespace VANTI\Core;

class Application
{
    /**
     * نمونه سینگلتون از کلاس اپلیکیشن
     */
    private static ?Application $instance = null;

    /**
     * لیست پرووایدرهای ثبت شده
     */
    private array $providers = [];

    /**
     * دریافت نمونه اصلی و واحد کلاس (Singleton)
     */
    public static function getInstance(): Application
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * سازنده کلاس به صورت Private برای جلوگیری از ساخت نمونه‌های متعدد
     */
    private function __construct()
    {
        // آماده‌سازی اولیه در صورت نیاز
    }

    /**
     * راه‌اندازی و اجرای پرووایدرهای قالب
     * * @param array $providers لیست نام کلاس‌های پرووایدر
     */
    public function run(array $providers): void
    {
        // گام اول: ثبت (Register) تمام پرووایدرها در کانتینر
        foreach ($providers as $providerClass) {
            if (class_exists($providerClass)) {
                $provider = new $providerClass();

                if ($provider instanceof ServiceProvider) {
                    $provider->register();
                    $this->providers[] = $provider;
                }
            }
        }

        // گام دوم: بوت (Boot) کردن پرووایدرها در زمان لود شدن قالب وردپرس
        add_action('after_setup_theme', [$this, 'bootProviders']);
    }

    /**
     * اجرای متد boot روی تک‌تک پرووایدرها
     */
    public function bootProviders(): void
    {
        foreach ($this->providers as $provider) {
            // چون متد boot در کلاس پایه ServiceProvider اجباری نبود،
            // ابتدا چک می‌کنیم که آیا پرووایدر این متد را دارد یا خیر
            if (method_exists($provider, 'boot')) {
                $provider->boot();
            }
        }
    }
}