<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

class LoginContoller extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){

        $this->validate($request , [
            'email' => 'required|email',
            'password' => 'required'

    ]);

    if(!auth()->attempt($request->only('email','password'),$request->remember)){

            return back()->with('status','Invalid Information');
    }else{
        return redirect()->route('dashboard');
    }

    

    }
}
