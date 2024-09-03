<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\JobSeekerProfileController;
use App\Http\Controllers\API\EmployerProfileController;
use App\Http\Controllers\API\JobVacancyController;
use App\Http\Controllers\API\JobApplicationController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('job-seeker-profiles', JobSeekerProfileController::class);
    Route::apiResource('employer-profiles', EmployerProfileController::class);
    Route::apiResource('job-vacancies', JobVacancyController::class);
    Route::apiResource('job-applications', JobApplicationController::class);
});
