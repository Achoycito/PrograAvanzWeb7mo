<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// Saludo
Route::get('/saludo', function () {
    echo "<h1>Hola</h1>";
});

// Saludo que recibe variable nombre
Route::get('/saludo/{name}', function ($name) {
    echo "<h1>Hola {$name} </h1>";
});

// Suma pero el tercer numero es opcional
Route::get('/suma/{n1}/{n2}/{n3?}', function ($n1, $n2, $n3=0) {
    echo "<h1>".($n1 + $n2 + $n3)."</h1>";
})->where(['n1' => '[0-9]+'], ['n2' =>'[0-9]+']);

Route::post('suma/', function(Request $request){});

Route::get('users/', [UserController::class, 'index']);
Route::get('users/create', [UserController::class, 'create']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users/', [UserController::class, 'store']);

Route::get('clients/', [ClientController::class, 'index']);
Route::get('clients/{id}', [ClientController::class, 'show']);
