<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    
    public function index()
    {
        $institutions = Institution::all();        

        return view('institutions')->with('institutions', $institutions);
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
