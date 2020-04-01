@extends('layouts.app')

@section('content')

<div class="container d-flex-justify-content-center">

    <div class="row text-center">
        <h1>{{$sensor->nombre}}</h1>
    </div>
    <hr>
    <div class="row">
        <ul class="row text-center">
            <li><h4>Numero de Serie: {{$sensor->serie}}</h4></li>
           
        </ul>
    </div>
    <br>
            <div class="row">
                <div class="col-md-6">
                {!! $chartTemperatura->container() !!}
                {!! $chartTemperatura->script() !!}
                </div>
                <div class="col-md-6">
                {!! $chartHumedad->container() !!}
                {!! $chartHumedad->script() !!}
                </div>
            </div>
            <hr>
    
    <div class="row text-center">
     <h3>Ubicacion:  {{$sensor->ubicacion}}</h3>
     <br>
        
        <img src="/img/diagrama_Hospital.jpg" alt="">
        <div class="col-sm-2 pull-right">
        <a type="button" class="btn btn-danger" 
                    href="/sensores-baja/{{$sensor->id}}">Dar de Baja</a>
                    <br>
                    <br>
        <a type="button" class="btn btn-warning" 
                    href="/sensores-editar-form/{{$sensor->id}}">Editar Datos</a>
        </div>            
    </div>
</div>


@endsection