<?php

namespace P2TAE\Database;

defined('ABSPATH') || exit;

class Installer
{
    public static function install(): void
{
    global $wpdb;

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    $charset = $wpdb->get_charset_collate();

    $table = $wpdb->prefix . 'p2tae_logs';

    $sql = "CREATE TABLE {$table} (

        id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

        level VARCHAR(20) NOT NULL,

        message TEXT NOT NULL,

        context LONGTEXT NULL,

        created_at DATETIME NOT NULL,

        PRIMARY KEY (id)

    ) {$charset};";

    dbDelta($sql);

    update_option('p2tae_db_version', '1.0');
}
}