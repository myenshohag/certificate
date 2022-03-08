<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      
        return view('frontend.index');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
