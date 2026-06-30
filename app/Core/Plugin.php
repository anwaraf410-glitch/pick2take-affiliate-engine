<?php

namespace P2TAE\Core;

defined('ABSPATH') || exit;

class Plugin
{
    private static ?Plugin $instance = null;

    public static function instance(): Plugin
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function boot(): void
    {
        add_action('plugins_loaded', [$this, 'load']);
    }

    public function load(): void
    {
        require_once P2TAE_PATH . 'app/Admin/Admin.php';

        $admin = new \P2TAE\Admin\Admin();
        $admin->init();
    }
}