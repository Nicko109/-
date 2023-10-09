<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\Main\IndexController::class, 'index']);

Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.main.index');

        Route::prefix('tasks')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\TaskController::class, 'index'])->name('admin.task.index');
            Route::get('/create', [App\Http\Controllers\Admin\TaskController::class, 'create'])->name('admin.task.create');
            Route::post('/', [App\Http\Controllers\Admin\TaskController::class, 'store'])->name('admin.task.store');
            Route::get('/{task}', [App\Http\Controllers\Admin\TaskController::class, 'show'])->name('admin.task.show');
            Route::get('/{task}/edit', [App\Http\Controllers\Admin\TaskController::class, 'edit'])->name('admin.task.edit');
            Route::patch('/{task}', [App\Http\Controllers\Admin\TaskController::class, 'update'])->name('admin.task.update');
            Route::delete('/{task}', [App\Http\Controllers\Admin\TaskController::class, 'delete'])->name('admin.task.delete');
    });

    Route::prefix('projects')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('admin.project.index');
        Route::get('/create', [App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('admin.project.create');
        Route::post('/', [App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('admin.project.store');
        Route::get('/{project}', [App\Http\Controllers\Admin\ProjectController::class, 'show'])->name('admin.project.show');
        Route::get('/{project}/edit', [App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('admin.project.edit');
        Route::patch('/{project}', [App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('admin.project.update');
        Route::delete('/{project}', [App\Http\Controllers\Admin\ProjectController::class, 'delete'])->name('admin.project.delete');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.user.create');
        Route::post('/', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store');
        Route::get('/{user}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin.user.show');
        Route::get('/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
        Route::patch('/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{user}', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.user.delete');
    });
});
