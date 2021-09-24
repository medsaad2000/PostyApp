<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostLike;

class DashboardContoller extends Controller
{

    public function __construct()
    {
       $this->middleware(['auth']);
    }

    public function index(){

        return view('dashboard');
    }
}
