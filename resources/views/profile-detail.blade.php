@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card" style="width: 18rem;">
            <img src="/images/{{ $User->photo }}"/>
            <div class="card-body">
                <h5 class="card-title">{{ $User->name }}</h5>
                <p class="card-text">{{ $User->bio }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Compartes 4 clases</li>
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">Enviar mensaje</a>
            </div>
            </div>
            
        
        </div>    
       
   </div>
</div>

   
@endsection
