<?php

namespace P2TAE\Core;

defined('ABSPATH') || exit;

class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register([self::class, 'autoload']);
    }

    private static function autoload(string $class): void
    {
        if (strpos($class, 'P2TAE\\') !== 0) {
            return;
        }

        $class = str_replace('P2TAE\\', '', $class);
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

        $file = P2TAE_PATH . 'app/' . $class . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
    }
}