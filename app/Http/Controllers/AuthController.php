<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;

class AuthController extends Controller
{
    public function register(Request $request){

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if($user->save()){

            $account = new Account;
            $account->user_id = $user->id;
            $account->save();

            return redirect('/');
        }
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            echo 'logged in';

            // return redirect()->intended('dashboard');
            return \redirect('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showDashboard(){

        $account = Account::where('user_id',Auth::user()->id)->first();
        $details = User::where('id', Auth::user()->id)->first();

        return view('/dashboard', \compact('account', 'details'));
    }

    public function logout(){
        Auth::logout();

        return \redirect('/');
    }
}
