<?php

namespace P2TAE\API;

defined('ABSPATH') || exit;

class Signature
{
    /**
     * Generate TOP API signature.
     *
     * @param array  $params
     * @param string $appSecret
     * @return string
     */
    public static function generate(array $params, string $appSecret): string
    {
        ksort($params);

        $string = '';

        foreach ($params as $key => $value) {

            if ($key === 'sign') {
                continue;
            }

            if ($value === '' || $value === null) {
                continue;
            }

            $string .= $key . $value;
        }

        return strtoupper(
            hash_hmac(
                'sha256',
                $string,
                $appSecret
            )
        );
    }
}