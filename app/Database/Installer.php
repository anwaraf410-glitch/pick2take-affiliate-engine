<?php

namespace P2TAE\Database;

defined('ABSPATH') || exit;

class Installer
{
    /**
     * Database version.
     */
    public const DB_VERSION = '1.0.0';

    /**
     * Install database tables.
     */
    public static function install(): void
    {
        global $wpdb;

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        $charset = $wpdb->get_charset_collate();

        $logsTable = $wpdb->prefix . 'p2tae_logs';

        $sql = "CREATE TABLE {$logsTable} (

            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

            level VARCHAR(20) NOT NULL,

            message TEXT NOT NULL,

            context LONGTEXT NULL,

            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

            PRIMARY KEY (id)

        ) {$charset};";

        dbDelta($sql);

        update_option('p2tae_db_version', self::DB_VERSION);
    }
}