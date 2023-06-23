<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loginadmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class LoginadminController extends Controller
{
    public function showLoginForm()
    {
        return view('loginadmin');
    }

    
    public function admsign(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('username', 'password');
    
        $admins = Loginadmin::where('username', $credentials['username'])->first();
    
        if ($admins && password_verify($credentials['password'], $admins->password)) {
            // Authentication successful
            Auth::login($admins);
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard')->withSession($request->session());
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }
    
    public function logout(Request $request)
    {
        if ($request->isMethod('post')) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login/admin')->with('success', 'Logout successful');
        } else {
            abort(405); // Method Not Allowed
        }
    }

    public function tambahadminForm()
    {
    
        return view('tambahadmin');
    
    }

    public function tambahadmin(Request $request)
    {
        // Validasi input dari form pendaftaran
        $validatedData = $request->validate([
            'username' => 'required|unique:loginadmins',
            'password' => 'required',
        ]);
    
        $admins = Loginadmin::create([
            'id' => uniqid(), // Generate a unique ID for the user
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
        ]);

        
        // Perform any additional security checks or actions here

        // Redirect or perform any other actions after successful registration
        return redirect()->back()->with('success', 'Registrasi berhasil!');

    }

    

}
