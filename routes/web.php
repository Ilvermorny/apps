<?php


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


Route::resource('bank/vaults', 'VaultController');
Route::redirect('bank', 'bank/vaults');
Route::redirect('', 'bank/vaults');
