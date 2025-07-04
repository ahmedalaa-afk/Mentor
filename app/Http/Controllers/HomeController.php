<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function about()
    {
        return view('user.about');
    }
    public function course()
    {
        return view('user.course');
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function announcement()
    {
        return view('user.announcement');
    }
}
