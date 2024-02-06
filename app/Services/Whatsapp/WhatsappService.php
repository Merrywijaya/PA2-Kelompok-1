<?php

namespace App\Services\Whatsapp;

class WhatsappService extends Whatsapp
{
    private $headers;
    private $client;
    private $body;

    public function __construct()
    {
        parent::__construct();
        $this->headers = [
            'Authorization' => $this->api_key,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];
        $this->client = new \GuzzleHttp\Client(['headers' => $this->headers]);
    }

    public function sendMessage($phone, $message)
    {
        $this->body = [
            'phone' => $phone,
            'message' => $message
        ];
        try {
            $response = $this->client->post($this->domain . '/api/send-message', ['body' => json_encode($this->body)]);
            return json_decode($response->getBody()->getContents());
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            return $e->getResponse()->getBody()->getContents();
        }
    }
}
