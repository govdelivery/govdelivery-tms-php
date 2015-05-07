<?php
namespace Tms;

class Client {
    public $auth_token;
    public $api_root;

    public function __construct( $auth_token, $api_root = 'https://tms.govdelivery.com' ) {
        $this->auth_token = $auth_token;
        $this->api_root = $api_root;
    }
}
