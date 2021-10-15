<?php

namespace App\Http\IdP;
use App\Http\JWT\jwt_helper;

class IdP extends jwt_helper
{
    protected $bearerCredentials = "";
    protected $bearerToken = "";
    protected $credentials = "";
    public function __construct($bearerCredentials) {
        $this->bearerCredentials = $bearerCredentials;
    }
    public function getToken() {
        $token = jwt_helper::encode($this->bearerCredentials, "secret_server_keys");
        return $token;
    }
}
