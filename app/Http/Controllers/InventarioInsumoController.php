<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Models\vw_inventario_insumo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventarioInsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vw_inventario_insumo = vw_inventario_insumo::all();
        return view('inventario/visualizarinventario', compact('vw_inventario_insumo'));
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
        $insumo = new Insumo;
        $insumo->nombre_Insumo=$request->input('nombre_Insumo');
        $insumo->id_Estado_FK=1;
        $insumo->save();
        return redirect()->back();
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InventarioInsumo $inventarioInsumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $insumo = Insumo::find($id);
        $insumo->id_Insumo=$request->input('id_Insumo');
        $insumo->nombre_Insumo=$request->input('nombre_Insumo');
        $insumo->id_Estado_FK=$request->input('id_Estado_FK');
        $insumo->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $insumo = Insumo::find($id);
        $insumo->estado=0;
        $insumo->delete();
        return redirect()->back();
    }
}
