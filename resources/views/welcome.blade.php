@extends('layouts.app')


@section('content')
    <div class="container">
    <br>
    <br>
        <div class="row">
            <div class="col-lg">
                <h1 class="text-center">Bienvenidos a la AppSensoresHospitales</h1>
            <br>
                <div class="row d-flex justify-content-center">
               <p class="col-lg-6 text-center"> <a href="hospitales-listado" >Listado de Hospitales</a></p>
                <p class="col-lg-6 text-center"><a href="proveedores-listado">Listado de Proveedores</a></p>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">    
            <div class="col-lg">
                    <h2 class="text-center">Sos Proovedor de Servicio??</h2>
                    <br> 
                    <p class="text-center"><a  href="{{route('proveedores-form')}}">Registrate Como Proovedor</a></p>
            </div>
        </div>
    </div>

@endsection