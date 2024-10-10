<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->user_id = $request->input('user_id');
        $employee->depart_id = $request->input('depart_id');
        $employee->address = $request->input('address');
        $employee->place_of_birth = $request->input('place_of_birth');
        $employee->dob = $request->input('dob');
        $employee->religion = $request->input('religion');
        $employee->sex = $request->input('sex');
        $employee->phone = $request->input('phone');
        $employee->salary = $request->input('salary');
        $employee->save();
        return redirect()->route('employees.index');
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->user_id = $request->input('user_id');
        $employee->depart_id = $request->input('depart_id');
        $employee->address = $request->input('address');
        $employee->place_of_birth = $request->input('place_of_birth');
        $employee->dob = $request->input('dob');
        $employee->religion = $request->input('religion');
        $employee->sex = $request->input('sex');
        $employee->phone = $request->input('phone');
        $employee->salary = $request->input('salary');
        $employee->save();
        return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employees.index');
    }
}