<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'email:rfc,dns',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();
        return redirect()->route('show-form-login')->with('success', 'Register successfully');
    }

    public function showFormLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Auth::user()->is_admin){
                return redirect()->route('admin');
            }
            return redirect()->route('home');
        }
        return redirect()->route('show-form-login')->with('error', 'Email or Password incorrect');
    }

    public function showProfile() {
        return view('auth.profile');
    }

    public function profile(Request $request) {
        $user = User::find(auth()->id());
        $user->name = $request->name;
        if($request->change_password == 'on') {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('show-profile')->with('success', 'Updated successfully');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('show-form-login');
    }
}
