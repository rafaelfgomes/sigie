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

        $status = 0;

        $validatedData = $request->validate([
            'name' => 'required|string|max:80',
            'cnpj' => 'required|string|max:14',
            'status' => 'required|boolean',
        ]);

        if ($request->status) {
            $status = 1;
        }

        if ($validatedData) {

            Institution::create($request->all());
        
        }

        return redirect()->to(route('index'));

    }

    public function show($id)
    {

        $institution = Institution::find($id);

        return response()->json([ 'institution' => $institution ]);

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
