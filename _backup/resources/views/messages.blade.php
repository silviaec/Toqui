@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">    
        <div class="col-md-3 messages-container">
            <input type="text" id='search-criteria' placeholder="Buscar contacto..." name="title" value="" class="form-control" autocomplete='false'>
            <input type="hidden" value="/images/_{{ Auth::user()->photo }}" id="photo-{{ Auth::user()->id }}">
            @foreach ($Chats as $Chat)
                <div class="contact-list p-2 bg-white" style="max-width: 540px;" id="contact-{{ $Chat['user']->id }}" data-index="{{ $Chat['order'] }}">
                    <div class="row no-gutters contact-inbox" id="{{ $Chat['user']->id }}">
                        <div class="col-lg-2">
                            <input type="hidden" value="/images/{{ $Chat['user']->photo }}" id="photo-{{ $Chat['user']->id }}">
                            <img src="/images/{{ $Chat['user']->photo }}" class="rounded" width="55">
                        </div>
                        <div class="col-md-9 ml-2 mt-2">
                        <div class="">
                            <h5 class="contact">{{ $Chat['user']->name }}</h5>
                            <p class="contact">
                                <small class="text-muted" id="news-{{ $Chat['user']->id }}">
                                    @if ($Chat['chat'])
                                        {{ $Chat['chat']->created_at->diffForHumans() }}
                                    @endif
                                </small>
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-9 pl-0">
            <div class="card without-border-left">
                <div class="card-body inbox-content">
                    <div id="inbox" class="inbox">
                        <img src="{{ url('/imgs/chats.svg') }}" class="rounded mx-auto d-block" width="400" style='margin: 100px;'>
                    </div>
                </div>
            </div>
            <div class="card-footer write-a-message" style="display: none;"> 
                <div class="form-group">
                    <input value="" id="user_id_to" type="hidden">
                    <textarea class="form-control" id="message" class="comment" rows="3" placeholder="Escribir un mensaje..."></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary send-message">Enviar mensaje</button>
                </div>
            </div>

            <div class="container" id="comments">
            
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

