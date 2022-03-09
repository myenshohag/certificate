<?php

namespace App\Http\Controllers\Admin;

use App\Models\BasicSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function student()
    {
        $data['students'] = Student::orderBy('id','desc')->get();
        return view('admin.student.index', $data);
    }

    public function createNewStudent()
    {
        $data['settings'] = BasicSetting::first();
        return view('admin.student.create', $data);
    }

    public function storeNewStudent(Request $request)
    {
        $data['settings'] = Student::create($request->all());
        $notification = array('message' => 'New Student Inserted', 'alert-type' => 'success');
        return redirect()->route('student')->with($notification);
    }
    public function deleteStudent(Student $student)
    {
        $student->delete();
        $notification = array('message' => 'Student deleted', 'alert-type' => 'success');
        return redirect()->route('student')->with($notification);
    }
}
