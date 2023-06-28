<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\vw_pedidos_finalizados;
use App\Models\vw_pedidos_no_finalizados;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;



class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = DB::select('SELECT * FROM producto');
        $pedidos_finalizados = vw_pedidos_finalizados::all();
        $pedidos_no_finalizados = vw_pedidos_no_finalizados::all();
        return view('pedidos/visualizarPedido', compact('pedidos_finalizados','pedidos_no_finalizados','productos'));
    }

    public function pdf()
    {
        //
        $productos = DB::select('SELECT * FROM producto');
        $pedidos_finalizados = vw_pedidos_finalizados::all();
        $pedidos_no_finalizados = vw_pedidos_no_finalizados::all();

        //$pdf = PDF::loadView('pedidos.pdf',['pedidos_finalizados'=> $pedidos_finalizados , 'pedidos_no_finalizados'=> $pedidos_no_finalizados]);
        $pdf = PDF::loadView('pedidos.pdf', ['pedidos_finalizados' => $pedidos_finalizados,'pedidos_no_finalizados' => $pedidos_no_finalizados]);
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
        // Obtener los datos del formulario
        $descripcion = $request->input('descripcion');
        $productos = $request->input('productos');

        // Crear el pedido
        // $pedido = new Pedido();
        // $pedido->descripcion_Pedido = "Por defecto"; // Asignar el ID del estado del pedido apropiado
        // $pedido->fecha_Pedido = \Carbon\Carbon::now(); 
        // $pedido->id_EstadoPedido_FK = 1; 
        // $pedido->noDocumento_Usuario_FK = Auth::user()->noDocumento_Usuario; 
        // $pedido->save();
        DB::insert('insert into pedido 
            (descripcion_Pedido, fecha_Pedido, id_EstadoPedido_FK, noDocumento_Usuario_FK) 
            values (
                \'Por defecto\', now(), 1, \'' . Auth::user()->noDocumento_Usuario . '\')'
        );
        $lastInsertedId = DB::selectOne('SELECT LAST_INSERT_ID() as id')->id;

        // Crear los detalles del pedido
        $aaa = "";
        foreach ($productos as $productoId => $producto) {
            // $detallePedido = new DetallePedido();
            // $detallePedido->cantidad_producto = $producto['cantidad'];
            // $detallePedido->subtotal_DetallePedido = $producto['cantidad'] * $producto['precio'];
            // $detallePedido->id_Producto_FK = $productoId;
            // $detallePedido->id_Venta_FK = $pedido->id_Pedido; // Asignar el ID del pedido recién creado
            // $detallePedido->id_EstadoPedido_FK = 1; // Asignar el ID del estado del pedido apropiado
            // $detallePedido->save();
            // $aaa = $producto['precio'];
            DB::insert(
                'INSERT INTO DetallePedido (
                    cantidad_producto,
                    subtotal_DetallePedido,
                    id_Producto_FK,
                    id_Venta_FK,
                    id_EstadoPedido_FK
                ) VALUES (
                    ' . $producto['cantidad'] . ', '
                    . ($producto['precio'] * $producto['cantidad']) . ', '
                    . $productoId . ', '
                    . $lastInsertedId . ', '
                    . '1)'
            );            
        };

        // return response()->json(['message' => "Pedido registrado con exito"]);
        return redirect()->back();
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
