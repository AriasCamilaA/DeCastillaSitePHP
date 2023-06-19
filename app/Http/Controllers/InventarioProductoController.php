<?php

namespace App\Http\Controllers;

use App\Models\InventarioProducto;
use Illuminate\Http\Request;

class InventarioProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $InventarioProducto = InventarioProducto::all();
        return view('inventario/visualizar',compact('InventariProducto'));
        //
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
    public function show(InventarioProducto $inventarioProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InventarioProducto $inventarioProducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InventarioProducto $inventarioProducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InventarioProducto $inventarioProducto)
    {
        //
    }
}
