<?php

use Illuminate\Support\Facades\Route;
/**
 * les controlleurs pour gerer une task
 */
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

Route::view('/', 'index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

/**
 * les routes pour la gestion d'une task
 */
Route::get('/task', [TaskController::class, 'index'])->name('tasks'); //afficher la liste des tasks
Route::get('/task/create', [TaskCreateController::class, 'create']); //créer une nouvelle task - formulaire
Route::post('/task/', [TaskStoreController::class, 'store']); //sauvegarder une nouvelle task
Route::get('/task/{task_id}', [TaskShowController::class, 'show']); //afficher une task
Route::get('/task/{task_id}/edit', [TaskEditController::class, 'edit']); //éditer une task - formulaire
Route::patch('/task/{task_id}', [TaskUpdateController::class, 'update']); //mettre à jour une task
Route::get('/task/{task_id}/delete', [TaskDeleteController::class, 'delete']); //effacer une task - confirmation
Route::delete('/task/{task_id}', [TaskDestroyController::class, 'destroy']); //supprimer la task définitivement
