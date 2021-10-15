<?php

namespace App\Http\IdP;
use App\Http\JWT\JWT;

class IdP extends JWT
{
    protected $bearerCredentials = "";
    protected $bearerToken = "";
    protected $credentials = "";
    public function __construct($bearerCredentials) {
        $this->bearerCredentials = $bearerCredentials;
    }
    public function getToken() {
        $token = JWT::encode($this->bearerCredentials, "secret_server_keys");
        return $token;
    }
}
