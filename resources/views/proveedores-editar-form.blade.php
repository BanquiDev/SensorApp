@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Alta Proveedores</div>
                
                <div class="panel-body">
                

                    <form class="form-horizontal" method="post" action="/proveedores-update/{{$proveedor->id}}">
                    {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $proveedor->nombre }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Descripcion</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $proveedor->descripcion }}" required autofocus>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Direccion de E-Mail </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $proveedor->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="telefono" class="col-md-4 control-label">Telefono de Contacto</label>

                            <div class="col-md-6">
                                <input id="telefono" type="number" class="form-control" name="telefono" value="{{ $proveedor->celular }}" required>

                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <br>
                                <button type="submit" class="btn btn-success">
                                    Editar Proveedor
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