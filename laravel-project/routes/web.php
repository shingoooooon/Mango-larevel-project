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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', function () {
        return view('home');
    });

//    Route::resource('folders', FolderController::class)
//        ->only(['create', 'store'])
//        ->names([
//            'create' => 'folders.create',
//            'store' => 'folders.store'
//        ]);
//
//    Route::resource('tasks', TaskController::class)
//        ->except('show')
//        ->names([
//            'index' => 'tasks.index',
//            'create' => 'tasks.create',
//            'store' => 'tasks.store',
//            'edit' => 'tasks.edit',
//            'update' => 'tasks.update',
//            'destroy' => 'tasks.destroy',
//        ]);

    Route::get('/folders/create', [FolderController::class, 'create'])
        ->name('folders.create');
    Route::post('/folders/store', [FolderController::class, 'store'])
        ->name('folders.store');

    Route::get('/folders/{folder}/tasks', [TaskController::class, 'index'] )
        ->name('tasks.index');

    Route::get('/folders/{folder}/tasks/create', [TaskController::class, 'create'])
        ->name('tasks.create');
    Route::post('/folders/{folder}/tasks/store', [TaskController::class, 'store'])
        ->name('tasks.store');

    Route::get('/folders/{folder}/tasks/{task}/edit', [TaskController::class, 'edit'])
        ->name('tasks.edit');
    Route::patch('/folders/{folder}/tasks/{task}/update', [TaskController::class, 'update'])
        ->name('tasks.update');

    Route::delete('/folders/{folder}/tasks/{task}/delete', [TaskController::class, 'destroy'])
        ->name('tasks.destroy');

    Route::get('/users', [UserController::class, 'index'])
        ->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])
        ->name('users.edit');
    Route::patch('/users/{user}/update', [UserController::class, 'update'])
        ->name('users.update');
    Route::delete('/users/{user}/delete', [UserController::class, 'destroy'])
        ->name('users.destroy');

    Route::post('/logout', [UserController::class, 'logout']);
});


Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [UserController::class, 'create']);
    Route::post('/storeuser', [UserController::class, 'store']);
    Route::get('/login', [UserController::class, 'login'])
        ->name('login');
    Route::post('/authenticate', [UserController::class, 'authenticate']);
});











