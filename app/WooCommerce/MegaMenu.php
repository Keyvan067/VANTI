<?php

namespace VANTI\WooCommerce;

class MegaMenu
{
    public static function getCategories(): array
    {
        return CategoryTree::get();
    }

    public static function getCategoriesJson(): string
    {
        return CategoryTree::json();
    }
}