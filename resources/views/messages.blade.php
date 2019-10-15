@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">    
        <div class="col-md-3 messages-container">
            @foreach ($Classmates as $Classmate)
                <div class="mb-3 contact-list" style="max-width: 540px;" id="contact-{{ $Classmate->id }}">
                <div class="row no-gutters contact-inbox" id="{{ $Classmate->id }}">
                    <div class="col-md-2">
                    <img src="http://127.0.0.1:8000/images/157028834168a70a0cb3b7a476355cb2e705b41644.jpg" class="card-img" alt="..." width="100">
                    </div>
                    <div class="col-md-10">
                    <div class="">
                        <h5 class="contact">{{ $Classmate->name }}</h5>
                        <p class="contact"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body inbox-content">
                    <div id="inbox" class="inbox"></div>
                </div>
            </div>
            <div class="card-footer"> 
                <div class="form-group">
                    <input value="" id="user_id_to" type="hidden">
                    <textarea class="form-control" id="message" class="comment" rows="3" placeholder="Escribir un mensaje..."></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary add-message">Enviar mensaje</button>
                </div>
            </div>

            <div class="container" id="comments">
            
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

