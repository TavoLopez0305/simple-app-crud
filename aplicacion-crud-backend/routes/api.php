<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PotentialClientController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Rutas para Citas
Route::post('/crear/cita', [AppointmentController::class, 'store']);
Route::get('/citas', [AppointmentController::class, 'index']);
Route::get('/cita/{appointment}', [AppointmentController::class, 'show']);
Route::put('/editar/cita/{appointment}', [AppointmentController::class, 'update']);
Route::delete('/eliminar/cita/{appointment}', [AppointmentController::class, 'destroy']);

// Rutas para Clientes
Route::post('/registrar/cliente', [ClientController::class, 'store']);
Route::get('/clientes', [ClientController::class, 'index']);
Route::get('/cliente/{client}', [ClientController::class, 'show']);
Route::put('/editar/cliente/{client}', [ClientController::class, 'update']);
Route::delete('/eliminar/cliente/{client}', [ClientController::class, 'destroy']);

// Rutas para Clientes Potenciales
Route::post('/registrar/potencial-cliente', [PotentialClientController::class, 'store']);
Route::get('/potenciales-clientes', [PotentialClientController::class, 'index']);
Route::get('/potencial-cliente/{potentialClient}', [PotentialClientController::class, 'show']);
// Puedes agregar ruta