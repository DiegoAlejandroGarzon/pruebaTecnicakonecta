<?php

use App\Http\Controllers\administradorController;
use App\Http\Controllers\vendedorController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth/login');
});

Route::get('/inicio', function () {
    return view('inicio');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return view('welcome');
// })->name("inicio");

Route::get('/logout',function(){

    Auth::logout();
    return redirect('/login');

})->name('logoutt');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:administrador']], function () {
        //FUNCIONES DE ADMINISTRADOR
    Route::get('/registroVendedor', [administradorController::class, 'registroVendedor'])->name('registroVendedor');
    Route::get('/administrarVendedores', [administradorController::class, 'administrarVendedores'])->name('administrarVendedores');
    Route::get('/usuariosLista', [administradorController::class, 'usuariosLista'])->name('usuariosLista');
    Route::get('/editarUsuario/{id}', [administradorController::class, 'editarUsuario']);
    Route::post('/editarUsuario', [administradorController::class, 'actualizarUsuario']);
    Route::post('/eliminarUsuario/{id}', [administradorController::class, 'eliminarUsuario']);
    Route::post('/registrarUsuario', [administradorController::class, 'registrarUsuario']);
        
    });
    Route::group(['middleware' => ['role:vendedor|administrador']], function () {
        //FUNCIONES DE VENDEDOR
        Route::get('/registroCliente', [vendedorController::class, 'registrarCliente'])->name('registroCliente');
        Route::get('/administrarClientes', [vendedorController::class, 'administrarClientes'])->name('administrarCliente');
        Route::get('/clientesLista', [vendedorController::class, 'clientesLista']);
        Route::get('/editarCliente/{id}', [vendedorController::class, 'editarCliente']);
        Route::post('/editarCliente', [vendedorController::class, 'actualizarCliente']);
        Route::post('/eliminarCliente/{id}', [vendedorController::class, 'eliminarCliente']);
        Route::post('/registrarClientee', [vendedorController::class, 'registrarClientee']);
    });
});
