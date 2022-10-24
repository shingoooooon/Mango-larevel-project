<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/folders/{folder}/tasks', [TaskController::class, 'index'] )
    ->middleware('auth')
    ->name('tasks.index');

Route::get('/folders/{folder}/tasks/create', [TaskController::class, 'create'])
    ->middleware('auth')
    ->name('tasks.create');
Route::post('/folders/{folder}/tasks/store', [TaskController::class, 'store'])
    ->middleware('auth')
    ->name('tasks.store');

Route::get('/folders/{folder}/tasks/{task}/edit', [TaskController::class, 'edit'])
    ->middleware('auth')
    ->name('tasks.edit');
Route::patch('/folders/{folder}/tasks/{task}/update', [TaskController::class, 'update'])
    ->middleware('auth')
    ->name('tasks.update');

Route::delete('/folders/{folder}/tasks/{task}/delete', [TaskController::class, 'destroy'])
    ->middleware('auth')
    ->name('tasks.destroy');


Route::get('/folders/create', [FolderController::class, 'create'])
    ->middleware('auth')
    ->name('folders.create');
Route::post('/folders/store', [FolderController::class, 'store'])
    ->middleware('auth')
    ->name('folders.store');

Route::get('/register', [UserController::class, 'create'])
    ->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::get('/login', [UserController::class, 'login'])
    ->middleware('guest');
Route::post('/authenticate', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout'])
    ->middleware('auth');
