@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>Panel de Control</h3></div>

                    <div class="panel-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                                You are logged in!
                            
                            <div class="panel-body text-center">
                                <div class="col-lg">
                                    <h1 class="text-center">Bienvenidos a la AppSensoresHospitales</h1>
                                    <br>
                                    <div class="row d-flex justify-content-center">
                                        <p class="col-lg-6 text-center"> <a href="sensores-listado" >Listado de Sensores</a></p>
                                        <p class="col-lg-6 text-center"><a href="proveedores-listado">Listado de Proveedores</a></p>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">    
                                <div class="col-lg">
                                        <h2 class="text-center">Ingresa los Sensores de Monitoreo</h2>
                                        <p class="text-center">Ingresa los Sensores de Monitoreo en el Sistema, y podras ver en Tiempo Real los datos
                                        de monitoreo que van recolectando.
                                        Para Registrarlos, hace click en el link a continuacion</p>
                                        <h4 class="text-center"><a  href="{{route('sensores-form')}}">Ingresar Sensores</a></h4>
                                </div>
                            </div>
                            <div class="row">    
                                <div class="col-lg">
                                        <h2 class="text-center">Registra a tus Proveedores de Servicio</h2>
                                        <p class="text-center"> Registra a tus proveedores de mantenimiento de Heladeras, Electricidad, y todos aquellos
                                        que esten relacionados con el soporte de los equipos de enfriamiento que van a ser monitoreados.
                                        Para Registrarlos, hace click en el link a continuacion</p>
                                        <h4 class="text-center"><a  href="{{route('proveedores-form')}}">Registrar Proveedores</a></h4>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
