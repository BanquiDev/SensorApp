@extends('layouts.app')

@section('content')
<div class="container flex">
    <div class="d-flex justify-content-center">
        <h1 class="col-md-10">{{$hospital->name}}</h1>
    
        <div id="app" class="col-md-6">
            
                {!! $chartTemperatura->container() !!}
                {!! $chartTemperatura->script() !!}

        </div>
        <div id="app" class="col-md-4">
            <br>
            <br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Molestias vitae culpa perspiciatis ab, eligendi enim nemo blanditiis expedita maxime nobis 
            explicabo? Alias qui ab eius quas, animi enim fuga praesentium?</p>

        </div>
    </div>
</div>



@endsection