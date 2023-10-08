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

    Route::prefix('projects')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('admin.project.index');
        Route::get('/create', [App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('admin.project.create');
        Route::post('/', [App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('admin.project.store');
        Route::get('/{project}', [App\Http\Controllers\Admin\ProjectController::class, 'show'])->name('admin.project.show');
        Route::get('/{project}/edit', [App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('admin.project.edit');
        Route::patch('/{project}', [App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('admin.project.update');
        Route::delete('/{project}', [App\Http\Controllers\Admin\ProjectController::class, 'delete'])->name('admin.project.delete');

});
});
