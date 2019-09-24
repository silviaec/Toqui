@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h3>{{ $User->name }}</h3>   
        
            <div class="image-upload">
                <label for="file-input">
                    <img src="https://www.jumpstarttech.com/files/2018/08/Network-Profile.png" style="cursor: pointer; width: 200px"/>
                </label>
                <input id="file-input" type="file"  style="display: none;"/>
            </div>   
        </div>    
        <div class="col-md-9">
            <h5>Cambiar contraseña</h5>
            <div class="form-group">
            <label for="old-password">Contraseña actual</label>
                <input type="password" class="form-control" id="old-password">
                <div class="invalid-feedback passwordincorrect">
                    Contraseña incorrecta.
                </div>
                <div class="alert alert-success passwordcorrect" role="alert" style="display: none;">
                    ¡Contraseña cambiada con éxito!.
                </div>
            </div>
            <div class="form-group">
                <label for="nnew-password">Contraseña nueva</label>
                <input type="password" class="form-control">
                <div class="invalid-feedback passwordshort">
                    La nueva contraseña debe tener al menos 6 caracteres.
                </div>
                
            </div>
            <div class="form-group">
                <label for="renew-password">Repetir contraseña nueva</label>
                <input type="password" class="form-control" id="renew-password">
                <div class="invalid-feedback passwordnotequals">
                    Las contraseñas no coinciden.
                </div>
            </div>
            <div class="form-group">
				<button type="button" class="btn btn-primary" id="passwordChannge">Guardar</button>
			</div>
      </div>
   </div>
</div>

   
@endsection
