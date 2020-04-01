@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h1 class="text-center">{{$proveedor[0]->nombre}}</h1>
        <hr>
        <br>
        <div class="col-md-5">
            <ul>
                <li>{{$proveedor[0]->hospital->name}}</li>
                <br>
                                
            </ul>
        </div>
        <div class="col-md-5 pull-right">
        <div class="row">
                
                    <a type="button" class="btn btn-warning pull-right margin-right" 
                    href="/tareas-create/{{$proveedor[0]->id}}">Agregar Tarea</a>
                
            </div>
            <br>
            <!-- <div class="row">
                
                    <a type="button" class="btn btn-danger pull-right" 
                    href="/proveedores-baja/{{$proveedor}}">Dar de Baja</a>
                
            </div> -->
        </div>
        <br>
    </div>
    <hr>
    <table class="table table-stripped table-hoover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ticket</th>
                <th scope="col">Tarea Realizada</th>
                <th scope="col">Tecnico</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $tareas as $tarea )
            <tr>
                
                <th scope="row">{{$tarea->id}}</th>
                <td>{{$tarea->titulo}}</td>
                <td><a href="#">{{$tarea->descripcion}}</a></td>
                <td>{{$tarea->tecnico}}</td>
                
            </tr>
            @endforeach
            
        </tbody>
    </table>
    
</div>


@endsection

