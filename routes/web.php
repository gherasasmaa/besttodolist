<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Task\TaskCreateController;
use App\Http\Controllers\Task\TaskStoreController;
use App\Http\Controllers\Task\TaskShowController;
use App\Http\Controllers\Task\TaskEditController;
use App\Http\Controllers\Task\TaskUpdateController;
use App\Http\Controllers\Task\TaskDeleteController;
use App\Http\Controllers\Task\TaskDestroyController;



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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/task', [TaskController::class, 'index'])->name('tasks');
Route::get('/task/create', [TaskCreateController::class, 'create'])->name('taskCreate');
Route::post('/task/', [TaskStoreController::class, 'store'])->name('taskStore');
Route::get('/task/{task_id}', [TaskShowController::class, 'show'])->name('taskShow');
Route::get('/task/{task_id}/edit', [TaskEditController::class, 'edit'])->name('taskEdit');
Route::patch('/task/{task_id}', [TaskUpdateController::class, 'update'])->name('taskUpdate');
Route::get('/task/{task_id}/delete', [TaskDeleteController::class, 'delete'])->name('taskDelete');
Route::delete('/task/{task_id}', [TaskDestroyController::class, 'destroy'])->name('taskDestroy');
