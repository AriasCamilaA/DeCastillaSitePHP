<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\vw_datosventa;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = DB::select('SELECT * FROM producto');
        $ventas=vw_datosventa::all();
        return view('ventas/visualizarVenta',compact('ventas','productos'));
        //
    }

    public function pdf()
    {
        $ventas=vw_datosventa::all();

        $pdf = PDF::loadView('ventas.pdf',['ventas'=> $ventas]);
        return $pdf->stream();
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

        $descripcion = $request->input('descripcion');
        $productos = $request->input('productos');

        DB::insert('INSERT INTO Venta (fecha_Venta, hora_venta, total_Venta, noDocumento_Usuario_FK)
        VALUES (CURDATE(), CURTIME(), 0 ,'. Auth::user()->noDocumento_Usuario .')'
        );


        $lastInsertedId = DB::selectOne('SELECT LAST_INSERT_ID() as id')->id;

        foreach ($productos as $productoId => $producto) {

            DB::insert(
                'INSERT INTO DetalleVenta (cantidad_producto, subtotal_DetalleVenta, id_Producto_FK, id_Venta_FK) VALUES (
                    ' . $producto['cantidad'] . ', '
                    . ($producto['precio'] * $producto['cantidad']) . ', '
                    . $productoId . ', '
                    . $lastInsertedId . ')'
                    
            );            
        };
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Ventas $ventas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ventas $ventas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ventas $ventas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ventas $ventas)
    {
        //
    }
}
