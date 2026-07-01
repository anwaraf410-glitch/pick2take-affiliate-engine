<?php

namespace P2TAE\Admin;

use P2TAE\API\TestConnection;

defined('ABSPATH') || exit;

class Settings
{
    /**
     * Initialize settings.
     */
    public function init(): void
    {
        add_action('admin_init', [$this, 'register']);
    }

    /**
     * Register plugin settings.
     */
    public function register(): void
    {
        register_setting(
            'p2tae_settings',
            'p2tae_settings',
            [
                'sanitize_callback' => [$this, 'sanitize'],
                'default' => [],
            ]
        );

        add_settings_section(
            'p2tae_aliexpress',
            'AliExpress API Settings',
            function () {
                echo '<p>Enter your AliExpress Portals API credentials.</p>';
            },
            'p2tae_settings'
        );

        $fields = [
            'app_key'     => 'App Key',
            'app_secret'  => 'App Secret',
            'tracking_id' => 'Tracking ID',
        ];

        foreach ($fields as $id => $label) {

            add_settings_field(
                $id,
                $label,
                [$this, 'renderField'],
                'p2tae_settings',
                'p2tae_aliexpress',
                [
                    'id' => $id,
                    'label' => $label,
                ]
            );
        }
    }

    /**
     * Render field.
     */
    public function renderField(array $args): void
    {
        $options = get_option('p2tae_settings', []);

        $value = $options[$args['id']] ?? '';

        ?>
        <input
            type="<?php echo $args['id'] === 'app_secret' ? 'password' : 'text'; ?>"
            class="regular-text"
            autocomplete="off"
            name="p2tae_settings[<?php echo esc_attr($args['id']); ?>]"
            value="<?php echo esc_attr($value); ?>">
        <?php
    }

    /**
     * Sanitize settings.
     */
    public function sanitize(array $input): array
    {
        return [
            'app_key'     => sanitize_text_field($input['app_key'] ?? ''),
            'app_secret'  => sanitize_text_field($input['app_secret'] ?? ''),
            'tracking_id' => sanitize_text_field($input['tracking_id'] ?? ''),
        ];
    }

    /**
     * Render settings page.
     */
    public static function render(): void
    {
        ?>
        <div class="wrap">

            <h1>Pick2Take Affiliate Engine</h1>

            <form method="post" action="options.php">

                <?php
                settings_fields('p2tae_settings');
                do_settings_sections('p2tae_settings');
                submit_button('Save Settings');
                ?>

            </form>

            <hr>

            <h2>API Connection Test</h2>

            <?php

            if (isset($_POST['p2tae_test_connection'])) {

                check_admin_referer('p2tae_test_connection');

                $response = (new TestConnection())->test();

                if ($response->success()) {

                    echo '<div class="notice notice-success"><p><strong>✅ Connected Successfully.</strong></p></div>';

                } else {

                    echo '<div class="notice notice-error"><p><strong>❌ '
                        . esc_html($response->error())
                        . '</strong></p></div>';
                }
            }

            ?>

            <form method="post">

                <?php wp_nonce_field('p2tae_test_connection'); ?>

                <?php submit_button(
                    'Test Connection',
                    'secondary',
                    'p2tae_test_connection',
                    false
                ); ?>

            </form>

        </div>
        <?php
    }
}