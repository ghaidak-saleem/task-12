<?php

use App\Http\Controllers\Api\Dashboard\AboutController;
use App\Http\Controllers\Api\Dashboard\AuthController;
use App\Http\Controllers\Api\Dashboard\CertificateController;
use App\Http\Controllers\Api\Dashboard\CommunicateController;
use App\Http\Controllers\Api\Dashboard\CvController;
use App\Http\Controllers\Api\Dashboard\DashboardController;
use App\Http\Controllers\Api\Dashboard\EducatedegreeController;
use App\Http\Controllers\Api\Dashboard\ExperienceController;
use App\Http\Controllers\Api\Dashboard\ImageController;
use App\Http\Controllers\Api\Dashboard\JobController;
use App\Http\Controllers\Api\Dashboard\PortfolioController;
use App\Http\Controllers\Api\Dashboard\ProjectController;
use App\Http\Controllers\Api\Dashboard\ServiceController;
use App\Http\Controllers\Api\Dashboard\SkillController;
use App\Models\Communicate;
use App\Models\Educatedegree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('guest')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::resource('abouts', AboutController::class);

    Route::resource('certificates', CertificateController::class);
    Route::resource('communicates', CommunicateController::class);
    Route::resource('cvs', CvController::class);
    Route::resource('educatedegrees', EducatedegreeController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('images', ImageController::class);
    Route::resource('jobs', JobController::class);


    Route::get('portfolio/', [PortfolioController::class, 'showPortfolio']);
});
