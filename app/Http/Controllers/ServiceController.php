<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('admin.services.index');
    }

    public function create()
    {
         return view('admin.services.create');
    }

    public function edit(Service $service)
    {
         return view('admin.services.edit', compact($service));
    }
}
