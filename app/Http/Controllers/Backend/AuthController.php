<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Session;





class AuthController extends Controller
{
    // login
    public function showLoginForm() {
        return view('backend.auth.login');
    }

    // Login handle
    public function handleLogin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $remember = (!empty($request->remember)) ? TRUE : FALSE;

        $credential = [
            'email'         => $request->email,
            'password'      => $request->password,
        ];

        $user = User::where('email', $request->email)->first();

        if (!$user == null) {
            if ($user->email_verified == 1) {
                if (Auth::guard('web')->attempt($credential, $remember)) {
                    $user = Auth::guard('web')->user();
                    return redirect()->route('dashboard');
                }
            }
        }
        session()->flash('error', 'Invalid Credentials!');
        return redirect()->back();
    }


    // logout
    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect()->route('login.show');
    }



}
