// routes/web.php
<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\MedicalRecordController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\AiAnalysisController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/user', [AuthController::class, 'user']);
        Route::get('/appointments', [AppointmentController::class, 'index']);
        
        Route::get('/medical-records', [MedicalRecordController::class, 'index']);
        Route::get('/medical-records/recent', [MedicalRecordController::class, 'recent']);

        Route::get('/doctors', [DoctorController::class, 'index']);
        Route::post('/appointments', [AppointmentController::class, 'store']);
        Route::get('/doctor/appointments', [DoctorController::class, 'appointments']);
        Route::post('/analyze-document', [AiAnalysisController::class, 'analyze']);
    });

});