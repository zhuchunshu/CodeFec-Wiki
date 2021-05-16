<?php

use App\Plugins\Wiki\src\Http\Controllers\web\WikiClassController;
use App\Plugins\Wiki\src\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class,'show'])->name('index');
Route::get('/{ename}', [WikiClassController::class,'class'])->name('class');
Route::get('/{ename}/{id}', [WikiClassController::class,'show'])->name('show');