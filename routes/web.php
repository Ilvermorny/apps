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
/* Route::resource('users', 'UsersController', [
    'only' => ['index', 'show']
]);

Route::resource('monkeys', 'MonkeysController', [
    'except' => ['edit', 'create']
]); */



/**
 * All Bank routes
 */
Route::prefix('bank')->group(function () {
    /**
     * All auth Bank subsystem routes
     */
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('vaults', 'VaultController')->except(['index', 'show']);
        Route::resource('transactions', 'TransactionController')->except(['index', 'show', 'destroy']);
        Route::group(['middleware' => ['checkdirector']], function () {
            Route::resource('transactions', 'TransactionController')->only(['destroy']);
        });
    });

    /**
     * All public Bank subsystem routes
     */
    Route::resource('transactions', 'TransactionController')->only(['index', 'show']);
    Route::resource('vaults', 'VaultController')->only(['index']);
    Route::get('vaults/{vault}', 'VaultController@show')->name('vaults.show');
    Route::get('vault/{type}/{forum}', 'VaultController@specialRedirect')->name('vaults.specialRedirect');

    //Route::resource('vaults/{slug}', 'VaultController', [''])->only(['show']);

});

/**
 * All Auth System routes
 */

Auth::routes([
    'register' => false,
    'password.email' => false,
    'password.request' => false,
    //'password.update' => false,
    'password.reset' => false,
]);

/**
 * Other System
 */

Route::redirect('bank', 'bank/vaults');
Route::redirect('', 'bank/vaults');



Route::redirect('/home', '/')->name('home');


Route::group(['middleware' => ['auth', 'checkadmin']], function () {
    Route::resource('admin/users', 'UserController');
    Route::get('admin/users/{user}/password', 'UserController@password')->name('users.password');
    Route::put('admin/users/{user}/password', 'UserController@updatePassword')->name('users.passwordUpdate');
});