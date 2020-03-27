@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="text-center">Sensores Activos</h1>
    <br>
    <br>
    @foreach($sensores as $sensor)
    
        <div class="row">
            <div class="col-md-7">
            <ul>
               <li> <h3><a href="#">{{$sensor->nombre}}</a></h3></li>
              <li> <span>Ubicacion: {{$sensor->ubicacion}}</span></li>
              <br>
              <li> <p class="col-md-9">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam iure voluptas, 
               beatae, quisquam reiciendis reprehenderit ab necessitatibus tempore, 
               eligendi qui sunt. Magni perferendis ipsa tempora sequi numquam dolorem quisquam quas!</p></li>
            </div>
            </ul>
            <div class="col-md-5 pull-right">
                {!! $chartTemperatura->container() !!}
                {!! $chartTemperatura->script() !!}
            </div>

        </div>
    
   
    @endforeach

    
</div>


@endsection