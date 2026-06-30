<?php

namespace P2TAE\Core;

use P2TAE\Database\Installer;

defined('ABSPATH') || exit;

class Activator
{
    public static function activate(): void
    {
        Installer::install();

        update_option('p2tae_version', P2TAE_VERSION);

        flush_rewrite_rules();
    }
}