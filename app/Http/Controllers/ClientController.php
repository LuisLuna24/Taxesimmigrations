<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('admin.users.clients.index');
    }
    public function create()
    {
        return view('admin.users.clients.create');
    }
    public function edit(Client $client)
    {
        return view('admin.users.clients.edit',compact($client));
    }
}
