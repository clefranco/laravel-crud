<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:5|max:100',
            'contact'=>'required|max:9',
            'email'=>'required|email'
        ]);
        // Getting values from the blade template form
        $contact = new Contact([
            'name' => $request->get('name'),
            'contact' => $request->get('contact'),
            'email' => $request->get('email')
        ]);
        $contact->save();
        return redirect('/contacts')->with('success', 'Contact saved.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|min:5|max:100',
            'contact'=>'required|max:9',
            'email'=>'required|email'
        ]);
        $contact = Contact::find($id);

        $contact->name =  $request->get('name');
        $contact->contact = $request->get('contact');
        $contact->email = $request->get('email');
        $contact->save();

        return redirect('/contacts')->with('success', 'Contact updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('/contacts')->with('success', 'Contact removed.');
    }
}
