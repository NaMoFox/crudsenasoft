<?php

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


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('clientes')->name('clientes/')->group(static function() {
            Route::get('/',                                             'ClientesController@index')->name('index');
            Route::get('/create',                                       'ClientesController@create')->name('create');
            Route::post('/',                                            'ClientesController@store')->name('store');
            Route::get('/{cliente}/edit',                               'ClientesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ClientesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cliente}',                                   'ClientesController@update')->name('update');
            Route::delete('/{cliente}',                                 'ClientesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('proveedors')->name('proveedors/')->group(static function() {
            Route::get('/',                                             'ProveedorController@index')->name('index');
            Route::get('/create',                                       'ProveedorController@create')->name('create');
            Route::post('/',                                            'ProveedorController@store')->name('store');
            Route::get('/{proveedor}/edit',                             'ProveedorController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProveedorController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{proveedor}',                                 'ProveedorController@update')->name('update');
            Route::delete('/{proveedor}',                               'ProveedorController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tiendas')->name('tiendas/')->group(static function() {
            Route::get('/',                                             'TiendaController@index')->name('index');
            Route::get('/create',                                       'TiendaController@create')->name('create');
            Route::post('/',                                            'TiendaController@store')->name('store');
            Route::get('/{tienda}/edit',                                'TiendaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TiendaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tienda}',                                    'TiendaController@update')->name('update');
            Route::delete('/{tienda}',                                  'TiendaController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('productos')->name('productos/')->group(static function() {
            Route::get('/',                                             'ProductoController@index')->name('index');
            Route::get('/create',                                       'ProductoController@create')->name('create');
            Route::post('/',                                            'ProductoController@store')->name('store');
            Route::get('/{producto}/edit',                              'ProductoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProductoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{producto}',                                  'ProductoController@update')->name('update');
            Route::delete('/{producto}',                                'ProductoController@destroy')->name('destroy');
        });
    });
});