<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AutorizacionController;
use App\Http\Controllers\EspecialesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\controllers\EnvioproveeController;
use GuzzleHttp\Middleware;

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
    return view('auth.login');
});

 Auth::routes();
// Auth::routes(["password/reset" => false]);

Route::group(['Middleware' => 'auth'], function(){
    Route::get('/home', [App\Http\Controllers\SolicitudController::class, 'index'])->name('home');
    Route::get('solicitud', [SolicitudController::class, 'index'])->name('solicitud');
    Route::get('proveedores', [ProveedoresController::class, 'index'])->name('proveedores');
    Route::get('productos', [ProductosController::class, 'index'])->name('productos');
    // Route::get('autorizacion', [AutorizacionController::class, 'index'])->name('autorizacion');
    Route::get('especial', [EspecialesController::class, 'index'])->name('especial');
  
    Route::resource('permissions', PermissionController::class);
    Route::resource('producto', ProductosController::class);
    // Route::resource('solicitud', SolicitudController::class);
    
    Route::resource('autorizacion', AutorizacionController::class);
    Route::resource('proveedore', ProveedoresController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('user', UserController::class);
    Route::resource('Envioprovee', EnvioproveeController::class);
    // Route::resource('especiales', EspecialesController::class);

});
// Route::resource('solicitud', SolicitudController::class);
Route::get('solicitud/create', [SolicitudController::class, 'create'])->name('solicitud/create')->middleware('auth');
Route::post('solicitud', [SolicitudController::class, 'store'])->name('solicitud/store')->middleware('auth');
Route::put('solicitud/.$solicitu->id./edit',[ SolicitudController::class,'edit'])->name('solicitud.edit')->middleware('auth');
Route::post('productos/create', [ProductosController::class, 'store'])->name('productos/create');
Route::post('/productos/update,$producto->id', [ProductosController::class, 'update'])->name('/productos/update,$producto->id');
Route::post('/proveedores/update,$producto->id', [ProveedoresController::class, 'update'])->name('/proveedores/update,$producto->id');
Route::post('proveedores/create', [ProveedoresController::class, 'store'])->name('proveedores/create');
Route::post('/roles/update,$role->id', [RolesController::class, 'update'])->name('/roles/update,$roles->id');

Route::post('ajax/consulta', [AjaxController::class,'store'])->name('ajax.consulta');
Route::post('ajax/profes', [AjaxController::class,'store'])->name('ajax.profes');
Route::post('ajax/register', [AjaxController::class,'registrar'])->name('ajax.register');
Route::post('ajax/product', [AjaxController::class,'producto'])->name('ajax.product');
Route::post('search',[SolicitudController::class, 'autosearch'])->name('search');
Route::get('solicitud/profes', [SolicitudController::class,'profesionales'])->name('profes');
Route::get('buscador', [SolicitudController::class,'autobuscador'])->name('buscador');
//Route::post('permissiona/'.$permission->id.'/create', [ProveedoresController::class, 'store'])->name('proveedores/'.$permission->id.'create');

// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Auth::routes(['password/reset' => false]);