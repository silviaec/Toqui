@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">    
        <div class="col-md-12 mx-auto">
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <h5 class="border-bottom border-gray pb-2 mb-0">Mis clases activas</h5>
                @foreach ($Classes as $Klass)
                    @if ($Klass->active)
                        <div class="media text-muted pt-3">
                            <div class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark"><a href="/class/{{ $Klass->id }}"><p class="card-text">{{ $Klass->name }}</p></a></strong>
                                @if ($UserID === $Klass->user_id)
                                    <a href="/my-class/{!! urlencode(e($Klass->name)) !!}/{{ $Klass->id }}">Administrar</a>
                                @else
                                    <a href="#">Salir</a>
                                @endif
                                </div>
                                <!--<span class="d-block">@username</span>-->
                            </div>
                        </div>
                    @endif
                @endforeach
              
            </div>
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <h5 class="border-bottom border-gray pb-2 mb-0">Mis clases cerradas</h5>
                @foreach ($Classes as $Klass)
                    @if (!$Klass->active)
                        <div class="media text-muted pt-3">
                            <div class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark"><a href="/class/{{ $Klass->id }}"><p class="card-text">{{ $Klass->name }}</p></a></strong>
                                @if ($UserID === $Klass->user_id)
                                    <a href="/my-class/{!! urlencode(e($Klass->name)) !!}/{{ $Klass->id }}">Administrar</a>
                                    <a href="class/remove/{{ $Klass->id }}">Borrar definitivamente</a>
                                @endif
                                </div>
                                <!-- <span class="d-block">@username</span> -->
                            </div>
                        </div>
                    @endif
                @endforeach
                <!--
                <small class="d-block text-right mt-3">
                <a href="#">All suggestions</a>
                </small>
                -->
            </div>
        </div>
    </div>
</div>
@endsection

