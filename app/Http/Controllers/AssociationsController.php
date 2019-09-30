<?php

namespace App\Http\Controllers;

use App\Course;
use App\Institution;
use Illuminate\Http\Request;

class AssociationsController extends Controller
{
    public function index()
    {

        $institutions = Institution::where('status', 1)->get();
        $courses = Course::where('status', 1)->get();

        return view('associate')->with([ 'institutions' => $institutions, 'courses' => $courses]);

    }

    public function associateCourses(Request $request)
    {

        return 0;
    
    }

}
