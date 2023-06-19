<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\VentaController;
<<<<<<< HEAD
use App\Http\Controllers\InventarioInsumoController;

=======
use App\Http\Controllers\InventarioProductoController;
>>>>>>> 441d7c18b1ece5e1e9cb49173769dddbf5d5eb53
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('menuPrincipal');


Route::middleware(['auth'])->group(function () {
    Route::resource('pedidos/visualizar', PedidoController::class);
    Route::resource('ventas/visualizar', VentaController::class);
<<<<<<< HEAD
    Route::resource('inventario/visualizar', InventarioInsumoController::class);
=======
    Route::resource('inventario/visualizar', InventarioProductoController::class);

>>>>>>> 441d7c18b1ece5e1e9cb49173769dddbf5d5eb53

});



