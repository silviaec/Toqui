@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">    
       
        <div class="col-md-12">
        @foreach ($Messages as $Message)
        <div class="row">Mensaje: {{ $Message->text }}. Enviado {{ $Message->created_at }}</div>
        @endforeach
            <form method="POST" action="{{ route('message') }}">
                @csrf
                <div class="form-group">
                    <textarea id=""name="text"></textarea>
                </div>
                <div class="form-group">
                <select name="destination" class="js-example-basic-single">
                @foreach ($Users as $User)
                <option value="{{$User->id}}">{{$User->name}}</option>
                @endforeach
                    
                </select>
                </div>
                <input type="hidden" name="hash" id="hash" value="">
                <button type="submit" class="btn btn-primary">Enviar mensaje</button>
            </form>  
        </div>
    </div>
</div>
@endsection