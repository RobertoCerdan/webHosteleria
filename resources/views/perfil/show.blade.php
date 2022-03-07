@extends('layouts.master')

@section('contenedor')

<div class="container shadow min-vh-100 py-2">
  <div class="row justify-content-end pt-4"> 
      <div class="mb-1 mt-1" style="width: 3em;">
        <a href="{{route('perfil.edit', $usuario->id)}}">
          <img class="img-fluid" src="{{ asset('iconos/editar.png') }}">
        </a>
      </div>        
      <div class="mb-1 mt-1" style="width: 3em;">
        <a href="{{route('producto.index')}}">
          <img class="img-fluid" src="{{ asset('iconos/volver.png') }}">
        </a>
      </div>  
  </div>
    <div class="row justify-content-center">
        <form  class="col-lg-5" action="" method="POST" enctype="multipart/form-data">
        @csrf    
        <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="{{ $usuario->name }}" value="{{ $usuario->name }}" disabled>
            </div>
            <div class="mb-3">
              <label for="correo" class="form-label">Correo Electronico</label>
              <input type="number" class="form-control" id="precio" name="precio" min="0" step="0.01" placeholder="{{ $usuario->email }}" value="{{ $usuario->email }}" disabled>
            </div>
            <div class="mb-3">
              <label for="telefono" class="form-label">Telefono</label>
              <input type="number" class="form-control" id="precio" name="precio" min="0" step="0.01" placeholder="{{ $usuario->telefono }}" value="{{ $usuario->telefono }}" disabled>
            </div>
        </form>
        
    </div>
</div>

@endsection