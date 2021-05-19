<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\VerifyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\ControlPanel;
use App\Http\Controllers\admin\contests;
use App\Http\Controllers\admin\problems;
use App\Http\Controllers\users\ProfileController;
use App\Http\Controllers\competitions\primarycontroller;
use App\Http\Controllers\competitions\DealWithProblem;
use App\Http\Controllers\competitions\Subscription;
use App\Http\Controllers\competitions\DealWithTeam;

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
    return redirect('/home');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

//Auth
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'credentials']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/logout', [LogoutController::class, 'logoutuser'])->name('logout');
Route::get('/verify', [VerifyController::class, 'index'])->name('verify');


//controlpanel
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
Route::get('/controlpanel/problems/', [ControlPanel::class, 'ProblemsView'])->name('problems-view')->middleware('auth');
Route::get('/controlpanel/problems/creat', [ControlPanel::class, 'ProblemsCreat'])->name('problems-creat')->middleware('auth');
Route::post('/controlpanel/problems/creat', [problems::class, 'creat'])->middleware('auth');
Route::get('/controlpanel/problems/edit/{id}', [ControlPanel::class, 'problemsEdit'])->name('problems-edit')->middleware('auth');
Route::post('/controlpanel/problems/edit/{id}', [problems::class, 'edit'])->middleware('auth');
Route::get('/controlpanel/problems/delate/{id}', [ControlPanel::class, 'problemsDelate'])->name('problems-delate')->middleware('auth');

//user
Route::get('/profile/{username}', [ProfileController::class, 'profile'])->name('Profile-show')->middleware('auth');

//competitions
Route::get('/competitions/{sort?}', [primarycontroller::class, 'competitions'])->name('competitions-show');
Route::get('/competition/{name}', [primarycontroller::class, 'ShowCompetition'])->name('competition');
Route::get('/competition/{name}/challenges', [primarycontroller::class, 'challenges'])->name('UserChallenges')->middleware('auth');
Route::get('/competition/{name}/participants', [primarycontroller::class, 'participants'])->name('UserParticipants');
Route::get('/competition/{name}/teams', [primarycontroller::class, 'teams'])->name('UserTeams');
Route::get('/competition/{name}/scoreboard', [primarycontroller::class, 'scoreboard'])->name('scoreboard');

//competitions Subscription
Route::post('/competition/{name}/registration', [Subscription::class, 'registration'])->middleware('auth');
Route::get('/competition/{name}/subscription/{id}', [Subscription::class, 'subscribe'])->name('subscribe')->middleware('auth');


//Competitions Problem
Route::get('/competition/{name}/challenges/{problem}', [DealWithProblem::class, 'problem'])->middleware('auth');

//competitions team
Route::post('/competition/{name}/creatnewteam', [DealWithTeam::class, 'CreatNewTeam'])->name('teamtest')->middleware('auth');
Route::get('/competition/{name}/deleteteam/{id}', [DealWithTeam::class, 'deleteteam'])->middleware('auth');
Route::get('/competition/{name}/joiningtteam/{id}', [DealWithTeam::class, 'joiningtteam'])->middleware('auth');
Route::get('/competition/{name}/leftteam/{id}/{username?}', [DealWithTeam::class, 'leftteam'])->middleware('auth');



