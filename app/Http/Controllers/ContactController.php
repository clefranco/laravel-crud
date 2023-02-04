<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(ContactRequest $request)
    {
        $contact = new Contact([
            'name' => $request->get('name'),
            'contact' => $request->get('contact'),
            'email' => $request->get('email')
        ]);
        $contact->save();
        return redirect('/contacts')->with('success', 'Contact saved.');
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(ContactRequest $request, $id)
    {
        $contact = Contact::find($id);

        $contact->name =  $request->get('name');
        $contact->contact = $request->get('contact');
        $contact->email = $request->get('email');
        $contact->save();

        return redirect('/contacts')->with('success', 'Contact updated.');
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('/contacts')->with('success', 'Contact removed.');
    }
}
