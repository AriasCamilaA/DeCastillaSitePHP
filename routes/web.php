<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/inventario/agregarInsumo', function () {
    return view('/inventario/agregarInsumo');
});

Route::get('/inventario/nuevoProducto', function () {
    return view('/inventario/nuevoProducto');
});

Route::get('/inventario/verProducto', function () {
    return view('/inventario/verProducto');
});

Route::get('/inventario/visualizar', function () {
    return view('/inventario/visualizar');
});

Route::get('/ordenes/visualizar', function () {
    return view('/ordenes/visualizar');
});

Route::get('/pedidos/editarPedido', function () {
    return view('/pedidos/editarPedido');
});

Route::get('/pedidos/nuevoPedido', function () {
    return view('/pedidos/nuevoPedido');
});

Route::get('/pedidos/nuevoPedidoEspecial', function () {
    return view('/pedidos/nuevoPedidoEspecial');
});

Route::get('/pedidos/verPedido', function () {
    return view('/pedidos/verPedido');
});

Route::get('/pedidos/visualizar', function () {
    return view('/pedidos/visualizar');
});

Route::get('/templates/error404', function () {
    return view('/templates/error404');
});

Route::get('/templates/error500', function () {
    return view('/templates/error500');
});

Route::get('/usuarios/login', function () {
    return view('/usuarios/login');
});

Route::get('/usuarios/register', function () {
    return view('/usuarios/register');
});

Route::get('/ventas/editarVenta', function () {
    return view('/ventas/editarVenta');
});

Route::get('/ventas/nuevaVenta', function () {
    return view('/ventas/nuevaVenta');
});

Route::get('/ventas/verVenta', function () {
    return view('/ventas/verVenta');
});

Route::get('/ventas/visualizar', function () {
    return view('/ventas/visualizar');
});

Route::get('landing', function () {
    return view('/landing');
});

Route::get('/nav', function () {
    return view('/home');
});

// Route::get('', function () {
//     return view('/menuPrincipal');
// });

Auth::routes();

// Registrar usuario


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('menuPrincipal');

