<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

 
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['inconnu', 'connecte', 'moderateur', 'admin']);
        return view('home');
    }


    public function someInconnuStuff(Request $request)
    {
        $request->user()->authorizeRoles(['inconnu']);
        return view('welcome');
    }

}