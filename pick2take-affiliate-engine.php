<?php
/**
 * Plugin Name: Pick2Take Affiliate Engine
 * Plugin URI: https://pick2take.com
 * Description: Professional Affiliate Import Engine for WooCommerce & AliExpress
 * Version: 0.3.0
 * Requires at least: 6.5
 * Requires PHP: 8.1
 * Author: Pick2Take
 * License: GPL v2 or later
 * Text Domain: pick2take-affiliate-engine
 */

defined('ABSPATH') || exit;

/*
|--------------------------------------------------------------------------
| Plugin Constants
|--------------------------------------------------------------------------
*/

define('P2TAE_VERSION', '0.3.0');
define('P2TAE_FILE', __FILE__);
define('P2TAE_PATH', plugin_dir_path(__FILE__));
define('P2TAE_URL', plugin_dir_url(__FILE__));

/*
|--------------------------------------------------------------------------
| Core Files
|--------------------------------------------------------------------------
*/

require_once P2TAE_PATH . 'app/Core/Autoloader.php';

\P2TAE\Core\Autoloader::register();

/*
|--------------------------------------------------------------------------
| Activation / Deactivation
|--------------------------------------------------------------------------
*/

register_activation_hook(
    P2TAE_FILE,
    ['P2TAE\Core\Activator', 'activate']
);

register_deactivation_hook(
    P2TAE_FILE,
    ['P2TAE\Core\Deactivator', 'deactivate']
);

/*
|--------------------------------------------------------------------------
| Boot Plugin
|--------------------------------------------------------------------------
*/

\P2TAE\Core\Plugin::instance()->boot();