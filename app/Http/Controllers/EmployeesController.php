<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect, Response;
use App\DataTables\EmployeesDataTable;
use App\Employee;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{
    public function index(EmployeesDataTable $dataTable)
    {
        // return $dataTable->render("employees.index");
        if (Auth::check()) {
            if (Auth::user()->is_admin == 1) {
                return view("employees.new");
            } else {
                return view("employees.ro");
            }
        } else {
            return redirect("/login");
        }
    }
    public function test()
    {
        $e = Employee::all();
        foreach ($e as $employee) {
            echo $employee->emp_id;
        }
    }
    public function store(Request $request)
    {
        $employeeId = $request->product_id;
        $employee = Employee::updateOrCreate(
            ["id" => $employeeId],
            [
                "emp_id" => $request->emp_id,
                "name_prefix" => $request->name_prefix,
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "middle_initial" => $request->middle_initial,
                "gender" => $request->gender,
                "fathers_name" => $request->fathers_name,
                "mothers_name" => $request->mothers_name,
                "mothers_maiden_name" => $request->mothers_maiden_name,
                "email" => $request->email,
                "dob" => $request->dob,
                "doj" => $request->doj,
                "salary" => $request->salary,
                "ssn" => $request->ssn,
                "phone" => $request->phone,
                "city" => $request->city,
                "state" => $request->state,
                "zip" => $request->zip,
            ]
        );
        return Response::json($employee);
    }
    public function edit($id)
    {
        $where = ["id" => $id];
        $employee = Employee::where($where)->first();
        return Response::json($employee);
    }
    public function destroy($id)
    {
        $employee = Employee::where("id", $id)->delete();
        return Response::json($employee);
    }
    public function dtindex()
    {
        return DataTables::of(
            Employee::query()
                ->orderBy("last_name", "ASC")
                ->orderBy("first_name", "ASC")
        )
            ->addColumn("action", "employees.action")
            ->rawColumns(["action"])
            ->addIndexColumn()
            ->make(true);
    }
}
