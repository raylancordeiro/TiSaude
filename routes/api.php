<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//TODO: AUTENTICAR TODAS AS ROTAS
Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::post('login', [ 'as' => 'login', 'uses' => '\App\Http\Controllers\AuthController@login']);
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(\App\Http\Controllers\MedicoController::class)->group(function () {
    Route::get('medico', "index");
    Route::get('medico/{id}', "show");
    Route::post('medico', "store");
    Route::delete('medico/{id}', "destroy");
});

Route::controller(\App\Http\Controllers\EspecialidadeController::class)->group(function () {
    Route::get('especialidade', "index");
    Route::get('especialidade/{id}', "show");
    Route::post('especialidade', "store");
    Route::delete('especialidade/{id}', "destroy");
});

Route::controller(\App\Http\Controllers\PlanoSaudeController::class)->group(function () {
    Route::get('plano', "index");
    Route::get('plano/{id}', "show");
    Route::post('plano', "store");
    Route::delete('plano/{id}', "destroy");
});

Route::controller(\App\Http\Controllers\PacienteController::class)->group(function () {
    Route::get('paciente', "index");
    Route::get('paciente/{id}', "show");
    Route::post('paciente', "store");
    Route::delete('paciente/{id}', "destroy");
});

Route::controller(\App\Http\Controllers\ProcedimentoController::class)->group(function () {
    Route::get('procedimento', "index");
    Route::get('procedimento/{id}', "show");
    Route::post('procedimento', "store");
    Route::delete('procedimento/{id}', "destroy");
});

Route::controller(\App\Http\Controllers\ConsultaController::class)->group(function () {
    Route::get('consulta', "index");
    Route::get('consulta/{consulta}', "show");
    Route::post('consulta', "store");
    Route::delete('consulta/{id}', "destroy");
});
