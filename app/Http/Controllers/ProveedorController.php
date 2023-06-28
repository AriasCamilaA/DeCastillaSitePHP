<?php

namespace App\Http\Controllers;

use App\Models\vw_provedorescalificacionavg;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use PDF;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = vw_provedorescalificacionavg::all();
        $tablaproveedores = Proveedor::all();
        return view('ordenes/visualizar',compact('proveedores','tablaproveedores'));
    }

    public function pdf()
    {
        $proveedores = vw_provedorescalificacionavg::all();
        $tablaproveedores = Proveedor::all();

        $pdf = PDF::loadView('ordenes.pdf',['proveedores'=> $proveedores]);
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
        $rules = [
            'empresa_Proveedor' => ['required','max:35','unique:usuario,empresa_Proveedor'], 
            'nombre_Proveedor' => ['required','max:50'],
            'correo_Proveedor' => ['required','unique:usuario,correo_Proveedor'],
            'nit_Proveedor' => ['required','unique:usuario,nit_Proveedor'],
            'celular_Proveedor' => ['required','max:13'],
            'celular_respaldo_Proveedor' => ['required','max:13'],
        ];

        $messages = [
            'nit.required' => 'El NIT es obligatorio.',
            'nit.unique' => 'El NIT ya está en uso.',
        ];
        
        $proveedor = new Proveedor;
        $proveedor->estado_Proveedor=1;
        $proveedor->empresa_Proveedor=$request->input('empresa_Proveedor');
        $proveedor->nombre_Proveedor=$request->input('nombre_Proveedor');
        $proveedor->correo_Proveedor=$request->input('correo_Proveedor');
        $proveedor->nit_Proveedor=$request->input('nit_Proveedor');
        $proveedor->celular_Proveedor=$request->input('celular_Proveedor');
        $proveedor->celular_respaldo_Proveedor=$request->input('celular_respaldo_Proveedor');
        $proveedor->save();
        return redirect()->back();
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
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
        $rules = [
            'empresa_Proveedor' => ['required','max:35','unique:usuario,empresa_Proveedor'], 
            'nombre_Proveedor' => ['required','max:50'],
            'correo_Proveedor' => ['required','unique:usuario,correo_Proveedor'],
            'nit_Proveedor' => ['required','unique:usuario,nit_Proveedor'],
            'celular_Proveedor' => ['required','max:13'],
            'celular_respaldo_Proveedor' => ['required','max:13'],
        ];

        $proveedor = Proveedor::find($id);
        $proveedor->estado_Proveedor=$request->input('estado_Proveedor');
        $proveedor->empresa_Proveedor=$request->input('empresa_Proveedor');
        $proveedor->nombre_Proveedor=$request->input('nombre_Proveedor');
        $proveedor->correo_Proveedor=$request->input('correo_Proveedor');
        $proveedor->nit_Proveedor=$request->input('nit_Proveedor');
        $proveedor->celular_Proveedor=$request->input('celular_Proveedor');
        $proveedor->celular_respaldo_Proveedor=$request->input('celular_respaldo_Proveedor');
        $proveedor->update();
        return redirect()->back();
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->estado=0;
        $proveedor->update();
        return redirect()->back();
        //
    }
}
