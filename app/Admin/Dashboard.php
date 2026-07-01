<?php

namespace P2TAE\Admin;

defined('ABSPATH') || exit;

class Dashboard
{
    public static function render(): void
    {
        ?>

        <div class="wrap">

            <h1>Pick2Take Affiliate Engine</h1>

            <p>Version <?php echo esc_html(P2TAE_VERSION); ?></p>

            <hr>

            <h2>System Status</h2>

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
                    <td><?php echo class_exists('WooCommerce') ? '✅ Installed' : '❌ Missing'; ?></td>
                </tr>

            </table>

        </div>

        <?php
    }
}