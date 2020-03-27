@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h1 class="text-center">{{$proveedor->nombre}}</h1>
        <hr>
        <br>
        <div class="col-md-5">
            <ul>
                <li>{{$proveedor->descripcion}}</li>
                <br>
                <li><a href="">{{$proveedor->email}}</a></li>
                <br>
                <li><a href="">{{$proveedor->celular}}</a></li>
                
            </ul>
        </div>
        <div class="col-md-5 pull-right">
        <div class="row">
                
                    <a type="button" class="btn btn-warning pull-right margin-right" 
                    href="/proveedores-editar-form/{{$proveedor->id}}">Editar Datos</a>
                
            </div>
            <br>
            <div class="row">
                
                    <a type="button" class="btn btn-danger pull-right" 
                    href="/proveedores-baja/{{$proveedor->id}}">Dar de Baja</a>
                
            </div>
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
            <tr>
                <th scope="row">1</th>
                <td>Ticket 1</td>
                <td><a href="#">Reemplazo de motor</a></td>
                <td>Ernesto Lopez</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Ticket 2</td>
                <td><a href="#">Service Mensual</a></td>
                <td>Carlos Vicente</td>
            </tr>
        </tbody>
    </table>

</div>

@endsection