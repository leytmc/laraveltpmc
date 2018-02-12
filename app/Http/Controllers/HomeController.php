<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

 
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['inconnu', 'connecte', 'moderateur', 'admin']);
        //return view('home');
        //$images = Article::paginate(8);
        //$images = Article::latestWithUser()->paginate(config('app.pagination'));
        $images = Article::paginate(config('app.pagination'));
        return view('home', compact('images'));        
    }


    public function someInconnuStuff(Request $request)
    {
        $request->user()->authorizeRoles(['inconnu']);
        return view('welcome');
    }

}