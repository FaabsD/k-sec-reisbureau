<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\IdP\IdP;
use Illuminate\Support\Facades\Gate;

class getStedentrips extends Controller
{
    public function index()
    {
        $response = Gate::inspect('has-API-access', auth()->user());
        if ($response->denied()) {
            return response($response->message(), '403');
        }

        $username = auth()->user()->name;
        $password = auth()->user()->password;
        $credentials = array();
        $credentials['username'] = $username;
        $credentials['password'] = $password;
        $credentials['exp'] = time() + (60 * 60);

        $idp = new IdP($credentials);

        $token = $idp->getToken();

        $APIurl = route('stedentripsAPI');

        // creëer url resource
        $ch = curl_init($APIurl);

        // set header options
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer " . $token));

        // post gegevens
        $curl_post_data = array(
            'apiKey' => '1234567890',
            'username' => $username,
            'password' => $password,
        );

        // enable post method
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);

        // return results as string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // run service request
        $response = curl_exec($ch);

        $resultStatus = curl_getinfo($ch);
        // decodeer de response in arrayvorm
        $decoded = json_decode($response, true);
        curl_close($ch);
        return view('hotel', ['data' => $decoded]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
