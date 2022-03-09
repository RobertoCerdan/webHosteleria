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
    <div class="row justify-content-center mt-4">
      <h2 class="border-bottom border-secondary text-center col-5 col-md-5 col-xl-5 mb-3">Pedidos Realizados</h2>
      <div class="col-lg-8 brd">
        <table class="table table-hover table-responsive tabla">
          <thead class="table-primary text-center">
            <tr>
              <th scope="col">Pedido</th>
              <th scope="col">Estado</th>
              <th scope="col">Fecha Reserva</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody class="table-light">
            <tr class="">
              <td></td>
              <td></td>
              <td></td>
                <td class="text-center"><a href="" class="btn btn-danger text-white "><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
            </svg></a></td>
            </tr>
            <tr class="">
              <td></td>
              <td></td>
              <td></td>
                <td class="text-center"><a href="" class="btn btn-danger text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
            </svg></a></td>
            </tr>
          </tbody>
          </table>
      </div>
    </div>

    <div class="row justify-content-center mt-4">
      <h2 class="border-bottom border-secondary text-center col-5 col-md-5 col-xl-5 mb-3">Pedidos Entregados</h2>
      <div class="col-lg-8 brd">
        <table class="table table-hover table-responsive tabla">
          <thead class="table-primary text-center">
            <tr>
              <th scope="col">Pedido</th>
              <th scope="col">Estado</th>
              <th scope="col">Fecha Reserva</th>
            </tr>
          </thead>
          <tbody class="table-light">
            <tr class="">
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr class="">
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
          </table>
      </div>
    </div>
</div>

@endsection