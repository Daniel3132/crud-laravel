<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
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

/* Route::get('/', function () {
    return view('auth.login');
}); */
/* 
Route::get('/empleado', function () {
    return view('empleado.index');
});

Route::get('empleado/create', [EmpleadoController::class,'create']);
 */
//->middlewares auth para que respete la autenticacion
Route::resource('empleado',EmpleadoController::class)->middleware('auth');
//se ponen como false los que no queremos que aparezcan
//Auth::routes(['register'=>false,'reset'=>false]);
Auth::routes(['reset'=>false]);
Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
//ir directamente a index
Route::group(['middleware'=>'auth'], function(){
Route::get('/', [EmpleadoController::class,'index'])->name('home');
});