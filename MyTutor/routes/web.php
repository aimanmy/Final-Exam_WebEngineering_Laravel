<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubjectListController;

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

Route::get('/', [AuthController::class,'index'])->name('index');
Route::get('login_page', [AuthController::class,'login'])->name('login_page');
Route::get('register_page', [AuthController::class,'register'])->name('register_page');
Route::get('landing_page', [AuthController::class,'logout'])->name('landing_page');
Route::get('post-login', [AuthController::class,'postLogin'])->name('login.post');
Route::get('landing_page', [AuthController::class,'landpage'])->name('landing_page');
Route::get('post-register', [AuthController::class,'postRegistration'])->name('register.post');
Route::get('main_page', [SubjectListController::class,'mainpage'])->name('main_page');
Route::post('/saveSubject', [SubjectListController::class,'saveSubject'])->name('saveSubject');
Route::post('/markDeleteRoute/{subject_id}', [SubjectListController::class, 'markDelete'])->name('markDelete');
Route::post('/markUpdateRoute/{subject_id}', [SubjectListController::class, 'markUpdate'])->name('markUpdate');

