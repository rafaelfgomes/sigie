<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $students = Student::orderBy('name')->paginate(10);

        return view('students')->with('students', $students);
    
    }

    public function store(Request $request)
    {
        # code...
    }

    public function getInfo($id)
    {
        $student = Student::find($id);

        return response()->json([ 'student'=> $student ]);
    }

    public function update(Request $request)
    {
        # code...
    }

    public function toggleStatus($id)
    {
        $student = Student::find($id);

        $student->status = ($student->status) ? 0 : 1;

        if ($student->save()) {
            return response()->json([ 'status' => $student->status]);
        }
    }

}
