<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CharacterController;

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

Route::get('/', [DefaultController::class, 'index']);

Route::post('/register', [RegisterController::class, 'index'])
    ->name('registration');

Route::post('/change/password', [RegisterController::class, 'changepassword'])
    ->name('change.password');

Route::get('/register/validation/{username}/{code}', [RegisterController::class, 'validation'])
    ->name('registration.validation');

Route::get('reset/position/{char_id}', [CharacterController::class, 'resetPosition'])
    ->name('reset.position');

Route::post('login/authenticate', [LoginController::class, 'authenticate'])
    ->name('login.authenticate');

Route::get('logout', [LoginController::class, 'logout'])
    ->name('logout');