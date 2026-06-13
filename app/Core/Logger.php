<?php

namespace VANTI\Core;

class Logger
{
    /**
     * ثبت یک لاگ جدید در فایل vanti.log
     */
    public static function log(string $message, string $level = 'INFO'): void
    {

        try {
            $log_dir = VANTI_DIR_PATH . '/storage';
            $log_file = $log_dir . '/vanti.log';

            // ساخت پوشه استوریج در صورت عدم وجود
            if (!file_exists($log_dir)) {
                wp_mkdir_p($log_dir);
            }

            if (!is_dir($log_dir)) {
                return;
            }

            $timestamp = current_time('mysql');
            $formatted_message = sprintf("[%s] [%s]: %s" . PHP_EOL, $timestamp, strtoupper($level), $message);

            error_log($formatted_message, 3, $log_file);
        } catch (\Throwable $e) {
            self::exception($e);
        }
    }


    public static function exception(\Throwable $e): void
    {
        self::log(
            sprintf(
                '%s in %s:%d',
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            ),
            'ERROR'
        );
    }
}