@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    <div class="col-md-3">
     <div class="card">
        
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
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
                    <h3>{{ $Post->title }}</h3>
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
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>
    </div>    

</div>

   
@endsection

