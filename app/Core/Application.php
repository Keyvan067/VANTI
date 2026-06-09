<?php

namespace VANTI\Core;

class Application
{
    /**
     * Registered providers
     *
     * @var array
     */
    protected array $providers = [];

    /**
     * Register a provider
     */
    public function register(ServiceProvider $provider): void
    {
        $this->providers[] = $provider;

        $provider->register();
    }
}