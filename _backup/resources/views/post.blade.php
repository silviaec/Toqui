@extends('layouts.app')

@section('content')
<div style="width: 100%; background-color: white; margin-top: -24px;">
    <div class="container">
        <div class="row">        
            <div class="col-md-8" style="margin-right: auto; margin-left: auto;">
                <div class="">
                    <div class="card-body">
                        <h1 mt-5>{{ $Post->title }}</h1>
                        <p>{{ $Post->created_at }}</p>
                        <div class="card mb-3 p-2 shadow-sm">
                            <div class="card-footer p-2">
                                <div class='row'>
                                    <div class="col-md-1 mt-2">
                                        <img src="/images/_{{ $ThisKlass->photo }}" width="40" height="40" class="rounded-circle mr-2 ml-2"> 
                                    </div>
                                    <div class="col-md-8 mt-1">
                                        <a href="/profile/{!! Helper::convertToUrl(e($ThisKlass->userName)) !!}/{{ $ThisKlass->userId }}">{{ $ThisKlass->userName }}</a> 
                                        <h5>{{ $ThisKlass->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span style="font-family: Georgia,Times,Times New Roman,serif; font-size: 18px; text-rendering: optimizeLegibility; -webkit-font-smoothing: antialiased;">
                        {!! $Post->text !!}  
                        </span>
                        @if ($Post->images)
                            <img src="{{ url('images/'.$Post->images) }}" width="100%">
                        @endif
                    </div>
                </div>
                <div class="air"></div>

                    <div class="card"> 
                        <div class="card-body">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Agregar comentario</label>
                            <textarea class="form-control" id="comment" class="comment" rows="3"></textarea>
                            <input type="hidden" id="postid" value="{{ $Post->id }}">
                        </div>
                        <div class="form-group">
                            <button id="submit" class="btn btn-primary mb-2 submit_comment">Comentar</button>
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
    </div>
</div>

   
@endsection

