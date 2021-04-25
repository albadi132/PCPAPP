<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\VerifyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\ControlPanel;
use App\Http\Controllers\admin\contests;

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

Route::get('/', function () {
    return view('home');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'credentials']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/logout', [LogoutController::class, 'logoutuser'])->name('logout');

Route::get('/verify', [VerifyController::class, 'index'])->name('verify');

Route::get('/controlpanel', [ControlPanel::class, 'index'])->name('controlpanel')->middleware('auth');
Route::get('/controlpanel/authentication/users', [ControlPanel::class, 'AuthenticationUsers'])->name('authentication-users')->middleware('auth');
Route::get('/controlpanel/authentication/role', [ControlPanel::class, 'AuthenticationRole'])->name('authentication-role')->middleware('auth');
Route::get('/controlpanel/contests/', [ControlPanel::class, 'contestsView'])->name('contests-view')->middleware('auth');
Route::get('/controlpanel/contests/creat', [ControlPanel::class, 'contestsCreat'])->name('contests-creat')->middleware('auth');
Route::post('/controlpanel/contests/creat', [contests::class, 'creat'])->middleware('auth');
Route::get('/controlpanel/contests/edit/{id}', [ControlPanel::class, 'contestsEdit'])->name('contests-edit')->middleware('auth');
Route::post('/controlpanel/contests/edit/{id}', [contests::class, 'edit'])->middleware('auth');
Route::get('/controlpanel/contests/active/{id}', [ControlPanel::class, 'contestsActive'])->name('contests-active')->middleware('auth');
Route::get('/controlpanel/contests/delate/{id}', [ControlPanel::class, 'contestsDelate'])->name('contests-delate')->middleware('auth');
Route::get('/controlpanel/problems/view', [ControlPanel::class, 'ProblemsView'])->name('problems-view')->middleware('auth');
Route::get('/controlpanel/problems/creat', [ControlPanel::class, 'ProblemsCreat'])->name('problems-creat')->middleware('auth');
