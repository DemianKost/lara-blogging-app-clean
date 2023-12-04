<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Posts\IndexController;
use App\Http\Controllers\Api\V1\Posts\ShowController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('posts')->as('posts:')->group( function() {
    Route::get('/', IndexController::class)->name('index'); // route('api:v1:posts:index')
    Route::get('{post:key}', ShowController::class)->name('show');
} );