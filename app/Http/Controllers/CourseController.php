<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    
    public function index()
    {

        $courses = Course::paginate(5);

        return view('courses')->with('courses', $courses);

    }

    public function store(Request $request)
    {
        # code...
    }

    public function show($id)
    {
        # code...
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
