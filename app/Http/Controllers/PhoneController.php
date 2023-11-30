<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function display(){
        return view('phone.index');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        
        Phone::create($request->all());

        return redirect()->route('phone.index')->with('success','Contact has been created.');
    }

    public function destroy(Phone $phone){
        $phone->delete();
        return redirect()->route('phone.index')->with('success','Contact has been deleted');
    }
}
