<?php

namespace use P2TAE\Core\Activator;

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
    require_once P2TAE_PATH . 'app/Core/Autoloader.php';

    Autoloader::register();

    register_activation_hook(P2TAE_FILE, [Activator::class, 'activate']);

    add_action('plugins_loaded', [$this, 'load']);
}

    public function load(): void
    {
        $admin = new \P2TAE\Admin\Admin();
        $admin->init();
    }
}