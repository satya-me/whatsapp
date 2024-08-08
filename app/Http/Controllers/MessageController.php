<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MessageController extends Controller
{

    public function MessageChecker(Request $request)
    {
        // Retrieve the values from the request
        $chatId = $request->input('chatId');
        $session = $request->input('session');
        $body = $request->input('body');
        $image = $request->file('image');



        // Check if an image was uploaded
        if ($request->hasFile('image')) {
            // Call the method to handle the file
            $fileRequest = new Request([
                'chatId' => $chatId,
                'session' => $session,
                'body' => $body,
                'image' => $image,
            ]);
            return $this->SendFile($fileRequest);
        } else {
            // Call the method to handle the text
            $textRequest = new Request([
                'chatId' => $chatId,
                'session' => $session,
                'body' => $body,
            ]);
            return $this->someFunText($textRequest);
        }
    }

    public function SendText(Request $request)
    {
        $response = Http::accept('application/json')
            ->withHeaders([
                'Content-Type' => 'application/json',
            ])
            ->post(env('BASE_URL') . '/api/sendText', [
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
            ->post(env('BASE_URL') . '/api/sendImage', [
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
        return $request;
        $response = Http::accept('application/json')
            ->withHeaders([
                'Content-Type' => 'application/json',
            ])
            ->post(env('BASE_URL') . '/api/sendFile', [
                'chatId' => '917568019312@c.us',
                'file' => [
                    'mimetype' => 'image/jpeg',
                    'filename' => 'filename.jpg',
                    'data' => 'https://github.com/devlikeapro/waha/raw/core/examples/dev.likeapro.jpg',
                ],
                'caption' => 'string',
                'session' => 'satyajit',
            ]);

        $data = $response->json();
    }


    public function imageToBase64($imagePath)
    {
        // Check if the file exists
        if (!file_exists($imagePath)) {
            return "File does not exist.";
        }

        // Get the file's MIME type
        $mimeType = mime_content_type($imagePath);

        // Read the file's contents
        $imageData = file_get_contents($imagePath);

        // Encode the data to Base64
        $base64Image = base64_encode($imageData);

        // Return the Base64-encoded image with MIME type prefix
        return [
            'mimeType' => $mimeType,
            'string' => $base64Image
        ];
    }
}
