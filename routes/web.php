<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
    return view('welcome');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/group_contact', [TestController::class, 'group_contact'])->name('group_contact');
Route::get('/send_message', [TestController::class, 'send_message'])->name('send_message');
Route::post('/store_contact', [TestController::class, 'store_contact'])->name('store_contact');
Route::post('/store_group', [TestController::class, 'store_group'])->name('store_group');


Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/contact_view', [ContactController::class, 'contact_view'])->name('contact_view');
Route::get('/create', [ContactController::class, 'create'])->name('create');
Route::post('/admin/store_contact', [ContactController::class, 'store'])->name('admin.store_contact');
Route::post('/edit-contacts', [ContactController::class, 'update'])->name('update_contact');

Route::post('/assign-contact-to-group', [ContactController::class, 'assignContactToGroup'])->name('assign_contact_to_group');
Route::get('/groups/{group}/contacts', [ContactController::class, 'showGroupContacts'])->name('group.contacts');
Route::delete('/groups/{group}/contacts/{contact}', [ContactController::class, 'removeContactFromGroup'])->name('contact.remove_from_group');



// Update Contact
Route::post('/admin/update_contact', [ContactController::class, 'update'])->name('admin.update_contact');

// Delete Contact
Route::delete('/admin/delete_contact/{id}', [ContactController::class, 'destroy'])->name('admin.delete_contact');

Route::get('/create_group', [ContactController::class, 'create_group'])->name('create_group');
Route::post('/admin/store_group', [ContactController::class, 'group'])->name('admin.store_group');
// Delete Contact
Route::delete('/admin/delete_group/{id}', [ContactController::class, 'destroy_group'])->name('admin.delete_group');


