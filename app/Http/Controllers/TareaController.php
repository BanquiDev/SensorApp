<?php

namespace App\Http\Controllers;

use App\Tarea;
use Illuminate\Http\Request;
use App\Proveedores;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $proveedor = Proveedores::find($id);
        return view ('tareas-form', compact('proveedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $prov)
    {   
       $proveedor = Proveedores::where('id', '=', $prov)->get();
       //dd($proveedor);
       $tarea = new Tarea;
       $tarea->titulo = $request->titulo;
       $tarea->descripcion = $request->descripcion;
       $tarea->tecnico = $request->tecnico;
       $tarea->proveedor_id = $proveedor[0]->id;
       $tarea->save();
        //dd($proveedor[0]->tarea);
       $tareas = Tarea::where('proveedor_id', $proveedor[0]->id)->get();
        //dd($tareas);
        return view('proveedor-panel', compact('proveedor', 'tareas' ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        //
    }
}
