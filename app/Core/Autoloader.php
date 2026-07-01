<?php

namespace P2TAE\Core;

defined('ABSPATH') || exit;

class Autoloader
{
    /**
     * Register autoloader.
     */
    public static function register(): void
    {
        spl_autoload_register([self::class, 'autoload']);
    }

    /**
     * Load class automatically.
     */
    private static function autoload(string $class): void
    {
        if (!str_starts_with($class, 'P2TAE\\')) {
            return;
        }

        $relative = substr($class, strlen('P2TAE\\'));

        $relative = str_replace('\\', DIRECTORY_SEPARATOR, $relative);

        $file = P2TAE_PATH . 'app/' . $relative . '.php';

        if (is_readable($file)) {
            require_once $file;
        }
    }
}