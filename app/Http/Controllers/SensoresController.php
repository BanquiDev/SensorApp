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
        //Sensores x Usuario
        $sensores = Auth::user()->sensores;
        $datosTemperaturayHumedad= [];
        $datosHumedad = [];
        $datosTemperatura = [];
        foreach ($sensores as $sensor) {
            array_push($datosTemperatura, $sensor->datos->pluck('temperatura')); 
            array_push($datosHumedad, $sensor->datos->pluck('humedad'));
        };
        //dd($datosTemperatura);
        
        //Graficos
        //temperatura
        $graficos_temperatura_array = [];
        
        foreach($datosTemperatura as $datosTemperaturaxSensor){
            
        $chartTemperatura = new DatosSensores;
        //dd($datosTemperaturaxSensor);
        $chartTemperatura->labels($datosTemperaturaxSensor->keys());
        $chartTemperatura->dataset('Temperatura', 'line', $datosTemperaturaxSensor->values())
                         ->backgroundColor('rgba(255, 128, 0, 1)');
                        //dd($chartTemperatura);
          array_push($graficos_temperatura_array, $chartTemperatura);              
        }
        //dd($graficos_temperatura_array);
        // //humedad
        $graficos_humedad_array = [];
        foreach($datosHumedad as $datosHumedadxSensor){
        
         $chartHumedad = new DatosSensores;
       
        $chartHumedad->labels($datosHumedadxSensor->keys());
        $chartHumedad->dataset('Humedad', 'bar', $datosHumedadxSensor->values())
                        ->backgroundColor('rgba(0, 0, 255, 1)');
                        //dd($chartHumedad);
          array_push($graficos_humedad_array, $chartHumedad);              
        }
        
        
        return view('/sensores-listado', 
                    compact('sensores', 'graficos_humedad_array', 
                    'graficos_temperatura_array', 'chartTemperatura', 'chartHumedad'));
    }
    // $temperatura = DB::table('datos')->where('sensor_id', '4')->pluck('temperatura');
                                                                            
        // $humedad = DB::table('datos')->where('sensor_id', '4')
        //                              ->pluck('humedad');
        
        //dd($temperatura);
        
        // $chartTemperatura = new DatosSensores;
       
        // $chartTemperatura->labels($temperatura->keys());
        // $chartTemperatura->dataset('Humedad', 'bar', $humedad->values())
        //                 ->backgroundColor('rgba(0, 0, 255, 1)');
        // $chartTemperatura->dataset('Temperatura', 'line', $temperatura->values())
        //                  ->backgroundColor('rgba(255, 128, 0, 0.8)');

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = Auth::user();
        
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
    public function show($id)
    {
        $sensor = Sensores::findOrFail($id);
        $datosTemperatura = $sensor->datos->pluck('temperatura');
        $datosHumedad = $sensor->datos->pluck('humedad');
        //graficos
        //Temperatura
        $chartTemperatura = new DatosSensores;
       
        $chartTemperatura->labels($datosTemperatura->keys());
        $chartTemperatura->dataset('Temperatura', 'line', $datosTemperatura->values())
                        ->backgroundColor('rgba(255, 128, 0, 1)');
        //humedad
        $chartHumedad = new DatosSensores;
       
        $chartHumedad->labels($datosHumedad->keys());
        $chartHumedad->dataset('Humedad', 'bar', $datosHumedad->values())
                                        ->backgroundColor('rgba(0, 0, 255, 1)');
        
        return view('sensor', compact('sensor', 'chartHumedad', 'chartTemperatura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sensores  $sensores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { $sensor = Sensores::findOrFail($id);
        //dd($sensor);
        return view ('sensores-editar-form', compact('sensor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sensores  $sensores
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {   
        $user = Auth::user();
        $sensor = Sensores::findOrFail($id);
        $sensor->hospital_id = $user->id;
        $sensor->nombre = $request->name;
        $sensor->ubicacion = $request->location;
        $sensor->serie = $request->serie;
        $sensor->update();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sensores  $sensores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   $sensores = Sensores::findOrFail($id);
        $sensores->delete();

        return redirect()->route('home');
    }
}
