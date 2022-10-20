<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\TaskController;

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

Route::get('/folders/{folder}/tasks', [TaskController::class, 'index'] )
    ->name('tasks.index');

Route::get('/folders/{folder}/tasks/create', [TaskController::class, 'create'])
    ->name('tasks.create');
Route::post('/folders/{folder}/tasks/store', [TaskController::class, 'store'])
    ->name('tasks.store');


Route::get('/folders/create', [FolderController::class, 'create'])
    ->name('folders.create');
Route::post('/folders/store', [FolderController::class, 'store'])
    ->name('folders.store');

