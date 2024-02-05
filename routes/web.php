<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\DashboardController;
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


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login');

Route::get('/signin', [SigninController::class, 'index'])->name('signin');
Route::post('/signin', [SigninController::class, 'signinForm'])->name('signin.form');

Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
/********************************************This Route is For Player!! *****************************/
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/earnings', [DashboardController::class, 'earnings'])->name('earnings');
Route::get('/topup', [DashboardController::class, 'topup'])->name('topup');
Route::get('/withdraw', [DashboardController::class, 'withdraw'])->name('withdraw');
Route::get('/solve_captcha', [DashboardController::class, 'solveCaptcha'])->name('solve.captcha');
Route::get('/error', [DashboardController::class, 'error'])->name('error');
Route::get('/success', [DashboardController::class, 'success'])->name('success');
Route::post('/solve_captcha', [DashboardController::class, 'updateUserPoints'])->name('update.points');
Route::get('/change_password', [DashboardController::class, 'changePassword'])->name('change.password');
Route::post('/change_password', [DashboardController::class, 'changePasswordRequest'])->name('change.passwordrequest');
/********************************************This Route is For Player!! *****************************/

});