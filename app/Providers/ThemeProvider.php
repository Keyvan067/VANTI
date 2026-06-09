<?php

namespace VANTI\Providers;

use VANTI\Core\ServiceProvider;
use VANTI\Theme\Setup;

class ThemeProvider extends ServiceProvider
{
    public function register(): void
    {
        new Setup();
    }
}