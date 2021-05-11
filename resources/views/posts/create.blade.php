@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Articulo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="my-input">Titulo *</label>
                            <input id="my-input" class="form-control" type="text" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Imagen</label>
                            <input id="my-input" class="form-control" type="file" name="file">
                        </div>

                        <div class="form-group">
                            <label for="my-input">Contenido</label>
                            <textarea id="my-input" class="form-control" name="body" rows="6"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="my-input">Contenido embebido</label>
                            <textarea id="my-input" class="form-control" name="iframe" required></textarea>
                        </div>

                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Enviar" class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection