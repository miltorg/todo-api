<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::apiResource('tasks', TaskController::class);

// Дополнительный маршрут для теста
Route::get('/', function () {
    return response()->json(['message' => 'Todo API is working']);
});
