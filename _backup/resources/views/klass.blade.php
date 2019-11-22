@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">    
        <div class="col-md-12 mx-auto">            
        <h5 class="border-bottom border-gray pb-2 mb-0">{{ $Klass->name }}</h5>
        @if ($Klass->active)
            <a href="/class/desactive/{{ $Klass->id }}">Desactivar clase</a>
            <p class="small">Si desactivas la clase, luedo se puede activar nuevamente. Los participantes no podrán ingresar ni ver los contenidos.</p>
        @else
            <a href="/class/active/{{ $Klass->id }}">Activar clase</a>
            <p class="small">Los participantes que sigan inscriptos, podran volver a ver el contenido.</p>
        @endif
        </div>
        <div class="col-md-12 mx-auto">            
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <h5 class="border-bottom border-gray pb-2 mb-0">Participantes</h5>
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Klass->users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td><a href="/my-class/remove-user/{{ $user->id }}/{{ $Klass->id }}">Expulsar</a></td>
                    </tr>                    
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

