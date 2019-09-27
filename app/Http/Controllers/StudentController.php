<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {

        $students = Student::paginate(10);

        return view('students')->with('students', $students);
    
    }

    public function store(Request $request)
    {
        # code...
    }

    public function show($id)
    {
        $student = Student::find($id);

        return response()->json([ 'student'=> $student ]);
    }

    public function edit()
    {
        # code...
    }

    public function update(Request $request)
    {
        # code...
    }

    public function delete($id)
    {
        # code...
    }

}
