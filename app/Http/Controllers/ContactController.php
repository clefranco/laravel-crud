<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;


class ContactController extends Controller
{
    public function index()
    {
        try {
            $contacts = Contact::all();
            return view('contacts.index', compact('contacts'));
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function create()
    {
        try {
            return view('contacts.create');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function store(StoreContactRequest $request)
    {
        try {
            $contact = new Contact([
                'name' => $request->get('name'),
                'contact' => $request->get('contact'),
                'email' => $request->get('email')
            ]);
            $contact->save();
            return redirect('/contacts')->with('success', 'Contact saved.');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $contact = Contact::find($id);
            return view('contacts.show', compact('contact'));
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $contact = Contact::find($id);
            return view('contacts.edit', compact('contact'));
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function update(UpdateContactRequest $request, $id)
    {
        try {
            $contact = Contact::find($id);

            $contact->name =  $request->get('name');
            $contact->contact = $request->get('contact');
            $contact->email = $request->get('email');
            $contact->save();

            return redirect('/contacts')->with('success', 'Contact updated.');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $contact = Contact::find($id);
            $contact->delete();

            return redirect('/contacts')->with('success', 'Contact removed.');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
