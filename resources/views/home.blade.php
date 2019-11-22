@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    
    <div class="col-md-3">
    
        <div class="card mb-3 p-2 bg-white shadow-sm rounded" style="max-width: 540px;">
            <div id="2" class="row no-gutters">
               
                <div class="col-md-12"><div>
                    <h4 class="contact pt-2">
                        {{ $ThisKlass->name }}
                    </h4>
                    <p class="contact pt-2">Código de clase: <strong> {{ $ThisKlass->code }} </strong></p>
                    <p class="contact pt-2">
                        Profesor: <a href="/profile/{!! Helper::convertToUrl(e($ThisKlass->userName)) !!}/{{ $ThisKlass->userId }}">{{ $ThisKlass->userName }}</a>
                    </p>
                </div>
                </div>
            </div>
        </div>
        
        <div class="card p-1 mb-4 bg-white shadow-sm rounded">
            <div class="card-body">
                <h5 class="card-title">Mis clases</h5>
                @foreach ($Klasses as $Klass) 
                    @if ($Klass->active)
                        <a href="/class/{{ $Klass->id }}"><p class="card-text">{{ $Klass->name }}</p></a>
                    @endif
                @endforeach
                <div class="air"></div>
                <a href="/my-classes"><p class="card-text font-weight-bold">Administrar mis clases</p></a>
            </div>
        </div>
        <div class="p-1 mb-5">
            @foreach ($AllHashtags as $Hashtag)
                <a href="/home/{!! str_replace('#', '', $Hashtag->hashtag) !!}">
                    <span class="badge badge-secondary" style="background-color: {{ $Hashtag->color }}">
                        {{ $Hashtag->hashtag }}</a>
                    </span>
                </a>
            @endforeach
        </div>
    </div>

    
    
    <div class="col-md-6">
    @if(count($Posts) === 0)
        <h5 class="text-center">No hay post para mostrar. <a href="{{ url('/post/create') }}">Comenzá creando uno ;-)</a></h5>
        <img src="{{ url('/imgs/no-data.svg') }}" class="rounded mx-auto d-block" width="400" style='margin: 100px;'>
    @endif
    @if ($IsFiltered)
        <h4>Estás filtrando por: 
            <span class="badge badge-secondary" style="background-color: {{ $Filter->color }};">
                {{ $Filter->hashtag }} 
                <a class="close ml-2" aria-label="Close" href="/home">
                    <span aria-hidden="true"  style="color: white;">&times;</span>
                </a>
            </span>
        </h4>
    @endif
    @foreach ($Posts as $Post)
        <div class="card shadow-sm">     
                @if($Post->user->id == Auth::user()->id)         
                    <a id="options" class="options mr-1" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        ...
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="options">
                        <a href="/post/edit/{{ $Post->id }}" class="dropdown-item">Editar</a>
                        <a class="dropdown-item" href="/post/unpublish/{{ $Post->id }}">Despublicar</a>
                    </div>       
                @endif
               
                <div class="card-body">
                    <div class="row">
                    
                        <div class="col col-md-2">
                            <img src="/images/_{{ $Post->user->photo }}" width="55" height="55" class="rounded-circle mr-2 ml-2"> 
                        </div>
                        <div class="col col-md-10">
                            <h3> <a href="/post/{!! Helper::convertToUrl(e($Post->title)) !!}/{{ $Post->id }} ">{{ $Post->title }} </a></h3>
                            <a href="/profile/{!! Helper::convertToUrl(e($Post->user->name)) !!}/{{ $Post->user->id }}">{{ $Post->user->name }}</a>
                            <p class="small">
                                {{ \Carbon\Carbon::parse($Post->created_at)->isoFormat('MMM DD - HH:mm') }}
                            </p>
                            @foreach ($Post->hashtags as $hashtag)
                                <a href="/home/{!! str_replace('#', '', $hashtag->hashtag) !!}">
                                    <span class="badge badge-secondary" style="background-color: {{ $hashtag->color }}">
                                        {{ $hashtag->hashtag }}</a>
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    
                   
                </div>
                <div class="p-2">
                    <div class="corazon mr-1">
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
            <a href="/class/create" class="">Crear nueva clase</a>
            <div class="air"></div>

            <a href="/class/login" class="">Unirse a una clase</a>

        </div>
        </div>
        <div class="card p-1 mb-4 mt-3 bg-white shadow-sm rounded">
            <div class="card-body">
                <h5 class="card-title">Mis favoritos ({{ $CountFavorites }})</h5>
                @foreach ($Posts as $Post)
                    @if(isset($Loves[$Post->id]))
                        <a href="/class/{{ $Klass->id }}">   
                            <h5 class="card-text mb-3">{{ $Post->title }}</h5>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>    
    

</div>

   
@endsection

