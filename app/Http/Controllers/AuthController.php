<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['dashboard']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function proses_login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        $validate = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Successfully Logged In');
        }

        return redirect('login')->withErrors(['login_error' => 'Username or password is incorrect!']);
    }

    public function proses_register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|in:user,admin',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
    
        Auth::login($user);
        return redirect()->route('login')->with('success', 'Register berhasil! Silakan login.');
    }
    

    // public function proses_register(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //     ]);

    //     Auth::login($user);
    //     // return redirect()->route('dashboard')->with('success', 'Registration successful!');
    //     return redirect()->route('login')->with('success', 'Register berhasil! Silakan login.');
    // }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome')->with('success', 'Logged out successfully');
    }
}
