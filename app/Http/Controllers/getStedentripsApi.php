<?php

namespace App\Http\Controllers;

use App\Models\hotel;
use Illuminate\Http\Request;
use App\Http\IdP\idC;

class getStedentripsApi extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    protected $bearerToken = "";
    protected $bearerCredentials = "";
    protected $returnData = "";
    protected $geverifieerd = "";
    protected $hotelData = null;

    public function __construct()
    {
    }

    public function checkToken()
    {
//        $username = htmlspecialchars($_POST['username']);
        $username = htmlspecialchars(request()->input('username'));
//        $password = htmlspecialchars($_POST['password']);
        $password = htmlspecialchars(request()->input('password'));

        $allHeaders = getallheaders();
        $authorization = $allHeaders['Authorization'];
        list($type, $data) = explode(" ", $authorization, 2);
        $this->bearerToken = $data;

        $this->bearerCredentials = array();
        $this->bearerCredentials['username'] = $username;
        $this->bearerCredentials['password'] = $password;

        $idc = new IdC($this->bearerToken, $this->bearerCredentials);

        return $idc->decodeToken();
    }

    private function getHotelData()
    {
        return hotel::first();
    }

    public function getService()
    {
        $this->geverifieerd = $this->checkToken();


        if (!$this->geverifieerd) {
            $this->returnData = array(
                "message" => "Error: Unauthorized Request.",
                "status" => '401',
                "bearerToken" => $this->bearerToken,
            );
        } else {
            $this->hotelData = $this->getHotelData();
            $this->returnData = array(
                "message" => "API Get Service uitgevoerd.",
                "status" => '200',
                "bearerToken" => $this->bearerToken,
                "hotel" => $this->hotelData->name,
                "hotelRooms" => $this->hotelData->rooms

            );
        }

        header("HTTP/1.1 " . $this->returnData['status']);
        header("Access-Control-Allow-Origin: *");
        header("Content-Type:application/json;charset=UTF-8");
        header("X-Content-Type-Options: nosniff");
        header("Cache-Control: max-age=100");
        echo json_encode($this->returnData);
        exit;
    }

    public function __invoke(Request $request)
    {
        // service uitvoeren
        $api = new GetStedentripsApi();
        $api->getService();
    }
}
