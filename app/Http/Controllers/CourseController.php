<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $courses = Course::paginate(5);

        return view('courses')->with('courses', $courses);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:80',
            'status' => 'required',
            ]);

        $data = [
            'name' => $request->name,
            'status' => $request->status
        ];
        
        $course = Course::create($data);

        return response()->json([ 'course' => $course ]);
    }

    public function getInfo($id)
    {
        $course = Course::find($id);

        return response()->json([ 'course' => $course ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:80'
        ]);

        $data = [
            'name' => $request->name,
        ];

        $course = Course::where('id', $id)->update($data);

        if ($course) {
            return response()->json([ 'message' => 'success' ]);
        }

        return response()->json([ 'message' => 'error' ]);
    }

    public function toggleStatus($id)
    {
        $course = Course::find($id);

        $course->status = ($course->status) ? 0 : 1;

        if ($course->save()) {
            return response()->json([ 'status' => $course->status]);
        }
    }

}
