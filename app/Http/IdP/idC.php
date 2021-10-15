<?php

namespace App\Http\IdP;
use App\Http\JWT\jwt_helper;

class idC extends jwt_helper
{
    protected $bearerCredentials = "";
    protected $bearerToken = "";

    public function __construct($bearerToken, $bearerCredentials)
    {
        $this->bearerToken = $bearerToken;
        $this->bearerCredentials = $bearerCredentials;
    }

    public function decodeToken()
    {
        $decoded = jwt_helper::decode($this->bearerToken, 'secret_server_keys');
        if (($decoded->username ==
                $this->bearerCredentials['username']) &&
            ($decoded->password ==
                $this->bearerCredentials['password']) &&
            ($decoded->exp > time())) {
            return true;
        } else {
            return false;
        }
    }
}
