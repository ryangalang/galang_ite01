<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Profile Page
Route::get('/profile', [ProfileController::class, 'index']);

// Students List Page
Route::get('/students', [StudentController::class, 'index']);

// Account Page with ID
Route::get('/account/{id}', function ($id) {
    return "Hello $id";
});
