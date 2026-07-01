<?php

namespace P2TAE\API;

defined('ABSPATH') || exit;

class Response
{
    protected array $data = [];

    public function __construct(array $response)
    {
        $this->data = $response;
    }

    public function all(): array
    {
        return $this->data;
    }

    public function success(): bool
    {
        return empty($this->data['error_response']);
    }

    public function error(): ?string
    {
        if ($this->success()) {
            return null;
        }

        return $this->data['error_response']['msg'] ?? 'Unknown error';
    }
}