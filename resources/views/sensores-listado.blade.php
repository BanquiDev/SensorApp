@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="text-center">Sensores Activos</h1>
    <br>
    <br>
    
    
        <div class="row">
            
            <div class="col-md-5">
                @foreach($sensores as $sensor)
                <ul>
                    <li> <h3><a href="/sensor/{{$sensor->id}}">{{$sensor->nombre}}</a></h3></li>
                    <li> <span>Ubicacion: {{$sensor->ubicacion}}</span></li>
                    <br>
                    <li> <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam iure voluptas, 
                    beatae, quisquam reiciendis reprehenderit ab necessitatibus tempore, 
                    eligendi qui sunt. Magni perferendis ipsa tempora sequi numquam dolorem quisquam quas!</p></li>
                </ul>
                <br>
                <hr>
                @endforeach
            </div>    
             
            <div class="col-md-5">
                @foreach($graficos_temperatura_array as $graficos_temperatura)
                <div>
                    {!! $chartTemperatura->container() !!}
                    {!! $chartTemperatura->script() !!}
                </div>
                @endforeach
            </div>
        </div>
            <div class="col-md-10">
                @foreach($graficos_humedad_array as $graficos_humedad)
                <div class="col">
                    {!! $chartHumedad->container() !!}
                    {!! $chartHumedad->script() !!}
                </div>
                @endforeach
            </div>
        
</div>


@endsection