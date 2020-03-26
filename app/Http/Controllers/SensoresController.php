<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Charts\DatosSensores;
use App\User;
use App\Sensores;
use App\Datos;
use Auth;

class SensoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //Usuario Logeado
        $user = Auth::user();
        $sensorestodos = Sensores::all();
        $datos = Datos::all();
        $datos2 = Datos::where('sensor_id', 2);
        
        //dd($datos2);

        //Sensores x Usuario
        $sensores = Sensores::where('hospital_id', '=', $user->id)->get();

        $sensores_id = Sensores::where('hospital_id', '=', $user)->pluck('id');
        //dd($sensores_id);
        
        //Graficos
        $temperatura = DB::table('datos')->where('sensor_id', $sensores_id)
                                         ->pluck('temperatura');
        $humedad = DB::table('datos')->where('sensor_id', $sensores_id)
                                     ->pluck('humedad');
        
        dd($temperatura);
        
        $chartTemperatura = new DatosSensores;
       
        $chartTemperatura->labels($temperatura->keys());
        $chartTemperatura->dataset('Humedad', 'bar', $humedad->values())
                        ->backgroundColor('rgba(0, 0, 255, 1)');
        $chartTemperatura->dataset('Temperatura', 'line', $temperatura->values())
                         ->backgroundColor('rgba(255, 128, 0, 0.8)');

        return view('/sensores-listado', compact('sensores', 'chartTemperatura'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = Auth::user();
        //dd($user);
        return view ('/sensores-form', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validateData = $this->validate($request, [
            'name' => 'required|min:5',
            'location' => 'required',
            'serie' => 'required|min:5',
          ]);

        $sensor = new Sensores;  
        $sensor->hospital_id = $user->id;
        $sensor->nombre = $request->name;
        $sensor->ubicacion = $request->location;
        $sensor->serie = $request->serie;
        $sensor->save();
        
        return view('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sensores  $sensores
     * @return \Illuminate\Http\Response
     */
    public function show(Sensores $sensores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sensores  $sensores
     * @return \Illuminate\Http\Response
     */
    public function edit(Sensores $sensores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sensores  $sensores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sensores $sensores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sensores  $sensores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sensores $sensores)
    {
        //
    }
}
