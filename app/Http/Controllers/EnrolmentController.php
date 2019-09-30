<?php

namespace App\Http\Controllers;

use App\Course;
use App\Institution;
use App\Student;
use Illuminate\Http\Request;

class EnrolmentController extends Controller
{
    public function index()
    {

        $institutions = Institution::where('status', 1)->get();
        $courses = Course::where('status', 1)->get();
        $students = Student::where('status', 1)->orderBy('name')->get();

        return view('enrolments')->with([ 'institutions' => $institutions, 'courses' => $courses, 'students' => $students ]);

    }

    public function enrolStudents(Request $request)
    {
        # to do...
    }
}
