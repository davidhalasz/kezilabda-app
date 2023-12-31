<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

Route::get('/', [Controller::class, 'welcome'])->name('welcome');

Route::get('/kapcsolat', [Controller::class, 'kapcsolat'])->name('kapcsolat');

Route::get('/csapatok/{id}', [Controller::class, 'csapatok'])->name('csapatok');

Route::get('/edzok', [Controller::class, 'edzok'])->name('edzok');

Route::get('/jatekosok/{gender}', [Controller::class, 'jatekosok'])->name('jatekosok');

Route::get('/hirek', [Controller::class, 'hirek'])->name('hirek');

Route::get('/hirek/{id}', [Controller::class, 'hir'])->name('hir');

Route::get('/esemenyek', [Controller::class, 'esemenyek'])->name('esemenyek');

Route::get('/edzesek', [Controller::class, 'edzesek'])->name('edzesek');

Route::get('/szabalyzatok', [Controller::class, 'dokumentumok'])->name('szabalyzatok');
