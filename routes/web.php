<?php

use App\Http\Controllers\ApplicationsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\ExperiencesController;
use App\Http\Controllers\AcademicsController;
use App\Http\Controllers\CertificationsController;
use App\Http\Controllers\ProfessionalBodiesController;
use App\Http\Controllers\DutiesController;
use App\Http\Controllers\JobAppsController;
use App\Http\Controllers\RefereesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/jobs', JobsController::class);
Route::resource('/profile', ProfilesController::class);
Route::resource('/experience', ExperiencesController::class);
Route::resource('/academic', AcademicsController::class);
Route::resource('/certifications', CertificationsController::class);
Route::resource('/professionalbodies', ProfessionalBodiesController::class);
Route::resource('/duties', DutiesController::class);
Route::resource('/referees', RefereesController::class);
Route::resource('jobs/{id}/apply', JobAppsController::class);
Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
