<?php

namespace VANTI\Core;

abstract class ServiceProvider
{
    abstract public function register(): void;

    public function boot(): void
    {
        // Optional
    }
}