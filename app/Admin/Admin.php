<?php

namespace P2TAE\Admin;

defined('ABSPATH') || exit;

class Admin
{
    public function init(): void
    {
        add_action('admin_menu', [$this, 'menu']);
    }

    public function menu(): void
    {
        add_menu_page(
            'Pick2Take Affiliate Engine',
            'Pick2Take',
            'manage_options',
            'pick2take-engine',
            [$this, 'dashboard'],
            'dashicons-store',
            30
        );
    }

    public function dashboard(): void
    {
        ?>
        <div class="wrap">

            <h1>Pick2Take Affiliate Engine</h1>

            <p>Version <?php echo esc_html(P2TAE_VERSION); ?></p>

            <table class="widefat striped">

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
                            ? '✅ Installed'
                            : '❌ Not Installed';
                        ?>
                    </td>
                </tr>

            </table>

        </div>
        <?php
    }
}