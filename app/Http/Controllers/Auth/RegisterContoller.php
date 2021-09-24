<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterContoller extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index(){
            return view('auth.register');
    }

    public function store(Request $request){

        $this->validate($request , [
                'name' => 'required|max:255',
                'username' => 'required|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|confirmed'


        ]);
        User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'username' =>$request->username,
            'password' =>Hash::make($request->password),

        ]);


        auth()->attempt($request->only('email','password'));

        return redirect()->route('dashboard');
    }
}
