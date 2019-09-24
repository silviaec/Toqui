@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

    
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>
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
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Había una vez un post..." name="title">
                    </div>
                    <div class="form-group">
                        <textarea id="summernote"name="text"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>                
                </div>
                <div class="card-footer">
                    
                </div>
            </div>
        </div>
    </div>
</div>

   
@endsection

