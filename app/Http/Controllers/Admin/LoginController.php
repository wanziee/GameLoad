<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('admin.adminLogin');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->with('loginError', 'login failed');
    }
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();
        
        // Invalidate the session
        $request->session()->invalidate();
        
        // Regenerate the CSRF token to avoid session fixation attacks
        $request->session()->regenerateToken();
        
        // Redirect to login page
        return redirect()->route('show.login');
    }
    
    
}
