<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Posts\IndexController;
use App\Http\Controllers\Api\V1\Posts\ShowController;
use App\Http\Controllers\Api\V1\Posts\StoreController;
use App\Http\Controllers\Api\V1\Posts\DeleteController;
use App\Http\Controllers\Api\V1\Posts\UpdateController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Post Endpoints
 */
Route::prefix('posts')->as('posts:')->group( function() {
    Route::get('/', IndexController::class)->name('index'); // route('api:v1:posts:index')
    Route::post('/', StoreController::class)->name('store'); // route('api:v1:posts:store')
    Route::get('{post:key}', ShowController::class)->name('show'); // route('api:v1:posts:show')
    Route::put('{post:key}', UpdateController::class)->name('update'); // route('api:v1:posts:update')
    Route::delete('{post:key}', DeleteController::class)->name('delete'); // route('api:v1:posts:delete')
} );