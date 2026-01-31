<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.security.roles.index');
    }

    public function create()
    {
        return view('admin.security.roles.create');
    }

    public function edit(Role $role)
    {
        return view('admin.security.roles.index', compact($role));
    }
}
