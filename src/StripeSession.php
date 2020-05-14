<?php

namespace StripePhp\App;

use GuzzleHttp\Client;

/**
 * Stripe Session Class
 */
final class StripeSession{

    /**
     * GuzzleHttp Client
     * 
     * @var GuzzleHttp | object
     */
    private $client;

    /**
     * User plan
     * 
     * @var String | 'BASIC'
     */
    private $plan;

    /**
     * Initialize the class
     */
    public function __construct(){
        $this->client = new Client(['base_uri' => $_ENV['STRIPE_BASE_URL']]);
        $this->plan   = isset($_GET['plan']) ? strtoupper($_GET['plan']) : $_ENV['DEFAULT_PLAN']; 
    }

    /**
     * Create stripe session
     * 
     * @return json
     */
    public function create(){
        $output = [];
        try{
            $headers = [
                'Authorization' => 'Bearer ' . $_ENV['STRIPE_KEY'],        
                'Accept'        => 'application/x-www-form-urlencoded',
            ];
            $data = [
                'success_url'          => $_ENV['SUCCESS_URL'],
                'cancel_url'           => $_ENV['CANCEL_URL'],
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'name'        => $_ENV["{$this->plan}.NAME"],
                        'description' => $_ENV["{$this->plan}.DESCRIPTION"],
                        'amount'      => floatval($_ENV["{$this->plan}.PRICE"]) * 100,
                        'currency'    => 'usd',
                        'quantity'    => 1,
                    ],
                ],
                'mode' => 'payment',
            ];

            $response = $this->client->request('POST', $_ENV['STRIPE_SESSION_URL'],
                ['form_params' => $data, 'headers' => $headers]
            );
            $obj = json_decode($response->getBody());
            $output = [
                'success' => 1,
                'id' => $obj->id
            ];
        }catch(\Exception $ex){
            $output = [
                'success' => 0,
                'message' => $ex->getMessage()
            ];
        }finally{
            header('Content-type: application/json');
            echo json_encode( $output );
        }
    }
}