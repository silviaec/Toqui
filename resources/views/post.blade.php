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
                
                @if ($Post->images)
                    <img src="{{ url('images/'.$Post->images) }}" width="100%">
                @endif
                </div>
                <div class="card-footer"> 
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Agregar comentario</label>
                        <textarea class="form-control" id="comment" class="comment" rows="3"></textarea>
                        <input type="hidden" id="postid" value="{{ $Post->id }}">
                    </div>
                    <div class="form-group">
                        <button id="submit" class="btn btn-primary mb-2 submit_comment">Comentar</button>
                    </div>
                </div>

                <div class="container" id="comments">
                @foreach ($Comments as $Comment)
                    <div class="card-body">
                        <h5 class="card-title">{{ $Comment->userAuthorName }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $Comment->created_at }}</h6>
                        <p class="card-text">{{ $Comment->text }}</p>
                        <a href="#" class="card-link resp" id="{{ $Comment->id }}">Responder</a>
                        @if ($Comment->userAuthorId === Auth::user()->id)
                            <a href="#" class="card-link del" id="{{ $Comment->id }}">Eliminnar</a>
                        @endif
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

   
@endsection

