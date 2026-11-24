<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }

    public function register(Request $req){

        
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);
        
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'role' => $req->role,
        ]);
        
        // dd($req->all());
        // return redirect()->route('login')->with('success', 'Registerd successfully ...');
        
        return redirect()->route('login');
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $req){

        $credentials  = $req->only('email' ,'password');

        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'customer') {
                return redirect()->route('homepage');
            }
        }

        return back()->with('error','Invalid credentials');

    }

    public function logout(Request $req) {
        Auth::logout();
        //invalidate() = Prevents session hijacking or reuse after logout. 
        // This line completely deletes the old session from the server.
        $req->session()->invalidate();
        // This line creates a new CSRF token (Cross-Site Request Forgery token)
        // Prevents CSRF attacks after logout.
        $req->session()->regenerateToken();

        return redirect()->route('login');
    }
}
