<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function student()
    {
        
        return view('admin.student.index');
    }
    
    public function createNewStudent()
    {
        
        return view('admin.student.create');
    }
}
