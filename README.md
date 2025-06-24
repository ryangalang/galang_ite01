<?php

use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Client\StudentController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/account/{id}', function ($id) {
    return "Hello $id";
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('client')->middleware('auth:web')->group(function(){
    Route::resource('users',UserController::class);
     Route::resource('students',StudentController::class);
});
Route::prefix('client')->group(function () {
    Route::resource('appointments', \App\Http\Controllers\Client\AppointmentController::class);
});
