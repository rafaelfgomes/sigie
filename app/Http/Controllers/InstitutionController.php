<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    
    public function index()
    {
        $institutions = Institution::paginate(4);        

        return view('institutions')->with('institutions', $institutions);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:80',
            'cnpj' => 'required|string|max:14',
            'status' => 'required|boolean',
        ]);

        if ($validatedData) {

            Institution::create($validatedData);
        
        }

        return redirect()->back();

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
