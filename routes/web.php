<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthuserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PainelController;

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


//Route::get('/', function () {
//    return view('login.login');
//});

Route::get('/', [AuthuserController::class, 'login'])->name('login.page');
Route::post('/auth', [AuthuserController::class, 'auth'])->name('auth.user');

Route::middleware(['master'])->group(function (){

    Route::get('/dashboard', [DashboardController::class, 'home'])->name('dash.home');
    Route::get('/painel/home', [PainelController::class, 'home'])->name('painel.home');
    Route::get('/painel/createEmpresa', [PainelController::class, 'createEmpresa'])->name('createEmpresa.painel');

    //Post
    Route::post('/painel/criaEmpresa', [PainelController::class, 'criaEmpresa'])->name('criaEmpresa.painel');

});

Route::middleware(['soulog'])->group(function (){

    Route::get('soulog', function (){
        dd('Você é um soulog');
    });

});

Route::middleware(['cliente'])->group(function (){

    Route::get('cliente', function (){
        dd('Você é um cliente');
    });
});

