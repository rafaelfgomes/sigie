<?php

namespace App\Http\Controllers;

use App\Course;
use App\Institution;
use App\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $institutions = Institution::all();
        $courses = Course::all();
        $students = Student::all();

        $totalInstitutions = $institutions->count();
        $totalCourses = $courses->count();
        $totalStudents = $students->count();

        $activeInstitutions = $institutions->filter(function ($institution) {
            return $institution->status;
        })->count();
        $activeCourses = $courses->filter(function ($course) {
            return $course->status;
        })->count();
        $activeStudents = $students->filter(function ($student) {
            return $student->status;
        })->count();

        $inactiveInstitutions = $institutions->filter(function ($institution) {
            return !$institution->status;
        })->count();
        $inactiveCourses = $courses->filter(function ($course) {
            return !$course->status;
        })->count();
        $inactiveStudents = $students->filter(function ($student) {
            return !$student->status;
        })->count();

        $data = [
            'totalInstitutions' => $totalInstitutions,
            'totalCourses' => $totalCourses,
            'totalStudents' => $totalStudents,
            'activeInstitutions' => $activeInstitutions,
            'activeCourses' => $activeCourses,
            'activeStudents' => $activeStudents,
            'inactiveInstitutions' => $inactiveInstitutions,
            'inactiveCourses' => $inactiveCourses,
            'inactiveStudents' => $inactiveStudents
        ];

        return view('home')->with($data);
    }
}
