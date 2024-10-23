<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    public function index(Request $request)
{
    error_log('@@@@@@@@@');
    // try {
        if ($request->ajax()) {
            error_log('AJAX request detected');
            $data = Employee::get();
            return DataTables::of($data)
                ->addColumn('action', function($row) {
                    $btn = '<a onclick="editEmployee(' . $row->id . ')" class="edit btn btn-success btn-sm">Edit</a>';
                    $btn .= ' <a onclick="deleteEmployee(' . $row->id . ')" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })->toJson();
        }

        // dd($data);


        // error_log('Not an AJAX request');

        return view('Employee');
    // } catch (\Exception $e) {
    //     error_log('Error: ' . $e->getMessage());
    //     return response()->json(['error' => $e->getMessage()], 500);
    // }
}





    public function store(Request $request)
    {
        $employee = Employee::updateOrCreate(
            ['id' => $request->ID],
            [
                'name' => $request->name,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'mobile_number' => $request->mobile_number,
                'status' => $request->status
            ]
        );

        return response()->json($employee);
    }

    public function edit($id)
{
    try {
        $employee = Employee::findOrFail($id);
        return response()->json($employee);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Employee not found.'], 404);
    }
}




public function update(Request $request, $id)
{
    try {
        // Validate and update employee
        $employee = Employee::findOrFail($id);
        $employee->name = $request->input('name');
        $employee->birthday = $request->input('birthday');
        $employee->gender = $request->input('gender');
        $employee->mobile_number = $request->input('mobile_number');
        $employee->status = $request->input('status');
        $employee->save();

        return response()->json(['message' => 'Employee updated successfully']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to update employee'], 500);
    }
}



public function destroy($id)
{
    try {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(['message' => 'Employee deleted successfully']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error occurred while deleting employee'], 500);
    }
}

}
