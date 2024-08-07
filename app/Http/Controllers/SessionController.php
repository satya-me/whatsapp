<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SessionController extends Controller
{
    public function GetSession(Request $request)
    {
        $response = Http::accept('application/json')
            ->get('http://192.168.1.9:3000/api/sessions', [
                'all' => 'false',
            ]);

        $data = $response->json();
        return $data;
    }
}
