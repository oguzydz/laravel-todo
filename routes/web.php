<?php

use App\Http\Controllers\FileUpload;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\TodoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\Manager\ManagerTodoController;

// use Symfony\Component\HttpFoundation\Request;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::prefix('todo')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', [TodoController::class, 'list'])->name('todo-list');
        Route::get('/unfinished', [TodoController::class, 'unfinished'])->name('unfinished');
        Route::get('/finished', [TodoController::class, 'finished'])->name('finished');
        Route::get('/create', [TodoController::class, 'create'])->name('create');
        Route::post('/store', [TodoController::class, 'store'])->name('store');
        Route::post('/update/{id}', [TodoController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');
        Route::get('/detail/{id}', [TodoController::class, 'detail'])->name('detail');
        Route::get('/destroy/{id}', [TodoController::class, 'destroy'])->name('destroy');
        Route::get('/toggle/{id}', [TodoController::class, 'toggle'])->name('toggle');
    });


Route::prefix('manager')->middleware('auth')->group(function(){
    Route::get('/', [ManagerController::class, 'index']);
    Route::get('/todo/{id}', [ManagerTodoController::class, 'index']);
    Route::get('/profile', [ManagerController::class, 'profile'])->name('manager-profile');
    Route::get('/user/{id}', [ManagerController::class, 'user'])->name('user');
    Route::post('/update', [ManagerController::class, 'update'])->name('update-profile');
});


Route::get('/upload-file', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');