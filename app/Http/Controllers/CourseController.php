<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    
    public function index()
    {
        return view('courses');
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
