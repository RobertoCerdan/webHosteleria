@extends('layouts.app')

@section('content')

<div class="container shadow min-vh-100 py-2">
  <div class="row justify-content-end">
    @if(Auth::guest())
    @else
      @if(Auth::user()->rol == 'Admin')
        
          <div class="mb-1 mt-1" style="width: 3em;">
            <a href="{{route('producto.edit', $producto->id)}}">
              <img class="img-fluid" src="{{ asset('iconos/editar.png') }}">
            </a>
          </div>     
          
          <div class="mb-1 mt-1" style="width: 3em;">
            <a href="{{route('producto.destroy', $producto->id)}}">
              <img class="img-fluid" src="{{ asset('iconos/borrar.png') }}">
            </a>
          </div>    
      @endif
    @endif
      <div class="mb-1 mt-1" style="width: 3em;">
        <a href="{{route('producto.index')}}">
          <img class="img-fluid" src="{{ asset('iconos/volver.png') }}">
        </a>
      </div>  
  </div>
    <div class="row justify-content-center">
        <h1 class="text-center mb-5">{{ $producto->titulo }}</h1>
        <div class="col-lg-6 mb-3">
            <img class="img-fluid img-thumbnail" src="https://picsum.photos/750/500">
        </div>
        <form  class="col-lg-5" action="{{ route('producto.update', $producto->id)}}" method="POST" enctype="multipart/form-data">
        @csrf    
        <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="{{ $producto->nombre }}" value="{{ $producto->nombre }}">
            </div>
            <div class="mb-3">
              <label for="precio" class="form-label">Precio</label>
              <input type="number" class="form-control" id="precio" name="precio" min="0" placeholder="{{ $producto->precio }}" value="{{ $producto->precio }}">
            </div>
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripci&oacute;n</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="{{ $producto->descripcion }}" >{{ $producto->descripcion }}</textarea>
            </div>
            <div class="mb-3">
              <label for="imagen" class="form-label">Imagen</label>
              <input class="form-control" type="file" id="imagen" name="imagen">
            </div>
            <div class="row justify-content-center">
                <button class="btn btn-primary col-6" type="submit">Editar</button>
            </div>
        </form>
        
    </div>
</div>

@endsection
