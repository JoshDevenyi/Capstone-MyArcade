<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\ArcadesController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [ConsoleController::class, 'index']);

Route::get('/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth');
Route::get('/login', [ConsoleController::class, 'loginForm'])->middleware('guest')->name('login');
Route::post('/login', [ConsoleController::class,'login'])->middleware('guest');
Route::get('/logout',[ConsoleController::class,'logout'])->middleware('auth');

// User Routes
Route::get('/users/list',[UsersController::class,'list'])->middleware('auth');
Route::get('/users/list/name',[UsersController::class,'listByName'])->middleware('auth');
Route::get('/users/list/username',[UsersController::class,'listByUsername'])->middleware('auth');
Route::get('/users/list/email',[UsersController::class,'listByEmail'])->middleware('auth');
Route::get('/users/list/type',[UsersController::class,'listByType'])->middleware('auth');

Route::get('/users/user/{user:id}',[UsersController::class,'user'])->middleware('auth');
Route::get('/users/delete/{user:id}', [UsersController::class, 'delete'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/users/deleteconfirm/{user:id}', [UsersController::class, 'deleteConfirm'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/users/add', [UsersController::class, 'addForm']);
Route::post('/users/add', [UsersController::class, 'add']);
Route::get('/users/edit/{user:id}', [UsersController::class, 'editForm'])->where('user', '[0-9]+')->middleware('auth');
Route::post('/users/edit/{user:id}', [UsersController::class, 'edit'])->where('user', '[0-9]+')->middleware('auth');


// Game Routes
Route::get('/games/list',[GamesController::class,'list']);
Route::get('/games/list/platform',[GamesController::class,'listByPlatform']);
Route::get('/games/list/genre',[GamesController::class,'listByGenre']);
Route::get('/games/list/date',[GamesController::class,'listByDate']);
Route::get('/games/list/rating',[GamesController::class,'listByRating']);

Route::get('/games/game/{game:id}',[GamesController::class,'game']);
Route::get('/games/delete/{game:id}',[GamesController::class, 'delete'])->where('game', '[0-9]+')->middleware('auth');
Route::get('/games/deleteconfirm/{game:id}',[GamesController::class, 'deleteConfirm'])->where('game', '[0-9]+')->middleware('auth');
Route::get('/games/add', [GamesController::class, 'addForm'])->middleware('auth');
Route::post('/games/add', [GamesController::class, 'add'])->middleware('auth');
Route::get('/games/edit/{game:id}', [GamesController::class, 'editForm'])->where('game', '[0-9]+')->middleware('auth');
Route::post('/games/edit/{game:id}', [GamesController::class, 'edit'])->where('game', '[0-9]+')->middleware('auth');

//Game API Routes
Route::get("/apitest",[GamesController::class, 'apitest']);

// Arcade Routes
Route::get('/arcades/list',[ArcadesController::class,'list'])->middleware('auth');
Route::get('/arcades/list/users',[ArcadesController::class,'listByUser'])->middleware('auth');
Route::get('/arcades/list/games',[ArcadesController::class,'listByGames'])->middleware('auth');
Route::get('/arcades/list/platform',[ArcadesController::class,'listByPlatform'])->middleware('auth');
Route::get('/arcades/list/location',[ArcadesController::class,'listByLocation'])->middleware('auth');
Route::get('/arcades/list/playtime',[ArcadesController::class,'listByPlaytime'])->middleware('auth');
Route::get('/arcades/list/date',[ArcadesController::class,'listByDate'])->middleware('auth');
Route::get('/arcades/list/completed',[ArcadesController::class,'listByCompleted'])->middleware('auth');
Route::get('/arcades/list/rating',[ArcadesController::class,'listByRating'])->middleware('auth');


Route::get('/arcades/arcade/{user:id}',[ArcadesController::class,'arcade'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/arcades/arcade/games/{user:id}',[ArcadesController::class,'arcadeByGames'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/arcades/arcade/platform/{user:id}',[ArcadesController::class,'arcadeByPlatform'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/arcades/arcade/location/{user:id}',[ArcadesController::class,'arcadeByLocation'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/arcades/arcade/playtime/{user:id}',[ArcadesController::class,'arcadeByPlaytime'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/arcades/arcade/date/{user:id}',[ArcadesController::class,'arcadeByDate'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/arcades/arcade/completed/{user:id}',[ArcadesController::class,'arcadeByCompleted'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/arcades/arcade/rating/{user:id}',[ArcadesController::class,'arcadeByRating'])->where('user', '[0-9]+')->middleware('auth');


Route::get('/arcades/delete/{arcade:id}',[ArcadesController::class, 'delete'])->where('arcade', '[0-9]+')->middleware('auth');
Route::get('/arcades/deleteconfirm/{arcade:id}',[ArcadesController::class, 'deleteConfirm'])->where('arcade', '[0-9]+')->middleware('auth');
Route::get('/arcades/add/{game:id}', [ArcadesController::class, 'addForm'])->where('game', '[0-9]+')->middleware('auth');
Route::post('/arcades/add', [ArcadesController::class, 'add'])->middleware('auth');
Route::get('/arcades/edit/{arcade:id}', [ArcadesController::class, 'editForm'])->where('arcade', '[0-9]+')->middleware('auth');
Route::post('/arcades/edit/{arcade:id}', [ArcadesController::class, 'edit'])->where('arcade', '[0-9]+')->middleware('auth');