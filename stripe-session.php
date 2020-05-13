<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;


/**
 * Initialize the main class
 */
function stripe_session(){
    Dotenv::createImmutable(__DIR__)->load();        
    (new StripePhp\App\StripeSession())->create();
}

// kick-off the class
stripe_session();