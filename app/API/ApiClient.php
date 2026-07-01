<?php

namespace P2TAE\API;

use P2TAE\Helpers\Options;

defined('ABSPATH') || exit;

class ApiClient
{
    public function appKey(): string
    {
        return Options::get('app_key');
    }

    public function appSecret(): string
    {
        return Options::get('app_secret');
    }

    public function trackingId(): string
    {
        return Options::get('tracking_id');
    }

    public function configured(): bool
    {
        return Options::configured();
    }
}