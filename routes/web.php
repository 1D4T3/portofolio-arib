<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/projects',[ProjectController::class,'index']);
Route::get('/projects/create', [ProjectController::class,'create']);
Route::post('/projects',[ProjectController::class, 'store']);
Route::get('/projects/{id}',[ProjectController::class, 'show']);
Route::get('/projects/{id}/edit',[ProjectController::class, 'edit']);
Route::put('/projects/{id}', [ProjectController::class, 'update']);
Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
