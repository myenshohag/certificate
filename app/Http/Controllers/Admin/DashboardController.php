<?php

namespace App\Http\Controllers\Admin;

use App\Models\BasicSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function basicSettings()
    {
        $data['settings']  = BasicSetting::first();;
        return view('admin.dashboard.basic-settings', $data);
    }



  
}
