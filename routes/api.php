<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\MeetingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VaccationController;





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

// Route::middleware('auth:sanctum')
//     ->
Route::middleware('auth:sanctum')->controller(AuthController::class)
    ->group(function () {
        Route::get('me', 'me');
        Route::get('logout', 'logout');
        Route::post('login', 'authenticate')->withoutMiddleware('auth:sanctum');


        Route::resources([
            'users' => UserController::class,
        ]);
        Route::post('vaccations/edit/{vaccation}', [VaccationController::class, 'edit']);

        Route::resources([
            'vaccations' => VaccationController::class,
        ]);

        Route::resources([
            'announcements' => AnnouncementController::class,
        ]);

        Route::resources([
            'meetings' => MeetingController::class,
        ]);


        Route::controller(UserController::class)->group(function () {

            Route::post('change-password/{user}', 'changePassword');
        });


        Route::get('candidats/cv', [CandidatController::class, 'getCv']);

        Route::post(
            'candidats/send-email',
            [
                CandidatController::class,
                'sendEmailToTheCandidat'
            ]
        );

        Route::resources([
            'candidats' => CandidatController::class,
        ]);

        Route::resources([
            'to-do-items' => ToDoItemController::class,
        ]);
    });
