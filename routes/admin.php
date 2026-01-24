<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::get('/comments', function () {
    return view('admin.comments');
})->name('comments');
