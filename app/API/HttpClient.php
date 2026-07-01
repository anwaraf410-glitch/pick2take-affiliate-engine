<?php

namespace P2TAE\API;

defined('ABSPATH') || exit;

class HttpClient
{
    public function get(string $url, array $args = [])
    {
        return wp_remote_get($url, $args);
    }

    public function post(string $url, array $args = [])
    {
        return wp_remote_post($url, $args);
    }

    public function body($response): array
    {
        $body = wp_remote_retrieve_body($response);

        return json_decode($body, true) ?: [];
    }
}