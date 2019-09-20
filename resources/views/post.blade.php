@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
        <div class="card">
            <img src="https://www.jumpstarttech.com/files/2018/08/Network-Profile.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $Post->user->name }}</h5>
                <p class="card-text">{{ $Post->user->email }}</p>
                <a href="#" class="btn btn-primary">Enviar mensaje</a>
            </div>
            </div>
        </div>    
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $Post->title }}</h3>
                </div>
                <div class="card-body">
                {!! $Post->text !!}        
                </div>
                <div class="card-footer">   
                </div>
            </div>
        </div>
    </div>
</div>

   
@endsection

