<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use App\Notifications\Bienvenido;
use App\Proveedores;
use App\User;
use App\Tarea;
use Auth;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    //$this->middleware('auth:proveedor');
    }



    public function index()
    {   $user = Auth::user();

        $proveedores = $user->proveedores;
        
        return view ('proveedores-listado', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $password = $request->password;
        // $hash = hash('sha256', $password);
        $user = Auth::user();
        $proveedor = new Proveedores();

        $proveedor->nombre = $request->name;
        $proveedor->hospital_id = $user->id;
        $proveedor->descripcion = $request->description;
        //$proveedor->password = $hash;
        $proveedor->email = $request->email;
        $proveedor->celular = $request->telefono;
        $proveedor->save();
        $user->notify(new Bienvenido);

        return redirect()->route('home')->with(array(
            'message' => 'Te has registrado como proovedor!'
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedores::findOrFail($id);

        return view ('/proveedor', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        //dd($user);
        $proveedor = Proveedores::findOrFail($id);
        //dd($proveedor);
        if ($proveedor->hospital_id == $user->id) {
            
            return view('proveedores-editar-form', compact('proveedor'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $user = Auth::user();
        $proveedor = Proveedores::findOrFail($id);
        $proveedor->hospital_id = $user->id;
        $proveedor->nombre = $request->name;
        $proveedor->descripcion = $request->description;
        $proveedor->email = $request->email;
        $proveedor->celular = $request->telefono;
        $proveedor->update();

        return redirect()->route('proveedores-listado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedores::find($id);
        $proveedor->delete();
        //dd($proveedor);
        return redirect('home');
    }

    public function login(){
        
        return view ('proveedores-login');
    }

    public function checked(Request $request){
            //dd($request);
            $email = $request->email;
            $proveedor = Proveedores::where('email', $email)->get();
            $tareas = Tarea::where('proveedor_id', $proveedor[0]->id)->get();
           //dd($proveedor);
            return view('proveedor-panel', compact('proveedor', 'tareas'));
    
    }
}
