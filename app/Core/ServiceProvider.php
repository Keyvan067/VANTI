<?php

namespace VANTI\Core;

abstract class ServiceProvider
{
    abstract public function register(): void;
}