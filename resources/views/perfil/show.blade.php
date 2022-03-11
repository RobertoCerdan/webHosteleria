@extends('layouts.master')

@section('contenedor')

@if(Auth::user()->rol == 'Cliente')
<div class="container shadow min-vh-100 py-5">
  <div class="row justify-content-end pt-5"> 
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
      <div class="col-lg-8 brd table-responsive">
        <table class="table table-hover tabla">
          <thead class="table-primary text-center">
            <tr>
              <th scope="col">Pedido</th>
              <th scope="col">Estado</th>
              <th scope="col">Fecha Reserva</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody class="table-light">
            @foreach ($pedidos as $pedido)
            <tr class="text-center">
              <td>{{$pedido->id}}</td>
              <td>{{$pedido->estado}}</td>
              <td>{{$pedido->fechaReserva}}</td>
              <td>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modal{{$pedido->id}}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                          <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                  </svg>
              </button>
            </tr>
            @endforeach
          </tbody>
          </table>
      </div>
    </div>

    @foreach ($pedidos as $pedido)
      <div class="modal fade" id="Modal{{$pedido->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
            </div>
            <div class="modal-body text-center">
              <p>Estas seguro que quieres cancelar este pedido?</p>
              <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Cancelar</button>
              <a type="button" href="{{route('pedido.destroy' , $pedido->id)}}" class="btn btn-danger ms-1">Si</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach

    <div class="row justify-content-center mt-4">
      <h2 class="border-bottom border-secondary text-center col-5 col-md-5 col-xl-5 mb-3">Pedidos Entregados</h2>
      <div class="col-lg-8 brd table-responsive">
        <table class="table table-hover table-responsive tabla">
          <thead class="table-primary text-center">
            <tr>
              <th scope="col">Pedido</th>
              <th scope="col">Estado</th>
              <th scope="col">Fecha Reserva</th>
            </tr>
          </thead>
          <tbody class="table-light">
            @foreach ($ultimospedidos as $ultimospedido)
            <tr class="text-center">
              <td>{{$ultimopedido->id}}</td>
              <td>{{$ultimopedido->estado}}</td>
              <td>{{$ultimopedido->fechaReserva}}</td>
            </tr>
            @endforeach
          </tbody>
          </table>
      </div>
    </div>
</div>
@else
<div class="container shadow min-vh-100 py-5">
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
        <div class="row justify-content-center mt-4">
          <h2 class="border-bottom border-secondary text-center col-5 col-md-5 col-xl-5 mb-3">Usuarios Registrados</h2>
          <div class="col-lg-8 brd table-responsive">
            <table class="table table-hover table-responsive tabla">
              <thead class="table-primary text-center">
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">Rol</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="table-light">
                @foreach ($usuarios as $usuario)
                <tr class="text-center">
                  <td>{{$usuario->name}}</td>
                  <td>{{$usuario->email}}</td>
                  <td>{{$usuario->telefono}}</td>
                  <td>{{$usuario->rol}}</td>
                  <td>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalUser{{$usuario->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                            <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                    </svg>
                </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
              </table>
          </div>
        </div>
        @foreach ($usuarios as $usuario)
          <div class="modal fade" id="ModalUser{{$usuario->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
                </div>
                <div class="modal-body text-center">
                  <p>Estas seguro que quieres eliminar este usuario?</p>
                  <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Cancelar</button>
                  <a type="button" href="{{route('perfil.destroy' , $usuario->id)}}" class="btn btn-danger ms-1">Si</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
    </div>
</div>

@endif
@endsection



