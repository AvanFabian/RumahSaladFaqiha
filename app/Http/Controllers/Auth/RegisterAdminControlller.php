<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterAdminControlller extends Controller
{
    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $messages = [
            'username.required' => 'The username field is required.',
            'username.unique' => 'The username has already been taken.',
            'password.required' => 'The password field is required.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.min' => 'The password must be at least 8 characters.',
        ];
    
        $request->validate([
            'username' => 'required|unique:admins',
            'password' => 'required|confirmed|min:8',
        ], $messages);
    
        Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
    
        return redirect('/admin/login');
    }
}
