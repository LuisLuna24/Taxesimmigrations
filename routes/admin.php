<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// 1. Dashboard (Acceso para todos los que entran al panel admin)
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

// 2. Servicios
Route::middleware('permission:admin.services.index')->group(function () {
    Route::resource('services', ServiceController::class)->only(['index', 'create', 'edit']);
});

// 3. Citas (Appointments)
Route::middleware('permission:admin.appointments.index')->group(function () {
    Route::resource('appointments', AppointmentController::class)->only(['index', 'create', 'edit']);
});

// 4. Comentarios
Route::middleware('permission:admin.comments.index')->group(function () {
    Route::get('/comments', function () {
        return view('admin.comments.index');
    })->name('comments.index');
});

// 5. Gestión de Usuarios (Clientes y Empleados)
Route::middleware('permission:admin.users.index')->get('/users', [UserController::class, 'index'])->name('users.index');

Route::middleware('permission:admin.clients.index')->group(function () {
    Route::resource('clients', ClientController::class)->only(['index', 'create', 'edit']);
});

Route::middleware('permission:admin.employees.index')->group(function () {
    Route::resource('employees', EmployeeController::class)->only(['index', 'create', 'edit']);
});

// 6. Seguridad (Roles y Permisos)
Route::middleware('permission:admin.roles.index')->group(function () {
    Route::resource('roles', RoleController::class)->only(['index', 'create', 'edit']);
});

Route::middleware('permission:admin.permissions.index')->group(function () {
    Route::resource('permissions', PermissionController::class)->only(['index']);
});
