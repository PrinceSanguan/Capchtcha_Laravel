<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProgrammerController;
use App\Http\Controllers\OperatorController;
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

Route::get('/signin/{referral_id?}', [SigninController::class, 'index'])->name('signin');
Route::post('/signin', [SigninController::class, 'signinForm'])->name('signin.form');

Route::get('/logout', [PlayerController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
/********************************************This Route is For Player!! *****************************/
Route::get('/User', [PlayerController::class, 'index'])->name('dashboard');
Route::get('/earnings', [PlayerController::class, 'earnings'])->name('earnings');
Route::get('/topup', [PlayerController::class, 'topup'])->name('topup');
Route::get('/withdraw', [PlayerController::class, 'withdraw'])->name('withdraw');
Route::get('/solve_captcha', [PlayerController::class, 'solveCaptcha'])->name('solve.captcha');
Route::get('/error', [PlayerController::class, 'error'])->name('error');
Route::get('/success', [PlayerController::class, 'success'])->name('success');
Route::post('/solve_captcha', [PlayerController::class, 'updateUserPoints'])->name('update.points');
Route::get('/change_password', [PlayerController::class, 'changePassword'])->name('change.password');
Route::post('/change_password', [PlayerController::class, 'changePasswordRequest'])->name('change.passwordrequest');
/********************************************This Route is For Player!! *****************************/

/********************************************This Route is For Programmer!! *****************************/
Route::get('/programmer/dashboard', [ProgrammerController::class, 'index'])->name('programmer.dashboard');
Route::get('/programmer/player', [ProgrammerController::class, 'Player'])->name('programmer.player');
Route::get('/programmer/all_account', [ProgrammerController::class, 'AllAccount'])->name('programmer.all_account');
Route::get('/programmer/agent', [ProgrammerController::class, 'Agent'])->name('programmer.agent');
Route::get('/programmer/operator', [ProgrammerController::class, 'Operator'])->name('programmer.operator');
// Add the new route for deleting a player
Route::get('/programmer/delete_account/{id}', [ProgrammerController::class, 'DeleteAccount'])->name('programmer.delete_account');
//Route for activate and deactivate User
Route::patch('/programmer/update-user-status/{id}', [ProgrammerController::class, 'updateUserStatus'])->name('programmer.update_status');
Route::get('/programmer/wallet', [ProgrammerController::class, 'wallet'])->name('programmer.wallet');
Route::post('/programmer/wallet/{id}', [ProgrammerController::class, 'SendPoint'])->name('programmer.send_point');
/********************************************This Route is For Programmer!! *****************************/

Route::get('/operator/dashboard', [OperatorController::class, 'index'])->name('operator.dashboard');
});