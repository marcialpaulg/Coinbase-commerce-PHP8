<?php

namespace MarcialPaulG\Coinbase\Interface;

interface Checkout
{

    const RESOURCE_URI = 'checkouts';

    const NO_PRICE = 'no_price';

    const FIXED_PRICE = 'fixed_price';

    const REQUEST_INFO = ['email', 'name'];
}
