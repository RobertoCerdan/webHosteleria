@extends('layouts.master')

@section('contenedor')

<div class="container shadow min-vh-100 py-5 ">
  <div class="row justify-content-end pt-5">
  @if(Auth::guest())
  @else
    @if(Auth::user()->rol == 'Admin')
      
        <div class="mb-1 mt-1" style="width: 3em;">
          <a href="{{route('producto.edit', $producto->id)}}">
            <img class="img-fluid" src="{{ asset('iconos/editar.png') }}">
          </a>
        </div>     
        
        <div class="mb-1 mt-1" style="width: 3em;"> 
          <a data-bs-toggle="modal" data-bs-target="#modalBorrar{{$producto->id}}">
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
        <h1 class="text-center mb-5">{{ $producto->nombre }}</h1>
        <div class="col-lg-6 mb-3 d-flex justify-content-center">
            <img class="img-fluid img-thumbnail" src="{{ asset('/storage/imagenes/' . $producto->imagen) }}">
        </div>
        <form  class="col-lg-5" action="{{ route('producto.update', $producto->id)}}" method="POST">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="{{ $producto->nombre }}" disabled>
            </div>
            <div class="mb-3">
              <label for="precio" class="form-label">Precio</label>
              <input type="number" class="form-control" id="precio" name="precio" min="0" placeholder="{{ $producto->precio }}" disabled>
            </div>
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripci&oacute;n</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="{{ $producto->descripcion }}" disabled></textarea>
            </div>
        </form>
        
    </div>
    <div class="modal fade" id="modalBorrar{{$producto->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalBorrarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>    
                <div class="modal-body text-center">
                    <p>Estas seguro que quieres borrar este producto?</p>
                    <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Cancelar</button>
                    <a type="button" href="{{route('producto.destroy' , $producto->id)}}" class="btn btn-danger ms-1">Si</a>
                </div>
                </div>
        </div>
    </div>
</div>

@endsection
