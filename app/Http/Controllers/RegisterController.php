<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register (Request $request){
        $validatedata = $request->validate([
            'email' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $validatedata['password'] = bcrypt($validatedata['password']);

        User::create($validatedata);

        return redirect('/')->with('berhasil', 'Register Berhasil, Silahkan Login!');
    }
}
