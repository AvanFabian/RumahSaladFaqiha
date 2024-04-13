<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminControlller extends Controller
{
    public function showLoginForm()
    {
        // return Inertia::render('Admin/Login');
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $messages = [
            'username.required' => 'The username field is required.',
            'password.required' => 'The password field is required.',
        ];
    
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], $messages);

        $credentials = $request->only('username', 'password');
        
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/admin');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/admin/login');
    }
}
