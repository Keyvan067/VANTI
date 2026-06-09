<?php

namespace VANTI\Providers;

use VANTI\Core\ServiceProvider;
use VANTI\Assets\AssetManager;

class AssetsProvider extends ServiceProvider
{
    public function register(): void
    {
        new AssetManager();
    }
}