<?php

namespace P2TAE\Core;

defined('ABSPATH') || exit;

use P2TAE\Admin\Admin;

class Plugin
{
    /**
     * Plugin instance.
     */
    private static ?Plugin $instance = null;

    /**
     * Get singleton instance.
     */
    public static function instance(): Plugin
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Boot plugin.
     */
    public function boot(): void
    {
        require_once P2TAE_PATH . 'app/Core/Autoloader.php';

        Autoloader::register();

        add_action('plugins_loaded', [$this, 'load']);
    }

    /**
     * Load plugin services.
     */
    public function load(): void
    {
        if (is_admin()) {
            (new Admin())->init();
        }

        /**
         * Future:
         * API
         * Importers
         * Cron
         * Logger
         */
    }
}