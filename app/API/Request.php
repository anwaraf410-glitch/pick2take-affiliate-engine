<?php

namespace P2TAE\API;

use P2TAE\Helpers\Options;

defined('ABSPATH') || exit;

class Request
{
    protected HttpClient $http;

    public function __construct()
    {
        $this->http = new HttpClient();
    }

    public function send(string $method, array $payload = []): Response
    {
        $params = [

            'app_key' => Options::get('app_key'),

            'method' => $method,

            'sign_method' => 'sha256',

            'timestamp' => gmdate('Y-m-d H:i:s'),

            'format' => 'json',

            'v' => '2.0',

        ];

        $params = array_merge($params, $payload);

        $params['sign'] = Signature::generate(
            $params,
            Options::get('app_secret')
        );

        $response = $this->http->post(
            Endpoints::GATEWAY,
            [
                'timeout' => 30,
                'body' => $params
            ]
        );

        return new Response(
            $this->http->body($response)
        );
    }
}