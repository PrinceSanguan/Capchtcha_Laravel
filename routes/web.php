<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProgrammerController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\AgentController;
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


Route::get('/', [SigninController::class, 'welcome'])->name('welcome');

 Route::get('/auth/login', [LoginController::class, 'index'])->name('auth.login');
 Route::post('/auth/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/auth/signin/{referral_id?}', [SigninController::class, 'index'])->name('signin');
Route::post('/auth/signin', [SigninController::class, 'signinForm'])->name('signin.form');

Route::get('/logout', [PlayerController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
/********************************************This Route is For Player!! *****************************/
Route::get('/User', [PlayerController::class, 'index'])->name('dashboard');
Route::get('/topup', [PlayerController::class, 'topup'])->name('topup');
Route::get('/withdraw', [PlayerController::class, 'withdraw'])->name('withdraw');
Route::post('/withdraw', [PlayerController::class, 'withdrawPoints'])->name('withdraw.points');
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
Route::get('/programmer/pending_account', [ProgrammerController::class, 'PendingAccount'])->name('programmer.pending_account');
Route::get('/programmer/agent', [ProgrammerController::class, 'Agent'])->name('programmer.agent');
Route::get('/programmer/operator', [ProgrammerController::class, 'Operator'])->name('programmer.operator');
// Add the new route for deleting a player
Route::get('/programmer/delete_account/{id}', [ProgrammerController::class, 'DeleteAccount'])->name('programmer.delete_account');
//Route for activate and deactivate User
Route::patch('/programmer/update-user-status/{id}', [ProgrammerController::class, 'updateUserStatus'])->name('programmer.update_status');
Route::get('/programmer/wallet', [ProgrammerController::class, 'wallet'])->name('programmer.wallet');
Route::post('/programmer/wallet/{id}', [ProgrammerController::class, 'SendPoint'])->name('programmer.send_point');
Route::post('/programmer/wallet/deduct/{id}', [ProgrammerController::class, 'DeductPoint'])->name('programmer.deduct_point');
/********************************************This Route is For Programmer!! *****************************/

/********************************************This Route is For Operator!! *****************************/
Route::get('/operator/dashboard', [OperatorController::class, 'index'])->name('operator.dashboard');
Route::get('/operator/pending_account', [OperatorController::class, 'PendingAccount'])->name('operator.pending_account');
Route::get('/operator/player', [OperatorController::class, 'Player'])->name('operator.player');
Route::get('/operator/topup', [OperatorController::class, 'topup'])->name('operator.topup');
Route::get('/operator/my_agent', [OperatorController::class, 'Agent'])->name('operator.agent');
Route::patch('/operator/update-user-status/{id}', [OperatorController::class, 'updateUserStatus'])->name('operator.update_status');
Route::get('/operator/wallet', [OperatorController::class, 'Wallet'])->name('operator.wallet');
Route::post('/operator/wallet/{id}', [OperatorController::class, 'SendPoint'])->name('operator.send_point');
Route::get('/operator/change_password', [OperatorController::class, 'changePassword'])->name('operator.change.password');
Route::post('/operator/change_password', [OperatorController::class, 'changePasswordRequest'])->name('operator.change.passwordrequest');
/********************************************This Route is For Operator!! *****************************/

/********************************************This Route is For Agent!! *****************************/
Route::get('/agent/dashboard', [AgentController::class, 'index'])->name('agent.dashboard');
Route::get('/agent/withdraw', [AgentController::class, 'withdraw'])->name('agent.withdraw');
Route::get('/agent/success', [AgentController::class, 'success'])->name('agent.success');
Route::get('/agent/topup', [AgentController::class, 'topup'])->name('agent.topup');
Route::post('/agent/withdraw', [AgentController::class, 'withdrawPoints'])->name('agent.withdraw.points');
Route::get('/agent/pending_account', [AgentController::class, 'PendingAccount'])->name('agent.pending_account');
Route::get('/agent/player', [AgentController::class, 'Player'])->name('agent.player');
Route::patch('/agent/update-user-status/{id}', [AgentController::class, 'updateUserStatus'])->name('agent.update_status');
Route::get('/agent/wallet', [AgentController::class, 'Wallet'])->name('agent.wallet');
Route::post('/agent/wallet/{id}', [AgentController::class, 'SendPoint'])->name('agent.send_point');
/********************************************This Route is For Agent!! *****************************/

});

