<?php

namespace P2TAE\Helpers;

defined('ABSPATH') || exit;

class System
{
    public static function woocommerce(): bool
    {
        return class_exists('WooCommerce');
    }

    public static function php(): string
    {
        return PHP_VERSION;
    }

    public static function wordpress(): string
    {
        return get_bloginfo('version');
    }
}