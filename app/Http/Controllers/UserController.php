<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Sensores;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Charts\DatosSensores;
use App\Http\Controllers\Controller;
use App\Datos;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = DB::table('users')->get();
        //var_dump($users);
      
        return view ('hospitales-listado', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $hospital = User::find($id);
        //dd($hospital);
        $temperatura = DB::table('datos')->pluck('temperatura');
        $humedad = DB::table('datos')->pluck('humedad');
        //dd($temperatura, $humedad);
        
        $chartTemperatura = new DatosSensores;
       
        $chartTemperatura->labels($temperatura->keys());
        $chartTemperatura->dataset('Humedad', 'bar', $humedad->values())
                        ->backgroundColor('rgba(0, 0, 255, 1)');
        $chartTemperatura->dataset('Temperatura', 'line', $temperatura->values())
                         ->backgroundColor('rgba(255, 128, 0, 0.8)');
        //$chartHumedad = new DatosSensores;
        //$chartHumedad->labels($humedad->keys());
        
        return view ('/hospital', compact('hospital', 'chartTemperatura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
