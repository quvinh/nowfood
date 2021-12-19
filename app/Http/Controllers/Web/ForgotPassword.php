<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\User;

class ForgotPassword extends Controller
{
    public function showForgetPasswordForm() {
        return view('auth.forgetPassword');
    }

    public function submitForgetPasswordForm(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $token = Str::random(64);

        DB::table('password_resets')
            ->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

        // Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request) {
        //     $message->to($request->email);
        //     $message->subject('Reset password');
        // });
        // dd($token);
        return back()->with('message', 'Link cập nhật lại mật khẩu đã gửi về email của bạn!');
    }

    public function showResetPasswordForm($token) {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if(!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();
        return redirect()->route('show-form-login');
    }
}
