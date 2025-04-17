<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskRemarkController;
use App\Http\Controllers\ReportController;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes using JWT
Route::middleware('auth:api')->group(function () {

    // Project routes
    Route::get('/projects', [ProjectController::class, 'index']);
    Route::post('/projects', [ProjectController::class, 'store']);
    Route::put('/projects/{id}', [ProjectController::class, 'update']);
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);
    Route::get('/projects/{id}', [ProjectController::class, 'show']);

    // Task routes
    Route::post('/projects/{projectId}/tasks', [TaskController::class, 'store']);
    Route::put('/tasks/{taskId}/status', [TaskController::class, 'updateStatus']);

    // Task remark routes
    Route::post('/tasks/{taskId}/remarks', [TaskRemarkController::class, 'store']);

    // Project report route
    Route::get('/projects/{projectId}/report', [ReportController::class, 'show']);
});

