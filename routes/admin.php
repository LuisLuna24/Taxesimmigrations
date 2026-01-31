<?php

use App\Http\Controllers\ApointmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::get('/comments', function () {
    return view('admin.comments.index');
})->name('comments.index');

Route::resource('users',UserController::class)->only('index', 'create','edit');

Route::resource('clients',ClientController::class)->only('index', 'create','edit');

Route::resource('employees',EmployeeController::class)->only('index', 'create','edit');

Route::resource('services',ServiceController::class)->only('index', 'create','edit');

Route::resource('appointments',AppointmentController::class)->only('index', 'create','edit');

Route::resource('roles',RoleController::class)->only('index', 'create','edit');

Route::resource('permissions',PermissionController::class)->only('index', 'create','edit');


