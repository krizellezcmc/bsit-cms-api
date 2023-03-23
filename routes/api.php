<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\VisionController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OutcomesController;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
// */

// OBJECTIVES
Route::get('/objectives', [ObjectiveController::class, 'index']);   
Route::post('/objectives', [ObjectiveController::class, 'store']);    
Route::post('/objectives/{id}', [ObjectiveController::class, 'update']);  
// Route::delete('/objectives/{id}', [ObjectiveController::class, 'destroy']);        


// MISSION
Route::get('/mission', [MissionController::class, 'index']);   
Route::post('/mission', [MissionController::class, 'store']);
Route::post('/mission/{id}', [MissionController::class, 'update']);  
// Route::delete('/mission/{id}', [MissionController::class, 'destroy']);    


// VISION
Route::get('/vision', [VisionController::class, 'index']);     
// Route::post('/vision', [VisionController::class, 'store']);
Route::post('/vision/{id}', [VisionController::class, 'update']);  
// Route::delete('/vision/{id}', [VisionController::class, 'destroy']);   


// VISION
Route::get('/outcomes', [OutcomesController::class, 'index']);     
// Route::post('/outcomes', [VisionController::class, 'store']);
Route::post('/outcomes/{id}', [OutcomesController::class, 'update']);  
// Route::delete('/outcomes/{id}', [OutcomesController::class, 'destroy']);   


// FACULTY
Route::get('/faculty', [FacultyController::class, 'index']);   
Route::post('/faculty', [FacultyController::class, 'store']);    
Route::get('/faculty/{id}', [FacultyController::class, 'show']);  
Route::post('/faculty/{id}', [FacultyController::class, 'update']);  
Route::delete('/faculty/{id}', [FacultyController::class, 'destroy']);         


// PROGRAM OFFER
Route::get('/programs', [ProgramController::class, 'index']);  
Route::get('/programs/{id}', [ProgramController::class, 'show']);   
Route::post('/programs', [ProgramController::class, 'store']);    
Route::post('/programs/{id}', [ProgramController::class, 'update']);  
Route::delete('/programs/{id}', [ProgramController::class, 'destroy']); 


// NEWS
Route::get('/news', [NewsController::class, 'index']);   
Route::post('/news', [NewsController::class, 'store']);    
Route::post('/news/{id}', [NewsController::class, 'update']);  
Route::delete('/news/{id}', [NewsController::class, 'destroy']); 



// NEWS
Route::get('/user', [UserController::class, 'index']);   
Route::post('/register', [UserController::class, 'register']);   
Route::post('/login', [UserController::class, 'login']);    
// Route::post('/user/{id}', [UserController::class, 'update']);  
// Route::delete('/user/{id}', [UserController::class, 'destroy']); 



// Route::post('/objectives', );

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
