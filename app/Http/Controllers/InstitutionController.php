<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $institutions = Institution::paginate(4);        

        return view('institutions')->with('institutions', $institutions);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:80',
            'cnpj' => 'required|string|max:14',
            'status' => 'required',
            ]);

        $data = [
            'name' => $request->name,
            'cnpj' => $request->cnpj,
            'status' => $request->status
        ];
        
        $institution = Institution::create($data);

        return response()->json([ 'institution' => $institution ]);

    }

    public function getInfo($id)
    {

        $institution = Institution::find($id);

        return response()->json([ 'institution' => $institution ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:80',
            'cnpj' => 'required|string|max:14',
        ]);

        $data = [
            'name' => $request->name,
            'cnpj' => $request->cnpj,
        ];

        $institution = Institution::where('id', $id)->update($data);

        if ($institution) {
            return response()->json([ 'message' => 'success' ]);
        }

        return response()->json([ 'message' => 'error' ]);

    }

    public function toggleStatus($id)
    {

        $institution = Institution::find($id);

        $institution->status = ($institution->status) ? 0 : 1;

        if ($institution->save()) {
            return response()->json([ 'status' => $institution->status ]);
        }

    }

}
