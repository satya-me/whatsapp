<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SessionController extends Controller
{
    public function GetSession(Request $request)
    {
        $response = Http::accept('application/json')
            ->get(env('BASE_URL') . '/api/sessions', [
                'all' => 'false',
            ]);

        $data = $response->json();
        return $data;
    }

    public function GetMe($sessionID)
    {
        // Retrieve the route parameter using the Request object
        $mySession = $sessionID;

        // return response()->json([
        //     'my_session' => $mySession
        // ]);


        $response = Http::accept('application/json')
            ->get(
                env('BASE_URL') . '/api/sessions/' . $mySession . '/me',
            );

        $data = $response->json();
        return $data;
    }
}
