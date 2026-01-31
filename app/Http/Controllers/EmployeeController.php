<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.employees.index');
    }

    public function create()
    {
        return view('admin.users.employees.create');
    }

    public function edit(Employee $employee)
    {
        return view('admin.users.employees.edit',compact($employee));
    }
}
