<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;


/**
 * Initialize the main class
 */
function success_endpoint(){
    Dotenv::createImmutable(__DIR__)->load();        
    
    try{
        if(empty($_GET['success']) || $_GET['success'] !== 'true'){
            throw new \Exception('success param missing');
        }

        if(empty($_GET['email']) || empty($_GET['passport_country'])){
            throw new \Exception('email & passport_country param missing');
        }

        $subject = 'New Order Placed from ' . $_GET['email'];
        $body = '<b>Email</b>: ' .  $_GET['email'] . ' <br>' .
        '<b>Name:</b> ' .  $_GET['name'] . ' <br>' .
        '<b>Date:</b> ' .  $_GET['date'] . ' <br>' .
        '<b>Plan:</b> ' .  $_GET['plan'] . ' <br>' .
        '<b>Length of stay:</b> ' .  $_GET['length'] . ' <br>' .
        '<b>Country to visit:</b> ' .  $_GET['country'] . ' <br>' .
        '<b>Passport Country:</b> ' .  $_GET['passport_country'] . ' <br>' .
        '<b>Visited Countries:</b> ' . $_GET['visited-countries'] . ' <br>' .
        '<b>Comments:</b> ' .  $_GET['comments'] . ' <br>' 
        ;

        $emailService = new StripePhp\App\EmailService();
        $emailService->send($_ENV['ORDER_EMAIL'], $subject, $body);
        
    }catch(\Exception $ex){
        //print_r($ex->getMessage());
    }finally{
        header('Location: /?' . 'success=' . $_GET['success'] . '&session=' . $_GET['session']);
    }
}

// kick-off the class
success_endpoint();