<?php

/*
namespace App\Http\Controllers;

use App\Models\Loginuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'message' => 'Invalid username or password.',
        ]);
    }

    public function logout(Request $request)
    {
        if ($request->isMethod('post')) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('success', 'Logout successful');
        } else {
            abort(405); // Method Not Allowed
        }
    }

    public function showRegistrationForm()
    {
        return view('signup');
    }

    public function register(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'username' => 'required|unique:loginuser',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ], [
            'username.required' => 'Username harus diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'password.required' => 'Password harus diisi.',
            'password_confirmation.required' => 'Konfirmasi password harus diisi.',
            'password_confirmation.same' => 'Konfirmasi password tidak sesuai dengan password.',
        ]);
    
        // Create a new user
        $user = LoginUser::create([
            'id' => uniqid(), // Generate a unique ID for the user
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
        ]);
    
        if (!$user) {
            // Jika gagal menambahkan ke database, tambahkan pesan error
            return redirect()->back()->withErrors([
                'message' => 'Gagal menambahkan pengguna ke database.',
            ])->withInput();
        }
    
        // Perform any additional security checks or actions here
    
        // Redirect or perform any other actions after successful registration
        return redirect()->back()->with('success', 'Registrasi berhasil!');
    }
    
    
}
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loginuser;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('signin');
    }

    // Memproses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('username', 'password');
    
        $user = Loginuser::where('username', $credentials['username'])->first();
    
        if ($user && password_verify($credentials['password'], $user->password)) {
            // Authentication successful
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->withSession($request->session());
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('signup');
    }

    // Memproses registrasi
    public function register(Request $request)
    {
        // Validasi input dari form pendaftaran
        $validatedData = $request->validate([
            'username' => 'required|unique:loginuser',
            'password' => 'required',
        ]);
    
        $user = Loginuser::create([
            'id' => uniqid(), // Generate a unique ID for the user
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Perform any additional security checks or actions here

        // Redirect or perform any other actions after successful registration
        return redirect()->back()->with('success', 'Registrasi berhasil!');
    
    }

    // Logout pengguna
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
