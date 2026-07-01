<?php

namespace P2TAE\Core;

use P2TAE\Database\Installer;

defined('ABSPATH') || exit;

class Activator
{
    /**
     * Run on plugin activation.
     */
    public static function activate(): void
    {
        Installer::install();

        update_option('p2tae_version', P2TAE_VERSION);

        if (!get_option('p2tae_settings')) {
            update_option('p2tae_settings', [
                'app_key'     => '',
                'app_secret'  => '',
                'tracking_id' => '',
            ]);
        }

        flush_rewrite_rules();
    }
}