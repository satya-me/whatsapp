<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SessionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Session
Route::get('/get/all/session', [SessionController::class, 'GetSession'])->name('GetSession');
Route::get('/get/me/session/{my_session?}', [SessionController::class, 'GetMe'])->name('GetMe');


// Message
Route::post('/send/message', [MessageController::class, 'MessageChecker'])->name('MMSChecker');
Route::post('/send/text', [MessageController::class, 'SendText'])->name('SendText');
Route::post('/send/image', [MessageController::class, 'SendImage'])->name('SendImage');
Route::post('/send/file', [MessageController::class, 'SendFile'])->name('SendFile');
