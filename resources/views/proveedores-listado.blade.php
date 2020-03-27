@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado Proveedores</h1>

    @foreach($proveedores as $proveedor)
        <ul>
            <li><a href="/proveedor/{{$proveedor->id}}">{{$proveedor->nombre}}</a></li>
        </ul>
    @endforeach
</div>
@endsection