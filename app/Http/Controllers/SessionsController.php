<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {

        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:users,email',
                'password' => 'required|min:5',
            ]);
        } else {
            $request->validate([
                'login_id' => 'required|exists:users,username',
                'password' => 'required|min:5',
            ]);
        }

        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password,
        );

        if (!auth()->attempt($creds)) {
            throw ValidationException::withMessages([
                'email or username' => 'is invalid'
            ]);
        }

        session()->regenerate();

        return redirect()->route('home')->with('success', 'Welcome Back');
    }

    public function destroy() {

        auth()->logout();

        return redirect()->route('home')->with('success', 'Goodbye!');
    }
}
