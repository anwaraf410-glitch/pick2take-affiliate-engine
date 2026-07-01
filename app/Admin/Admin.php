<?php

namespace P2TAE\Admin;

defined('ABSPATH') || exit;

class Admin
{
    /**
     * Initialize Admin.
     */
    public function init(): void
    {
        $settings = new Settings();
        $settings->init();

        add_action('admin_menu', [$this, 'menu']);
    }

    /**
     * Register admin menus.
     */
    public function menu(): void
    {
        // Main Menu
        add_menu_page(
            'Pick2Take Affiliate Engine',
            'Pick2Take',
            'manage_options',
            'pick2take-engine',
            [$this, 'dashboard'],
            'dashicons-store',
            56
        );

        // Dashboard
        add_submenu_page(
            'pick2take-engine',
            'Dashboard',
            'Dashboard',
            'manage_options',
            'pick2take-engine',
            [$this, 'dashboard']
        );

        // Settings
        add_submenu_page(
            'pick2take-engine',
            'Settings',
            'Settings',
            'manage_options',
            'pick2take-settings',
            ['P2TAE\Admin\Settings', 'render']
        );

        // Import Products
        add_submenu_page(
            'pick2take-engine',
            'Import Products',
            'Import Products',
            'manage_options',
            'pick2take-import',
            [$this, 'importProducts']
        );
    }

    /**
     * Dashboard Page.
     */
    public function dashboard(): void
    {
        ?>
        <div class="wrap">

            <h1>Pick2Take Affiliate Engine</h1>

            <p><strong>Version <?php echo esc_html(P2TAE_VERSION); ?></strong></p>

            <h2>System Status</h2>

            <table class="widefat striped">

                <tbody>

                <tr>
                    <th>WordPress</th>
                    <td><?php echo esc_html(get_bloginfo('version')); ?></td>
                </tr>

                <tr>
                    <th>PHP</th>
                    <td><?php echo esc_html(PHP_VERSION); ?></td>
                </tr>

                <tr>
                    <th>WooCommerce</th>
                    <td>
                        <?php
                        echo class_exists('WooCommerce')
                            ? 'Installed ✅'
                            : 'Not Installed ❌';
                        ?>
                    </td>
                </tr>

                </tbody>

            </table>

        </div>
        <?php
    }

    /**
     * Import Products Page.
     */
    public function importProducts(): void
    {
        $importer = new \P2TAE\Import\Importer();
        $importer->render();
    }
}