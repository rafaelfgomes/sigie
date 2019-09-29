<?php

namespace App\Http\Controllers;

use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $students = Student::orderBy('name')->paginate(10);

        return view('students')->with('students', $students);
    
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:80',
            'cpf' => 'required|string|max:11',
            'birth_date' => 'required|date_format:d/m/Y',
            'email' => 'required|string|email|unique:students,email',
            'phone' => 'required|string|max:8',
            'mobile' => 'required|string|max:9',
            'zipcode' => 'required|string|max:8',
            'street' => 'required|string',
            'number' => 'required|string',
            'neighbour' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string'
        ]);

        $birthDate = Carbon::createFromFormat('d/m/Y', $request->birth_date)->toDateString();

        $data = [
            'name' => $request->name,
            'cpf' => $request->cpf,
            'birth_date' => $birthDate,
            'email' => $request->email,
            'status' => $request->status
        ];

        $contact = [
            'phone' => $request->phone,
            'mobile' => $request->mobile,
        ];

        $address = [
            'zipcode' => $request->zipcode,
            'street' => $request->street,
            'number' => $request->number,
            'neighbour' => $request->neighbour,
            'city' => $request->city,
            'state' => $request->state
        ];
        
        $student = Student::create($data);
        $student->contacts()->create($contact);
        $student->address()->create($address);

        return response()->json([ 'student' => $student ]);
    }

    public function getInfo($id)
    {
        $student = Student::find($id);

        $student->load('contacts', 'address');

        return response()->json([ 'student'=> $student ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:80',
            'cpf' => 'required|string|max:11',
            'birth_date' => 'required|date_format:d/m/Y',
            'email' => 'required|string|email|unique:students,email,'.$id,
            'phone' => 'required|string|max:8',
            'mobile' => 'required|string|max:9',
            'zipcode' => 'required|string|max:8',
            'street' => 'required|string',
            'number' => 'required|string',
            'neighbour' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string'
        ]);

        $birthDate = Carbon::createFromFormat('d/m/Y', $request->birth_date)->toDateString();

        $data = [
            'name' => $request->name,
            'cpf' => $request->cpf,
            'birth_date' => $birthDate,
            'email' => $request->email
        ];

        $contact = [
            'phone' => $request->phone,
            'mobile' => $request->mobile,
        ];

        $address = [
            'zipcode' => $request->zipcode,
            'street' => $request->street,
            'number' => $request->number,
            'neighbour' => $request->neighbour,
            'city' => $request->city,
            'state' => $request->state
        ];
        
        Student::where('id', $id)->update($data);
        
        $student = Student::find($id);

        $student->contacts()->update($contact);
        $student->address()->update($address);

        return response()->json([ 'student' => $student ]);
    }

    public function toggleStatus($id)
    {
        $student = Student::find($id);

        $student->status = ($student->status) ? 0 : 1;

        if ($student->save()) {
            return response()->json([ 'status' => $student->status]);
        }
    }

}
