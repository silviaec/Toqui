@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">    
        <div class="col-md-6 mx-auto">
            <form method="POST" action="{{ route('class.create') }}">
                @csrf
                @if(session()->has('code'))
                    <div class="alert alert-success">
                        <h4>Clase creada con éxito</h4> Comparte el siguiente código con quienes quieras para que participen de tu clase:
                        <h3 class="text-center">{{ session()->get('code') }}</h3>
                    </div>
                @else
                <div class="form-group col-md-6 mx-auto">
                    <label for="name" class="mx-auto">Nombre de la clase</label>
                    <input type='text' class="form-control" name="name" id="name" required="required"/>
                </div>
                <div class="form-group col-md-6 mx-auto">
                    <button id="submit" class="btn btn-primary mb-2  mx-auto">Crear una nueva clase</button>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection

