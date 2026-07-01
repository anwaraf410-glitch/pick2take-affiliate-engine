<?php

namespace P2TAE\API;

defined('ABSPATH') || exit;

class TestConnection
{
    /**
     * Test API connection.
     */
    public function test(): Response
    {
        $request = new Request();

        return $request->send(
            Endpoints::HOT_PRODUCTS,
            [
                'page_no' => 1,
                'page_size' => 1,
            ]
        );
    }
}