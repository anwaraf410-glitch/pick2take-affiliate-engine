<?php

namespace P2TAE\Admin;

defined('ABSPATH') || exit;

class Menu
{
    public function init(): void
    {
        add_action('admin_menu', [$this, 'register']);
    }

    public function register(): void
    {
        add_menu_page(
            'Pick2Take Affiliate Engine',
            'Pick2Take',
            'manage_options',
            'pick2take-engine',
            [Dashboard::class, 'render'],
            'dashicons-store',
            26
        );

        add_submenu_page(
            'pick2take-engine',
            'Dashboard',
            'Dashboard',
            'manage_options',
            'pick2take-engine',
            [Dashboard::class, 'render']
        );

        add_submenu_page(
            'pick2take-engine',
            'Settings',
            'Settings',
            'manage_options',
            'pick2take-settings',
            [Settings::class, 'render']
        );
    }
}