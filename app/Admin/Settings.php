<?php

namespace P2TAE\Admin;

defined('ABSPATH') || exit;

class Settings
{
    public function init(): void
    {
        add_action('admin_init', [$this, 'register']);
    }

    public function register(): void
    {
        register_setting(
            'p2tae_settings_group',
            'p2tae_settings'
        );
    }
}