<?php

use App\Http\Controllers\BotPowerController;
use App\Http\Controllers\BotSettingsController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\SystemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscordAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/


// Homepage
Route::get('/', [HomepageController::class, 'home'])->middleware('auth');


// Authentication
Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthenticationController::class, 'postLogin']);

Route::get('/registreer', [AuthenticationController::class, 'register'])->middleware('auth');
Route::post('/post_registreer', [AuthenticationController::class, 'postRegistration'])->middleware('auth');

Route::get('/logout', [AuthenticationController::class, 'logout'])->middleware('auth');
Route::get('/wachtwoord-wijzigen', [AuthenticationController::class, 'changePassword'])->middleware('auth');
Route::post('/post-wachtwoord-wijzigen', [AuthenticationController::class, 'postChangePassword'])->middleware('auth');

// Forgot password:
Route::get('/wachtwoord-vergeten', [AuthenticationController::class, 'passwordForgot']);
Route::post('/post-wachtwoord-vergeten', [AuthenticationController::class, 'postPasswordForgot']);

// Statistics
Route::get('/statistieken/kanalen', [StatisticController::class, 'channels'])->middleware('auth');

// Bot settings
Route::get('/instellingen/log', [BotSettingsController::class, 'log'])->middleware('auth');
Route::post('/post-instellingen-bot-log', [BotSettingsController::class, 'postLog'])->middleware('auth');

Route::get('/instellingen-bot-xp', [BotSettingsController::class, 'xp'])->middleware('auth');
Route::post('/post-instellingen-bot-xp', [BotSettingsController::class, 'postXp'])->middleware('auth');

// System
Route::get('/systeem/logs', [SystemController::class, 'systemLogs']);

// Bot power
Route::get('/bot/power', [BotPowerController::class, 'getPower'])->middleware('auth');
Route::get('/getpower', [BotPowerController::class, 'getAPIPowerState'])->middleware('auth');
Route::post('/bot/post-power', [BotPowerController::class, 'postPowerButton'])->middleware('auth');
Route::get('/bot/resources', [BotPowerController::class, 'getResources'])->middleware('auth');