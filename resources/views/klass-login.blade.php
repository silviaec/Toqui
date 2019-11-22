@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">    
        <div class="col-md-6 mx-auto">
            <form method="POST" action="{{ route('class.join') }}">
                @csrf
                @if(session()->has('KlassName'))
                    <div class="alert alert-success">
                        <h4>Te unista éxito a la clase {{ session()->get('KlassName') }}.</h4> 
                    </div>
                @else
                <div class="form-group col-md-6 mx-auto">
                    <label for="name" class="mx-auto">Código de la clase</label>
                    <input type='text' class="form-control" name="code" id="code" required="required"/>
                </div>
                <div class="form-group col-md-6 mx-auto">
                    <button id="submit" class="btn btn-primary mb-2  mx-auto">Unirse a la clase</button>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection

