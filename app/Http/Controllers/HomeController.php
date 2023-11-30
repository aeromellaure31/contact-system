<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $contact = Contact::where('user_id', $user_id)->orderBy('id','desc')->paginate(5);
        return view('home.index', compact('contact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        
        Contact::create($data);

        return redirect()->route('home.index')->with('success','Contact has been created.');
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $contact->fill($request->post())->save();
        return redirect()->route('home.index')->with('success','Contact has been updated');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('home.index')->with('success','Contact has been deleted');
    }
}