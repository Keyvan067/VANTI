<?php

namespace VANTI;

use VANTI\Core\Application;
use VANTI\Providers\ThemeProvider;
use VANTI\Providers\AssetsProvider;

class Bootstrap
{
    public static function boot(): void
    {
        $app = new Application();

        $app->register(
            new ThemeProvider()
        );

        $app->register(
            new AssetsProvider()
        );
    }
}