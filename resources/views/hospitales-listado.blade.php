@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Listado Hospitales</h1>
    
    @foreach($users as $user)
    <ul>
        <li><a href="/hospital/{{$user->id}}">{{$user->name}}</a></li>
    </ul>
   
    @endforeach

    
</div>
@endsection