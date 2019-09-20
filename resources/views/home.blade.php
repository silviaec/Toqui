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
    @foreach ($Posts as $Post)
        {{ $Post->user_post_love }}
        <div class="card">
            <div class="card-header"><a href="./post/{!! urlencode(e($Post->title)) !!}/{{ $Post->id }}">{{ $Post->title }}</a></div>
                <div class="card-body">
                    {{ $Post->short_text }}
                </div>
                <div class="card-footer">
                    Autor: <a href="/user/{!! urlencode(e($Post->user->name)) !!}/{{ $Post->user->id }}">{{ $Post->user->name }}</a>
                    <div class="corazon">
                        <img src="imgs/como.png" id="{{ $Post->id }}" class="love" witdh=""> 
                        <span id="love-{{ $Post->id }}">{{ $Post->love }}</span>    
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

