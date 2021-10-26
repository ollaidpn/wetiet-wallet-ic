<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    public function index()
    {
        $Favorites =  Favorite::all();
        return view('mobile.index', compact('Favorites'));
    }

    public function login()
    {
        $Favorites =  Favorite::all();
        return view('mobile.auth.login');
    }

    public function register()
    {
        $Favorites =  Favorite::all();
        return view('mobile.auth.register');
    }

    public function payment()
    {
        $Favorites =  Favorite::all();
        return view('mobile.payments');
    }

    public function cards()
    {

        return view('mobile.cards');
    }
}
