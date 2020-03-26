@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Sensores Activos</h1>
    <br>
    <br>
    @foreach($sensores as $sensor)
    
        <div class="row">
            <div class="col-md-4 text-center">
                <h3><a href="#">{{$sensor->nombre}}</a></h3>
               <span>{{$sensor->location}}</span>
            </div>
            <div class="col-md-5 pull-right">
                {!! $chartTemperatura->container() !!}
                {!! $chartTemperatura->script() !!}
            </div>
        </div>
    
   
    @endforeach

    
</div>


@endsection