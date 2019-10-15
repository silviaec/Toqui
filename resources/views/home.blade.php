@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    <div class="col-md-3">
     <div class="card">
        
        <div class="card-body">
            <h5 class="card-title">Mis clases</h5>
            @foreach ($Klasses as $Klass) 
                <a href="/class/{{ $Klass->id }}"><p class="card-text">{{ $Klass->name }}</p></a>
            @endforeach
        </div>
        </div>
    </div>
    
    <div class="col-md-6">
    @if(count($Posts) === 0)
        <h5 class="text-center">No hay post para mostrar. <a href="{{ url('/post/create') }}">Comenzá creando uno ;-)</a></h5>
    @endif
    @foreach ($Posts as $Post)
        <div class="card">
                <div class="card-body">
                    <h3> <a href="/post/{!! urlencode(e($Post->title)) !!}/{{ $Post->id }}">{{ $Post->title }} </a></h3>
                    @foreach ($Post->hashtags as $hashtag)
                        <a href="?filter={{ $hashtag->hashtag }}">{{ $hashtag->hashtag }}</a>
                    @endforeach
                </div>
                <div class="card-footer">
                    Autor: <a href="/user/{!! urlencode(e($Post->user->name)) !!}/{{ $Post->user->id }}">{{ $Post->user->name }}</a>
                    <div class="corazon">
                        @if(isset($Loves[$Post->id]))
                            <img src="imgs/como.png" id="{{ $Post->id }}" class="love" data-toggle="tooltip" data-placement="top" title="Desfavoritear">  
                        @else
                            <img src="imgs/como_empty.png" id="{{ $Post->id }}" class="love" data-toggle="tooltip" data-placement="top" title="Favoritear">  
                        @endif
                    </div>
            </div>
        </div>
        <div class="air"></div>
    @endforeach
    </div>
    <div class="col-md-3">
     <div class="card">
        
        <div class="card-body">
            <a href="/class/create" class="btn btn-primary">Crear nueva clase</a>
            <a href="/class/login" class="btn btn-primary">Unirse a una clase</a>

        </div>
        </div>
    </div>    

</div>

   
@endsection

