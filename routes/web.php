<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\DefaultController as TaskDefaultController;

Route::get('/', function () {
    return view('main');
});


Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/task', [TaskDefaultController::class, 'index'])->name('task');
    Route::post('/task/save/{id?}', [TaskDefaultController::class, 'save'])->where('id', '\d+')->name('task.save');
    Route::get('/task/{id}/edit', [TaskDefaultController::class, 'edit'])->where('id', '\d+')->name('task.edit');
    Route::post('/task/delte/{id?}', [TaskDefaultController::class, 'delete'])->name('task.delete');
});
