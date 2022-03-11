@extends('layouts.master')

@section('contenedor')

<div class="container shadow min-vh-100 py-5">
  <div class="row justify-content-end pt-4">        
      <div class="mb-1 mt-1" style="width: 3em;">
        <a href="{{route('perfil.show')}}">
          <img class="img-fluid" src="{{ asset('iconos/volver.png') }}">
        </a>
      </div>  
  </div>
    <div class="row justify-content-center">
        <form  class="col-lg-5" action="{{ route('perfil.update', $usuario->id)}}" method="POST" enctype="multipart/form-data">
        @csrf    
        <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $usuario->name }}">
            </div>
            <div class="mb-3">
              <label for="correo" class="form-label">Correo Electronico</label>
              <input type="number" class="form-control" id="correo" name="correo" min="0" step="0.01" placeholder="{{ $usuario->email }}" value="{{ $usuario->email }}" disabled>
            </div>
            <div class="mb-3">
              <label for="telefono" class="form-label">Telefono</label>
              <input type="text" class="form-control" id="telefono" name="telefono" min="0" step="0.01" value="{{ $usuario->telefono }}">
            </div>
            <div class="row justify-content-center">
                <button class="btn btn-primary col-6" type="submit">Editar</button>
            </div>
        </form>
    </div>
</div>

@endsection
