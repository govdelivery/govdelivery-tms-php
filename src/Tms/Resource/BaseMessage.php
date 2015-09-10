<?php
namespace Tms\Resource;

use \Tms\Client;

abstract class BaseMessage
{
    public $recipients;

    protected $client;
    protected $message = array();
    protected $response;
    protected $message_type;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->recipients = new Recipients();
    }

    public function build(array $message)
    {
        $this->message = array_merge($message);
    }

    public function get()
    {
        return $this->response;
    }

    public function post()
    {
        $ch = curl_init($this->client->api_root . $this->message_type);
        $post_fields = json_encode(array_merge($this->message, $this->recipients->get()));

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-AUTH-TOKEN: ' . $this->client->auth_token,
            'Content-Type: application/json;',
            'charset: utf-8',
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);

        $response = curl_exec($ch);

        if ($response === false) {
            $error_response = new \stdClass();
            $error_response->errors = new \stdClass();
            $error_response->errors->curl = array(curl_error($ch));

            return $this->response = $error_response;
        }

        return $this->response = json_decode(curl_exec($ch));
    }
}
