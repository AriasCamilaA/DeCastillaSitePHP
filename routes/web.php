<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\InventarioInsumoController;
use App\Http\Controllers\ProveedorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('landing', function () {
    return view('/landing');
});

Auth::routes();

Route::get('ordenes/pdf',[App\Http\Controllers\ProveedorController::class, 'pdf'])->name('ordenes.pdf');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('menuPrincipal');


Route::middleware(['auth'])->group(function () {
    Route::resource('pedidos/visualizarPedido', PedidoController::class);
    Route::resource('ventas/visualizarVenta', VentaController::class);
    Route::resource('inventario/visualizarInventario', InventarioInsumoController::class);
    Route::resource('ordenes/visualizar', ProveedorController::class);

});



