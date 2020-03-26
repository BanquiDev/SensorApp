@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado Proveedores</h1>

    @foreach($proveedores as $proveedor)
        <ul>
            <li>{{$proveedor->nombre}}</li>
        </ul>
    @endforeach
</div>
@endsection