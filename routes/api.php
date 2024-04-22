<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\LessonController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/admin/users', [UserController::class, 'index']);
Route::middleware('auth:sanctum')->post('/admin/user/register', [RegisteredUserController::class, 'storeAdmin']);

Route::middleware('auth:sanctum')->get('/admin/sections', [SectionController::class, 'index']);
Route::middleware('auth:sanctum')->post('/admin/sections', [SectionController::class, 'store']);
Route::middleware('auth:sanctum')->delete('/admin/sections/{id}', [SectionController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/admin/sections/{id}', [SectionController::class, 'show']);
Route::middleware('auth:sanctum')->put('/admin/sections/{id}', [SectionController::class, 'update']);

Route::middleware('auth:sanctum')->get('/admin/lessons', [LessonController::class, 'index']);
Route::middleware('auth:sanctum')->post('/admin/lesson/store', [LessonController::class, 'store']);
Route::middleware('auth:sanctum')->get('/admin/lessons/{id}', [LessonController::class, 'show']);
Route::middleware('auth:sanctum')->put('/admin/lessons/{id}', [LessonController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/admin/lessons/{id}', [LessonController::class, 'destroy']);


