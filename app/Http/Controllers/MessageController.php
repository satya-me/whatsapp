<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MessageController extends Controller
{

    public function MMSChecker(Request $request)
    {

    }

    public function SendText(Request $request)
    {
        $response = Http::accept('application/json')
            ->withHeaders([
                'Content-Type' => 'application/json',
            ])
            ->post('http://192.168.1.9:3000/api/sendText', [
                'chatId' => '917568019312@c.us',
                'text' => 'Hi there! Pushkar',
                'session' => 'satyajit',
            ]);

        $data = $response->json();
    }
    public function SendImage(Request $request)
    {
        $response = Http::accept('application/json')
            ->withHeaders([
                'Content-Type' => 'application/json',
            ])
            ->post('http://192.168.1.9:3000/api/sendImage', [
                'chatId' => '917568019312@c.us',
                'file' => [
                    'mimetype' => 'image/jpeg',
                    'filename' => 'filename.jpg',
                    'url' => 'https://cdn.pixabay.com/photo/2023/09/17/04/05/woman-8257787_1280.jpg',
                ],
                'caption' => 'string',
                'session' => 'satyajit',
            ]);

        $data = $response->json();
    }
    public function SendFile(Request $request)
    {
        $response = Http::accept('application/json')
            ->withHeaders([
                'Content-Type' => 'application/json',
            ])
            ->post('http://192.168.1.9:3000/api/sendFile', [
                'chatId' => '917568019312@c.us',
                'file' => [
                    'mimetype' => 'image/jpeg',
                    'filename' => 'filename.jpg',
                    'url' => 'https://github.com/devlikeapro/waha/raw/core/examples/dev.likeapro.jpg',
                ],
                'caption' => 'string',
                'session' => 'satyajit',
            ]);

        $data = $response->json();
    }
}
