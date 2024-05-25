<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\models\Task;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/task', function () {
    $data = Task::all();
    return view('task')->with('data', $data);
    
});

Route::post('/saveTask', [TaskController::class, 'store']);
Route::get('/markasupdated/{id}', [TaskController::class, 'updatetask']);
Route::get('/markasnotupdated/{id}', [TaskController::class, 'notupdatetask']);
Route::get('/markasdelete/{id}', [TaskController::class, 'deletetask']);
Route::get('/updatetask/{id}', [TaskController::class, 'updatetasks']);
Route::post('/uptodate', [TaskController::class, 'uptodate']);


