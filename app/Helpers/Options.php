<?php

namespace P2TAE\Helpers;

defined('ABSPATH') || exit;

class Options
{
    private const OPTION_NAME = 'p2tae_settings';

    public static function all(): array
    {
        return get_option(self::OPTION_NAME, []);
    }

    public static function get(string $key, $default = '')
    {
        $options = self::all();

        return $options[$key] ?? $default;
    }

    public static function set(array $values): bool
    {
        return update_option(self::OPTION_NAME, $values);
    }

    public static function configured(): bool
    {
        return
            self::get('app_key') !== '' &&
            self::get('app_secret') !== '' &&
            self::get('tracking_id') !== '';
    }
}