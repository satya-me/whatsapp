<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function group_contact(){
        return view('contact-groups');
    }

    public function send_message(){
        return view('send-message');
    }
}
