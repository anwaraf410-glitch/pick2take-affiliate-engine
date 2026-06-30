<?php
/**
 * Plugin Name: Pick2Take Affiliate Engine
 * Plugin URI: https://pick2take.com
 * Description: Professional Affiliate Import Engine for WooCommerce
 * Version: 0.2.0
 * Requires at least: 6.5
 * Requires PHP: 8.1
 * Author: Pick2Take
 * License: GPL v2 or later
 * Text Domain: pick2take-affiliate-engine
 */

defined('ABSPATH') || exit;

define('P2TAE_VERSION', '0.2.0');
define('P2TAE_FILE', __FILE__);
define('P2TAE_PATH', plugin_dir_path(__FILE__));
define('P2TAE_URL', plugin_dir_url(__FILE__));

require_once P2TAE_PATH . 'app/Core/Plugin.php';

\P2TAE\Core\Plugin::instance()->boot();