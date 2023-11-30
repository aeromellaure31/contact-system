<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->to('login')->withErrors(trans('auth.failed'));
        }

        $request->validate([
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            Auth::login($user);
            return $this->authenticated($request, $user);
        }
        return redirect()->to('login')->withErrors(trans('auth.failed'));
    }
    
    protected function authenticated(Request $request, $user) 
    {
        return redirect()->intended();
    }
}