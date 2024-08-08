<?php
namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Contact;
use function Psy\debug;
use App\Models\Contacts;
use App\Models\ContactGroup;
use Illuminate\Http\Request;
use App\Models\ContactGroups;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contacts::all();
        $groups = Groups::all();
        return view('contact-groups', compact('groups','contacts'));
    }

    public function contact_view()
    {
        $contacts = Contacts::all(); // Fetch all contacts

        return view('view_contact', compact('contacts'));

    }

    public function create()
    {
        return view('contact_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country_code' => 'required|string|max:10',
            'contact_no' => 'required|string|max:15',
            'status' => 'required|string|max:50',
            'group_id' => 'nullable|exists:groups,id',
        ]);

        Contacts::create($request->all());

        return redirect()->route('contact_view')->with('success', 'Contact added successfully!');
    }


    public function update(Request $request)
    {
        // return $request;


        // $request->validate([
        //     'contact_id' => 'required|exists:contacts,id',
        //     'name' => 'required|string|max:255',
        //     'country_code' => 'required|string|max:10',
        //     'contact_no' => 'required|string|max:15',
        //     'status' => 'required|string|max:50',
        // ]);

        $contact = Contacts::find($request->id);

        $contact->update([
            "name" => $request->name,
            "country_code" => $request->country_code,
            "contact_no" => $request->contact_no,
            "status" => $request->status,
        ]);

        // $contact->update($request->only(['name', 'country_code', 'contact_no', 'status']));

        return redirect()->back()->with('success', 'Contact updated successfully!');
    }

    public function destroy($id)
    {
        $contact = Contacts::find($id);
        if ($contact) {
            $contact->delete();
            return redirect()->back()->with('success', 'Contact deleted successfully!');
        }
        return redirect()->back()->with('error', 'Contact not found!');
    }

    public function create_group()
    {
        return view('create_group');
    }

    public function group(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contacts_allowed' => 'required',

        ]);

        Groups::create($request->all());

        return redirect()->route('contacts')->with('success', 'Contact added successfully!');
    }

    public function destroy_group($id)
    {
        $group = Groups::find($id);
        if ($group) {
            $group->delete();
            return redirect()->back()->with('success', 'Contact deleted successfully!');
        }
        return redirect()->back()->with('error', 'Contact not found!');
    }

    // public function assignContactToGroup(Request $request)
    // {
    //     // Validate the request data
    //     $validated = $request->validate([
    //         'contact_id' => 'required|exists:contacts,id',
    //         'group_id' => 'required|exists:groups,id',
    //     ]);

    //     // Log the validated data for debugging
    //     Log::info('Validated data', $validated);

    //     // Store the data in the contact_groups table
    //     ContactGroup::create($validated);

    //     return redirect()->back()->with('success', 'Contact added to group successfully.');
    // }


    public function assignContactToGroup(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'group_id' => 'required|exists:groups,id',
        ]);

        // Check if the contact already exists in the group
        $exists = ContactGroup::where('contact_id', $validated['contact_id'])
                                ->where('group_id', $validated['group_id'])
                                ->exists();

        if ($exists) {
            // Redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'Contact number already exists in this group.']);
        }

        // Log the validated data for debugging
        Log::info('Validated data', $validated);

        // Store the data in the contact_groups table
        ContactGroup::create($validated);

        return redirect()->back()->with('success', 'Contact added to group successfully.');
    }

    public function showGroupContacts($groupId)
    {
        $group = Groups::findOrFail($groupId);
        $contacts = Contacts::whereHas('groups', function ($query) use ($groupId) {
            $query->where('group_id', $groupId);
        })->get();

        return view('group_contacts', compact('group', 'contacts'));
    }

    public function removeContactFromGroup($groupId, $contactId)
    {
        // Validate the inputs
        $validatedData = [
            'group_id' => $groupId,
            'contact_id' => $contactId,
        ];

        // Find the contact-group relationship and delete it
        $contactGroup = ContactGroup::where('group_id', $validatedData['group_id'])
                                    ->where('contact_id', $validatedData['contact_id'])
                                    ->first();

        if ($contactGroup) {
            $contactGroup->delete();
            return Redirect::back()->with('success', 'Contact removed from the group successfully.');
        } else {
            return Redirect::back()->withErrors(['error' => 'Contact not found in the group.']);
        }
    }


}
