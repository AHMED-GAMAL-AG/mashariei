<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// auth
Auth::routes();

// another way to use the middleware is in the constructor of the ProjectController return $this->middleware('auth');
// projects you can hit index with '/' or '/projects'
Route::get('/', [ProjectController::class, 'index'])->middleware('auth');
Route::resource('/projects', ProjectController::class)->middleware('auth');


// tasks
Route::post('/projects/{project}/tasks', [TaskController::class, 'store']);
Route::patch('/projects/{project}/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/projects/{project}/tasks/{task}', [TaskController::class, 'destroy']);

// profile
Route::get('/profile' , [ProfileController::class , 'index'])->middleware('auth');
Route::patch('/profile', [ProfileController::class , 'update']);
