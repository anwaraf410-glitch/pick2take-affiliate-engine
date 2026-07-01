<?php

namespace P2TAE\API;

defined('ABSPATH') || exit;

class Endpoints
{
    public const GATEWAY = 'https://api-sg.aliexpress.com/sync';

    public const SEARCH_PRODUCTS = 'aliexpress.affiliate.product.query';

    public const PRODUCT_DETAILS = 'aliexpress.affiliate.productdetail.get';

    public const HOT_PRODUCTS = 'aliexpress.affiliate.hotproduct.query';
}