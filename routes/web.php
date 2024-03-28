<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProgrammerController;
use App\Http\Controllers\IndexController;
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


Route::get('/', [IndexController::class, 'index'])->name('welcome');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/services', [IndexController::class, 'services'])->name('services');
Route::get('/why_us', [IndexController::class, 'whyUs'])->name('why.us');
Route::get('/practice', [IndexController::class, 'practice'])->name('practice');
Route::post('/practice', [IndexController::class, 'practiceSolve'])->name('practice.solve');

 Route::get('/auth/login', [LoginController::class, 'index'])->name('auth.login');
 Route::post('/auth/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/auth/signin/{referral_id?}', [SigninController::class, 'index'])->name('signin');
Route::post('/auth/signin', [SigninController::class, 'signinForm'])->name('signin.form');

Route::get('/logout', [PlayerController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
/********************************************This Route is For Player!! *****************************/
Route::get('player/User', [PlayerController::class, 'index'])->name('dashboard');
Route::get('player/topup', [PlayerController::class, 'topup'])->name('topup');
Route::post('player/topup', [PlayerController::class, 'topupSuccess'])->name('topupSuccess');
Route::get('player/withdraw', [PlayerController::class, 'withdraw'])->name('withdraw');
Route::post('player/withdraw', [PlayerController::class, 'withdrawPoints'])->name('withdraw.points');
Route::get('player/solve_captcha', [PlayerController::class, 'solveCaptcha'])->name('solve.captcha');
Route::get('player/solve_math', [PlayerController::class, 'SolveMath'])->name('solve.math');
Route::get('player/transactions', [PlayerController::class, 'transactions'])->name('transactions');

// Route for Trial Promo
Route::get('player/promo', [PlayerController::class, 'Promo'])->name('promo');
Route::post('player/promo/update1', [PlayerController::class, 'UpdatePromo1'])->name('player.update_promo1');
Route::post('player/promo/update2', [PlayerController::class, 'UpdatePromo2'])->name('player.update_promo2');
Route::post('player/promo/update3', [PlayerController::class, 'UpdatePromo3'])->name('player.update_promo3');
Route::post('player/promo/update4', [PlayerController::class, 'UpdatePromo4'])->name('player.update_promo4');
Route::post('player/promo/update5', [PlayerController::class, 'UpdatePromo5'])->name('player.update_promo5');
Route::post('player/promo/update6', [PlayerController::class, 'UpdatePromo6'])->name('player.update_promo6');

Route::get('player/error', [PlayerController::class, 'error'])->name('error');
Route::get('player/success', [PlayerController::class, 'success'])->name('success');
Route::post('player/solve_captcha', [PlayerController::class, 'updateUserPoints'])->name('update.points');
Route::get('player/change_password', [PlayerController::class, 'changePassword'])->name('change.password');
Route::post('player/change_password', [PlayerController::class, 'changePasswordRequest'])->name('change.passwordrequest');
/********************************************This Route is For Player!! *****************************/

/********************************************This Route is For Programmer!! *****************************/
Route::get('/programmer/dashboard', [ProgrammerController::class, 'index'])->name('programmer.dashboard');
Route::get('/programmer/player', [ProgrammerController::class, 'Player'])->name('programmer.player');
Route::get('/programmer/pending_account', [ProgrammerController::class, 'PendingAccount'])->name('programmer.pending_account');
Route::get('/programmer/agent', [ProgrammerController::class, 'Agent'])->name('programmer.agent');
Route::get('/programmer/operator', [ProgrammerController::class, 'Operator'])->name('programmer.operator');
// Route for Updating the level
Route::get('/programmer/level', [ProgrammerController::class, 'Level'])->name('programmer.level');
Route::post('/programmer/level/{id}', [ProgrammerController::class, 'UpdateLevel'])->name('programmer.update.level');
// Transaction Routing
Route::get('/programmer/transaction', [ProgrammerController::class, 'Transaction'])->name('programmer.transaction');
Route::post('/programmer/transaction/{id}', [ProgrammerController::class, 'TransactionStatus'])->name('programmer.transaction_status');
// Add the new route for deleting a player
Route::get('/programmer/delete_account/{id}', [ProgrammerController::class, 'DeleteAccount'])->name('programmer.delete_account');
//Route for activate and deactivate User
Route::patch('/programmer/update-user-status/{id}', [ProgrammerController::class, 'updateUserStatus'])->name('programmer.update_status');
Route::get('/programmer/wallet', [ProgrammerController::class, 'wallet'])->name('programmer.wallet');
Route::post('/programmer/wallet/{id}', [ProgrammerController::class, 'SendTrial'])->name('programmer.send_trial');
/********************************************This Route is For Programmer!! *****************************/


});

