<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth', [UserController::class, 'auth'])->name('auth')->middleware('guest');
Route::post('/auth', [UserController::class, 'ActionAuth'])->name('action-auth');
Route::get('/register', [UserController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [UserController::class, 'ActionRegister'])->name('action-register');
Route::get('/logout', function (){
    Auth::logout();
    return redirect()->back();
})->name('logout');

Route::prefix('test')->group(function () {
    Route::get('/subjects', [\App\Http\Controllers\TestController::class, 'subjects'])->name('subjects-list');
    Route::get('/subject/{id}', [\App\Http\Controllers\TestController::class, 'subjectTests'])->name('subject-test');
    Route::get('/test/{id}/{q_id}', [\App\Http\Controllers\TestController::class, 'test'])->name('test-start');
    Route::post('/test/answer', [\App\Http\Controllers\TestController::class, 'testAnswer'])->name('test-answer');

    Route::get('/results/{id}', [\App\Http\Controllers\TestController::class, 'showResults'])->name('test-results');

});
