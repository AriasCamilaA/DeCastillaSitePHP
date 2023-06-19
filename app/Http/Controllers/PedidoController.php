<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\vw_pedidos_finalizados;
use App\Models\vw_pedidos_no_finalizados;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pedidos_finalizados = vw_pedidos_finalizados::all();
        $pedidos_no_finalizados = vw_pedidos_no_finalizados::all();
        return view('pedidos/visualizar', compact('pedidos_finalizados','pedidos_no_finalizados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
