<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Простые API маршруты
Route::prefix('api')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/tasks/{id}', [TaskController::class, 'show']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
    
    Route::get('/', function () {
        return response()->json(['message' => 'Todo API is working']);
    });
});

// Простая тестовая страница
Route::get('/test', function () {
    return <<<'HTML'
    <!DOCTYPE html>
    <html>
    <head>
        <title>Todo API Test</title>
        <style>
            body { font-family: Arial; padding: 20px; }
            button { margin: 5px; padding: 10px; }
            pre { background: #eee; padding: 10px; }
        </style>
    </head>
    <body>
        <h1>Todo API Tester</h1>
        <button onclick="getTasks()">Get Tasks</button>
        <div id="result"></div>
        <script>
            async function getTasks() {
                const response = await fetch('/api/tasks');
                const data = await response.json();
                document.getElementById('result').innerHTML = '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
            }
            getTasks();
        </script>
    </body>
    </html>
    HTML;
});
