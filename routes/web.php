<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
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

Auth::routes();
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
  Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
  Route::post('register', [RegisterController::class, 'register']);
});

Route::get('/', [ContactsController::class, 'index'])->name('index');
Route::post('/', [ContactsController::class, 'fix'])->name('index.fix');
Route::get('/confirm', [ContactsController::class, 'confirm']);
Route::post('/confirm', [ContactsController::class, 'confirm'])->name('index.confirm');
Route::post('/thanks', [ContactsController::class, 'complete'])->name('index.thanks');

Route::get('/manage', [ContactsController::class, 'manage'])->middleware('auth')->name('manage');
Route::post('/manage/delete', [ContactsController::class, 'delete'])->name('manage.delete');
