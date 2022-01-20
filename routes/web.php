<?php

use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PlayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
//rejsestracja
Auth::routes();
//strona główna
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Tworzenie grupy
Route::get('/create_group', [GroupController::class, 'create'])->middleware('auth');
Route::post('/create_group', [GroupController::class, 'store'])->middleware('auth');
//opcje grupy
Route::get('/groups/show', [GroupController::class, 'index'])->middleware('auth');
Route::get('/groups/menu', [GroupController::class, 'menu'])->middleware('auth');
Route::get('/groups/yours/{id}', [GroupController::class, 'show'])->middleware('auth');
Route::get('/groups/edit/{id}', [GroupController::class, 'edit'])->middleware('auth');
Route::put('/groups/update/{id}', [GroupController::class, 'update'])->middleware('auth');
Route::get('/join/{group_id}', [UserController::class, 'join'])->name('group.join')->middleware('auth');
Route::get('/groups/users/list/{group_id}', [GroupController::class, 'list'])->middleware('auth');
Route::get('/out/{id}', [UserController::class, 'out'])->name('users.out')->middleware('auth');
Route::post('/out/{id}', [UserController::class, 'out'])->name('users.out')->middleware('auth');

//Lista zakupów
Route::get('/list', [ShopController::class, 'display'])->middleware('auth');
Route::get('/add_product', [ShopController::class, 'create'])->middleware('auth');
Route::delete('delete/{id}', [ShopController::class, 'destroy'])->name('products.destroy')->middleware('auth');
Route::get('edit/{id}', [ShopController::class, 'edit'])->middleware('auth');
Route::put('update/{id}', [ShopController::class, 'update'])->middleware('auth');
Route::post('/add_product', [ShopController::class, 'store'])->middleware('auth');

//
Route::get('/withoutgroup', [UserController::class, 'alone'])->middleware('auth');

Route::get('/leave/', [UserController::class, 'leave'])->name('users.leave')->middleware('auth');
Route::get('/profile', [UserController::class, 'index'])->middleware('auth');
Route::get('/edit_profile', [UserController::class, 'edit'])->middleware('auth');
Route::post('/edit_profile', [UserController::class, 'store'])->middleware('auth');



//Ustawienia
Route::get('/settings', [ProfileController::class, 'index'])->middleware('auth');
Route::post('/home',[ProfileController::class, 'profileUpdate'])->name('profileupdate')->middleware('auth');




Route::get('/full', [FullCalenderController::class, 'display'])->middleware('auth');
Route::get('/event/create', [FullCalenderController::class, 'create'])->middleware('auth');
Route::post('/event/create', [FullCalenderController::class, 'store'])->middleware('auth');

Route::get('/event/edit/{id}', [FullCalenderController::class, 'edit'])->middleware('auth');
Route::post('/event/edit/{id}', [FullCalenderController::class, 'update'])->middleware('auth');
Route::delete('/event/delete/{id}', [FullCalenderController::class, 'destroy'])->name('events.destroy')->middleware('auth');
//Route::resource('events', [FullCalenderController::class]);

Route::get('/play', [PlayController::class, 'index'])->middleware('auth');
Route::get('/search', [GroupController::class, 'search'])->middleware('auth');
//Route::get('/profile', [ProfileController::class, 'edit'])->middleware('auth');
//Route::get('/groups/yours', [GroupController::class, 'view'])->middleware('auth');
//Route::post('/join/{group_id}', [UserController::class, 'group_joining'])->middleware('auth');


