<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\TodoController;
use App\Http\Controllers\HomeController;

Auth::routes();


Route::get('/', [HomeController::class, 'index'])->name('index');



Route::prefix('todo')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', [TodoController::class, 'list'])->name('todo-list');
        Route::get('/unfinished', [TodoController::class, 'unfinished'])->name(
            'unfinished'
        );
        Route::get('/finished', [TodoController::class, 'finished'])->name(
            'finished'
        );
        Route::get('/create', [TodoController::class, 'create'])->name(
            'create'
        );
        Route::post('/store', [TodoController::class, 'store'])->name('store');
        Route::post('/update/{id}', [TodoController::class, 'update'])->name(
            'update'
        );
        Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');
        Route::get('/detail/{id}', [TodoController::class, 'detail'])->name(
            'detail'
        );
        Route::get('/destroy/{id}', [TodoController::class, 'destroy'])->name(
            'destroy'
        );
    });
