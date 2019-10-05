@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('post.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titular</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Había una vez un título..." name="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <textarea id="summernote"name="text">{{ old('text') }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <input type="hidden" name="hash" id="hash" value="@if (old('hash')) {{old('hash')}} @else {{$hash}} @endif">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>  
                </div>
            </div>
        </div>
    </div>
</div>

   
@endsection

