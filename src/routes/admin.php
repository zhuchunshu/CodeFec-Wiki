<?php

use App\Plugins\Wiki\src\Http\Controllers\IndexController;
use App\Plugins\wiki\src\Http\Controllers\WikiClassController;
use App\Plugins\Wiki\src\Http\Controllers\WikiController;
use Illuminate\Support\Facades\Route;

Route::post('/Sqlmigrate', [IndexController::class, 'SqlMigrate']);

// 分类
Route::prefix('class')->group(function () {
    // 列表
    Route::get('/', [WikiClassController::class, 'index']);
    // 创建
    Route::post('/', [WikiClassController::class, 'store']);
    // 创建 - 视图
    Route::get('/create', [WikiClassController::class, 'create']);
    // 显示
    Route::get('/{id}', [WikiClassController::class, 'show']);
    // 编辑
    Route::get('/{id}/edit', [WikiClassController::class, 'edit']);
    // 更新
    Route::put('/{id}', [WikiClassController::class, 'update']);
    // 删除
    Route::delete('/{id}', [WikiClassController::class, 'destroy']);
});

Route::get('/', [WikiController::class,'index']);
Route::post('/', [WikiController::class, 'store']);
// 创建 - 视图
Route::get('/create', [WikiController::class, 'create']);
// 显示
Route::get('/{id}', [WikiController::class, 'show']);
// 编辑
Route::get('/{id}/edit', [WikiController::class, 'edit']);
// 更新
Route::put('/{id}', [WikiController::class, 'update']);
// 删除
Route::delete('/{id}', [WikiController::class, 'destroy']);
