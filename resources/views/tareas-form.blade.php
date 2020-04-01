@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Ingresar Tarea .{{$proveedor->nombre}}</div>
                <hr>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="/tareas-store/{{$proveedor->id}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                            <label for="titulo" class="col-md-4 control-label">Titulo</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required autofocus>

                                @if ($errors->has('titulo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label">Descripcion</label>

                            <div class="col-md-6">
                                <textarea cols="10" rows="5" id="descripcion" type="text" class="form-control" 
                                name="descripcion" value="{{ old('descripcion') }}" required autofocus></textarea>

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tecnico') ? ' has-error' : '' }}">
                            <label for="tecnico" class="col-md-4 control-label">Tecnico</label>

                            <div class="col-md-6">
                                <input id="tecnico" type="text" class="form-control" name="tecnico" value="{{ old('tecnico') }}" required autofocus>

                                @if ($errors->has('tecnico'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tecnico') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                
                                <button type="submit" class="btn btn-success">
                              <!--  <input type="hidden" value="{{$proveedor}}">-->
                                    Ingresar Tarea
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection