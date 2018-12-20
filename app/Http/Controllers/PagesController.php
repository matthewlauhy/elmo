<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homePage()
    {
        return view('home');
    }
    public function contactPage()
    {
        return view('contact');
    }
}
