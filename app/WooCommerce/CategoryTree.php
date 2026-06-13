<?php

namespace VANTI\WooCommerce;

class CategoryTree
{
    public static function get(): array
    {
        $categories = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
            'orderby'    => 'menu_order',
            'order'      => 'ASC',
        ]);

        if (is_wp_error($categories)) {
            return [];
        }

        $items = [];
        $tree = [];

        foreach ($categories as $category) {
            $items[$category->term_id] = [
                'id'          => $category->term_id,
                'name'        => $category->name,
                'slug'        => $category->slug,
                'description' => $category->description,
                'parent'      => $category->parent,
                'count'       => $category->count,
                'url'         => get_term_link($category),
                'children'    => [],
            ];
        }

        foreach ($items as $id => $item) {

            if ($item['parent'] > 0 && isset($items[$item['parent']])) {

                $items[$item['parent']]['children'][] = &$items[$id];

            } else {

                $tree[] = &$items[$id];

            }
        }

        return array_values($tree);
    }

    public static function json(): string
    {
        return wp_json_encode(
            self::get(),
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
    }
}