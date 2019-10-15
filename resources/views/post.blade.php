@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">    
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body" style="font-family: 'Georgia, Cambria, Times New Roman, Times, serif'; font-size: 18px;">
                <h2>{{ $Post->title }}</h2>
                <p>{{ $Post->created_at }}</p>

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

