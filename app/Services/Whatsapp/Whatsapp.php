<?php

namespace App\Services\Whatsapp;

class Whatsapp
{
    protected $api_key;
    protected $domain;

    public function __construct()
    {
        $this->api_key = config('whatsapp.security_token_wablas');
        $this->domain = config('whatsapp.domain_wablas');
    }
}
