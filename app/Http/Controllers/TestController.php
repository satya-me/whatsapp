<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Contacts;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function group_contact(){
        return view('contact-groups');
    }

    public function send_message(){
        return view('send-message');
    }

    public function store_contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country_code' => 'required|string|max:10',
            'contact_no' => 'required|string|max:20',
            'status' => 'required|string|in:active,inactive',
        ]);

        Contacts::create($validated);

        return redirect()->route('contacts.index')->with('success', 'Contact added successfully.');
    }

    public function store_group(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contacts_allowed' => 'required|integer',
        ]);

        Groups::create($validated);

        return redirect()->route('groups.index')->with('success', 'Group added successfully.');
    }
}
