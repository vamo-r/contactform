<?php

use App\Http\Controllers\ContactsController;
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

Route::get('/', [ContactsController::class, 'index'])->name('index');
Route::post('/', [ContactsController::class, 'fix'])->name('index.fix');
Route::post('/confirm', [ContactsController::class, 'confirm'])->name('index.confirm');
Route::post('/thanks', [ContactsController::class, 'complete'])->name('index.thanks');

Route::get('/manage', [ContactsController::class, 'manage'])->name('manage');
Route::post('/manage/delete', [ContactsController::class, 'delete'])->name('manage.delete');