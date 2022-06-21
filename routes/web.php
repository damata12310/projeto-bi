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
Route::get('/logout', [AuthuserController::class, 'logout'])->name('logout.user');

Route::middleware(['master'])->group(function (){

    Route::get('/dashboard', [DashboardController::class, 'home'])->name('dash.home');
    Route::get('/painel/home', [PainelController::class, 'home'])->name('painel.home');
    Route::get('/painel/createEmpresa', [PainelController::class, 'createEmpresa'])->name('createEmpresa.painel');
    Route::get('/painel/createUsuario', [PainelController::class, 'createUsuario'])->name('createUsuario.painel');

    //POST EMPRESA
    Route::post('/painel/criaEmpresa', [PainelController::class, 'criaEmpresa'])->name('criaEmpresa.painel');
    Route::get('/painel/listEmpresa', [PainelController::class, 'listEmpresa'])->name('listEmpresa.painel');
    Route::get('/painel/deleteEmpresa/{id}', [PainelController::class, 'deleteEmpresa'])->name('deleteEmpresa.painel');
    Route::get('/painel/editaEmpresa/{id}', [PainelController::class, 'editaEmpresa'])->name('editaEmpresa.painel');
    Route::post('/painel/editaEmpresaPost', [PainelController::class, 'editaEmpresaPost'])->name('editaEmpresaPost.painel');

    //POST USUARIO
    Route::post('/painel/criaUsuario', [PainelController::class, 'criaUsuario'])->name('criaUsuario.painel');
    Route::get('/painel/listUsuario', [PainelController::class, 'listUsuario'])->name('listUsuario.painel');
    Route::get('/painel/deleteUsuario/{id}', [PainelController::class, 'deleteUsuario'])->name('deleteUsuario.painel');

    Route::get('/painel/editaUsuario/{id}', [PainelController::class, 'editaUsuario'])->name('editaUsuario.painel');
    Route::post('/painel/editaUsuarioPost', [PainelController::class, 'editaUsuarioPost'])->name('editaUsuarioPost.painel');

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

